<?php
session_start();

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['LOGGED_USER'])) {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: login.php");
    exit();
}

// Récupérer l'email de l'utilisateur connecté
$user_email = $_SESSION['LOGGED_USER'];

// Connexion à la base de données
require('connection.php');

// Sélectionner toutes les soumissions de formulaire
$query = "SELECT * FROM events";
$result = $mysqlClient->query($query);

// Vérification de l'exécution de la requête
if (!$result) {
    die("Erreur lors de la récupération des données: " . $mysqlClient->errorInfo()[2]);
}

// Récupérer tous les événements dans un tableau
$events = [];
while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
    $events[] = $row;
}

// Vérifier si une demande de participation a été envoyée
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['event_id'])) {
    $event_id = intval($_POST['event_id']);

    try {
        // Vérifier si l'utilisateur est déjà inscrit à l'événement
        $checkQuery = "SELECT * FROM volunteer_registrations WHERE user_email = :user_email AND event_id = :event_id";
        $checkStmt = $mysqlClient->prepare($checkQuery);
        $checkStmt->bindParam(':user_email', $user_email);
        $checkStmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            echo json_encode(['success' => false, 'message' => 'Vous êtes déjà inscrit à cet événement.']);
        } else {
            // Préparer et exécuter la mise à jour
            $query = "UPDATE events SET nb_benevole = nb_benevole + 1 WHERE id = :event_id";
            $stmt = $mysqlClient->prepare($query);
            $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
            
            if ($stmt->execute()) {
                // Enregistrer l'inscription du bénévole
                $insertQuery = "INSERT INTO volunteer_registrations (user_email, event_id) VALUES (:user_email, :event_id)";
                $insertStmt = $mysqlClient->prepare($insertQuery);
                $insertStmt->bindParam(':user_email', $user_email);
                $insertStmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
                $insertStmt->execute();

                // Récupérer le nouveau nombre de bénévoles
                $query = "SELECT nb_benevole FROM events WHERE id = :event_id";
                $stmt = $mysqlClient->prepare($query);
                $stmt->bindParam(':event_id', $event_id, PDO::PARAM_INT);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($result) {
                    echo json_encode(['success' => true, 'new_count' => $result['nb_benevole']]);
                } else {
                    echo json_encode(['success' => false, 'message' => 'Événement non trouvé']);
                }
            } else {
                echo json_encode(['success' => false, 'message' => 'Échec de la mise à jour']);
            }
        }
    } catch (Exception $e) {
        echo json_encode(['success' => false, 'message' => 'Erreur: ' . $e->getMessage()]);
    }
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carte des Événements</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 600px;
            width: 100%;
        }
        .user-info {
            margin: 20px;
            font-size: 18px;
        }
        .disabled {
            background-color: #ccc;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <div class="user-info">
        Connecté en tant que : <strong><?php echo htmlspecialchars($user_email); ?></strong>
    </div>

    <div id="map"></div>

    <button class="w-full mb-3 py-2 bg-red-600 text-white rounded" type="submit">
        <a href="deconnexion.php" style="color: black; text-decoration: none;">Déconnexion</a>
    </button>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Initialiser la carte
        var map = L.map('map').setView([46.603354, 1.888334], 6); // Coordonnées centrées sur la France

        // Ajouter une couche de tuiles OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Ajouter des marqueurs pour chaque événement
        var events = <?php echo json_encode($events); ?>;
        events.forEach(function(event) {
            if (event.Latitude && event.Longitude) {
                var latitude = parseFloat(event.Latitude);
                var longitude = parseFloat(event.Longitude);
                var popupContent = `
                    <b>${event.name}</b><br>
                    ${event.LIEU}<br>
                    Nombre de bénévoles : <span id="participants-${event.id}">${event.nb_benevole}</span><br>
                    <button id="button-${event.id}" onclick="addParticipant(${event.id})">Je participe</button>
                `;
                L.marker([latitude, longitude]).addTo(map)
                    .bindPopup(popupContent);
            }
        });

        function addParticipant(eventId) {
            fetch('', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `event_id=${eventId}`
            })
            .then(response => response.json())
            .then(data => {
                var button = document.getElementById(`button-${eventId}`);
                if (data.success) {
                    // Mettre à jour le nombre de bénévoles affiché
                    document.getElementById(`participants-${eventId}`).textContent = data.new_count;
                    // Désactiver le bouton si l'inscription est réussie
                    button.textContent = 'Vous êtes inscrit';
                    button.classList.add('disabled');
                    button.disabled = true;
                } else {
                    alert(data.message);
                }
            })
            .catch(error => {
                console.error('Erreur:', error);
                alert('Erreur lors de l\'ajout du participant.');
            });
        }
    </script>
</body>
</html>

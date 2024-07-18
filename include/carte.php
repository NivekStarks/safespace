<?php
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
    </style>
</head>
<body>
    <div id="map"></div>

    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
    <script>
        // Initialiser la carte
        var map = L.map('map').setView([48.8566, 2.3522], 6); // Coordonnées centrées sur la France

        // Ajouter une couche de tuiles OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Ajouter des marqueurs pour chaque événement
        var events = <?php echo json_encode($events); ?>;
        events.forEach(function(event) {
            if (event.LIEU) {
                // Utiliser l'API Geoapify pour convertir l'adresse en coordonnées géographiques
                fetch(`https://api.geoapify.com/v1/geocode/search?text=${encodeURIComponent(event.LIEU)}&apiKey=YOUR_GEOAPIFY_API_KEY`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.features.length > 0) {
                            var coordinates = data.features[0].geometry.coordinates;
                            L.marker([coordinates[1], coordinates[0]]).addTo(map)
                                .bindPopup(`<b>${event.name}</b><br>${event.LIEU}`);
                        }
                    })
                    .catch(error => {
                        console.error('Erreur lors de la récupération des coordonnées:', error);
                    });
            }
        });
    </script>
</body>
</html>

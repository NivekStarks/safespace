<?php
include_once('connection.php');

// Traitement du formulaire principal (ajout de formation et suppression)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = isset($_POST['action']) ? $_POST['action'] : '';

    if ($action === 'addFormation') {
        // Ajout d'une nouvelle formation
        $title = $_POST['title'];
        $description = $_POST['description'];
        $min_participants = $_POST['min_participants'];
        $max_participants = $_POST['max_participants'];
        $creation_date = $_POST['creation_date'];
        $end_publication_date = $_POST['end_publication_date'];

        try {
            // Validation des dates pour s'assurer que la date de fin de publication est après la date de création
            if (strtotime($end_publication_date) <= strtotime($creation_date)) {
                throw new Exception("La date de fin de publication doit être postérieure à la date de création.");
            }

            $sql = "INSERT INTO formations (title, description, min_participants, max_participants, creation_date, end_publication_date)
                    VALUES (:title, :description, :min_participants, :max_participants, :creation_date, :end_publication_date)";
            $stmt = $mysqlClient->prepare($sql);
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':description', $description);
            $stmt->bindParam(':min_participants', $min_participants, PDO::PARAM_INT);
            $stmt->bindParam(':max_participants', $max_participants, PDO::PARAM_INT);
            $stmt->bindParam(':creation_date', $creation_date);
            $stmt->bindParam(':end_publication_date', $end_publication_date);

            $stmt->execute();

            echo "<p class='text-green-500'>Nouvelle formation ajoutée avec succès</p>";
        } catch (Exception $e) {
            echo "<p class='text-red-500'>Erreur: " . htmlspecialchars($e->getMessage()) . "</p>";
        }
    } elseif ($action === 'deleteFormation') {
        // Suppression d'une formation
        if (isset($_POST['delete_id'])) {
            $delete_id = $_POST['delete_id'];
            try {
                $sql = "DELETE FROM formations WHERE id = :delete_id";
                $stmt = $mysqlClient->prepare($sql);
                $stmt->bindParam(':delete_id', $delete_id, PDO::PARAM_INT);
                $stmt->execute();

                if ($stmt->rowCount() > 0) {
                    echo "<p class='text-green-500'>Formation supprimée avec succès</p>";
                } else {
                    echo "<p class='text-red-500'>Erreur: la formation n'a pas pu être supprimée</p>";
                }
            } catch (PDOException $e) {
                echo "<p class='text-red-500'>Erreur: " . $e->getMessage() . "</p>";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Formations</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>
<body>
<section class="container mx-auto px-4 py-8 bg-white shadow-lg rounded-lg max-w-4xl">
    <div class="text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">GESTION DES FORMATIONS</h2>
    </div>
    <div class="form-container">
        <form action="" method="POST" class="space-y-4" id="trainingForm">
            <!-- Titre de la formation -->
            <div>
                <label for="title" class="block text-gray-600">Titre de la formation</label>
                <input type="text" id="title" name="title" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <!-- Description de la formation -->
            <div>
                <label for="description" class="block text-gray-600">Description de la formation</label>
                <textarea id="description" name="description" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
            </div>
            <!-- Nombre de participants minimum -->
            <div>
                <label for="min_participants" class="block text-gray-600">Nombre de participants minimum</label>
                <input type="number" id="min_participants" name="min_participants" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <!-- Nombre de participants maximum -->
            <div>
                <label for="max_participants" class="block text-gray-600">Nombre de participants maximum</label>
                <input type="number" id="max_participants" name="max_participants" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <!-- Date de création de la formation -->
            <div>
                <label for="creation_date" class="block text-gray-600">Date de création de la formation</label>
                <input type="datetime-local" id="creation_date" name="creation_date" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <!-- Date de fin de publication -->
            <div>
                <label for="end_publication_date" class="block text-gray-600">Date de fin de publication</label>
                <input type="datetime-local" id="end_publication_date" name="end_publication_date" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <!-- Bouton Envoyer -->
            <div class="text-center">
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Ajouter Formation</button>
            </div>
            <input type="hidden" name="action" value="addFormation">
        </form>
    </div>
    <div class="text-center mt-4">
        <a class="text-purple-700 hover:text-purple-800" href="login.php">Revenir en arrière</a>
    </div>
</section>

<section class="container mx-auto px-4 py-8 bg-white shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Gérer les Formations</h2>
    <table class="w-full border-collapse">
        <thead>
            <tr>
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Titre</th>
                <th class="border px-4 py-2">Description</th>
                <th class="border px-4 py-2">Participants Min</th>
                <th class="border px-4 py-2">Participants Max</th>
                <th class="border px-4 py-2">Date de Création</th>
                <th class="border px-4 py-2">Date de Fin de Publication</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            try {
                // Récupérer toutes les formations
                $sql = "SELECT * FROM formations";
                $stmt = $mysqlClient->query($sql);

                if ($stmt->rowCount() > 0) {
                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td class='border px-4 py-2'>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td class='border px-4 py-2'>" . htmlspecialchars($row['title']) . "</td>";
                        echo "<td class='border px-4 py-2'>" . htmlspecialchars($row['description']) . "</td>";
                        echo "<td class='border px-4 py-2'>" . htmlspecialchars($row['min_participants']) . "</td>";
                        echo "<td class='border px-4 py-2'>" . htmlspecialchars($row['max_participants']) . "</td>";
                        echo "<td class='border px-4 py-2'>" . date('d/m/Y H:i:s', strtotime($row['creation_date'])) . "</td>";
                        echo "<td class='border px-4 py-2'>" . date('d/m/Y H:i:s', strtotime($row['end_publication_date'])) . "</td>";
                        echo "<td class='border px-4 py-2'>
                                <form action='' method='POST' onsubmit='return confirm(\"Voulez-vous vraiment supprimer cette formation ?\");'>
                                    <input type='hidden' name='delete_id' value='" . htmlspecialchars($row['id']) . "'>
                                    <button type='submit' class='px-4 py-2 bg-red-500 text-white rounded hover:bg-red-700'>Supprimer</button>
                                    <input type='hidden' name='action' value='deleteFormation'>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='8' class='border px-4 py-2 text-center text-gray-600'>Pas de formations disponibles</td></tr>";
                }
            } catch (PDOException $e) {
                echo "<tr><td colspan='8' class='border px-4 py-2 text-red-500'>Erreur: " . $e->getMessage() . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
</section>

</body>
</html>

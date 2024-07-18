<?php
include_once('connection.php');
?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $min_participants = $_POST['min_participants'];
    $max_participants = $_POST['max_participants'];
    $creation_date = $_POST['creation_date'];
    $end_publication_date = $_POST['end_publication_date'];

    try {
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
    } catch (PDOException $e) {
        echo "<p class='text-red-500'>Erreur: " . $e->getMessage() . "</p>";
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
<section class="container mx-auto px-4 py-8 bg-white shadow-lg rounded-lg form_place">
    <div class="form-container">
        <div class="image"></div>
        <div class="form">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">GESTION DES FORMATIONS</h2>
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
                <div>
                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
                <a class="text-purple-700 hover:text-purple-800" href="login.php">
                    Revenir en arriere
                </a>
</section>


</body>
</html>

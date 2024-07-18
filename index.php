<?php
include_once('include/connection.php');
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Présentation</title>
    <link rel="shortcut icon" href="assets/img/parenthese_logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="assets/styles/style.css">
    <script src="assets/scripts/script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <?php
    include "include/header.php";

    // Check if the form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = $_POST['name'];
        $startDateTime = $_POST['startDateTime'];
        $endDateTime = $_POST['endDateTime'];
        $participants = $_POST['participants'];
        $domain = $_POST['domain'];
        $needs = $_POST['needs'];

        // Prepare and execute the statement
        $stmt = $mysqlClient->prepare("INSERT INTO events (name, startDateTime, endDateTime, participants, domain, needs) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$name, $startDateTime, $endDateTime, $participants, $domain, $needs]);

        if ($stmt) {
            echo "<p class='text-green-500'>Nouvel enregistrement créé avec succès.</p>";
        } else {
            echo "<p class='text-red-500'>Erreur: " . $stmt->errorInfo()[2] . "</p>";
        }
    }
    ?>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const contactLink = document.querySelector('a[href="index.php/#contact"]');

        contactLink.addEventListener('click', function (e) {
        e.preventDefault();

        document.getElementById('contact').scrollIntoView({ behavior: 'smooth' });
    });
    });
</script>


    <!-- Accueil -->
    <section class="bg-custom bg-cover bg-center mx-auto h-screen flex justify-evenly align-center items-center">
        <div class="bg-gradient-to-r from-gray-500 rounded-lg py-8 px-6 w-3/4">
            <h1 class="text-6xl text-white">Parenthèse - Safe Space Deaf</h1>
            <div class="text-3xl text-white">sensibiliser, faire des ateliers, présenter notre stand pour prévenir tout type de violence qui peuvent arriver lors des évènements Sourds à Toulouse et en France.</div>
        </div>
    </section>

    <!-- Présentation de l'association -->
    <section class="container flex items-center mx-auto px-24 py-8 w-3/4">
        <div class="left">
            <h1 class="text-3xl font-bold text-gray-800 mb-4">Qui sommes-nous ?</h1>
            <p class="text-gray-600 mb-8">Notre association est dédiée à la lutte contre les violences dans tous les événements, en particulier au sein de la communauté sourde...</p>
        </div>
        <img src="assets/img/safe.png" class="h-40" alt="">
    </section>

    <div class="flex items-center justify-center mb-8">
        <div class="pb-50-per h-1/2">
            <iframe class="w-full h-full" src="https://www.youtube.com/embed/bxDlWTrdsyg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>

<!-- Formulaire de Contact -->
<section id="contact" class="container mx-auto px-4 py-8 bg-white shadow-lg rounded-lg form_place">
    <div class="form-container">
        <div class="image"></div>
        <div class="form">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">NOUS CONTACTER</h2>
            <form action="" method="POST" class="space-y-4">
                <!-- Titre de l'évènement -->
                <div>
                    <label for="name" class="block text-gray-600">Titre de l'évènement</label>
                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <!-- Date et Heure de début -->
                <div>
                    <label for="startDateTime" class="block text-gray-600">Date Heure début de l'évènement</label>
                    <input type="datetime-local" id="startDateTime" name="startDateTime" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <!-- Date et Heure de fin -->
                <div>
                    <label for="endDateTime" class="block text-gray-600">Date Heure de fin de l'évènement</label>
                    <input type="datetime-local" id="endDateTime" name="endDateTime" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <!-- Nombre de participants -->
                <div>
                    <label for="participants" class="block text-gray-600">Nombre prévu de participants</label>
                    <input type="number" id="participants" name="participants" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <!-- Domaine -->
                <div>
                    <label for="domain" class="block text-gray-600">Domaine</label>
                    <input type="text" id="domain" name="domain" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <!-- Votre besoin -->
                <div>
                    <label for="needs" class="block text-gray-600">Votre besoin</label>
                    <textarea id="needs" name="needs" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
                <!-- Bouton Envoyer -->
                <div>
                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</section>



    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-4 px-24">
        <div class="container mx-auto px-4 text-center">
            &copy; 2024 Notre Entreprise. Tous droits réservés.
        </div>
    </footer>

</body>

</html>
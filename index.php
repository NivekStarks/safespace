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
        document.addEventListener('DOMContentLoaded', function() {
            const contactLink = document.querySelector('a[href="index.php/#contact"]');

            contactLink.addEventListener('click', function(e) {
                e.preventDefault();

                document.getElementById('contact').scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
    </script>

    <div class="w-full bg-gray-stronge">
        <!-- Accueil -->
        <section class="bg-custom bg-cover bg-center mx-auto hero-img flex align-center items-end">
            <div class="bg-gradient-to-r from-gray-500 rounded-lg py-8 px-6 w-full md:w-3/4">
                <h1 class="text-4xl md:text-6xl text-white">Parenthèse - Safe Space Deaf</h1>
                <div class="text-xl md:text-3xl text-white mt-4">Sensibiliser, faire des ateliers, présenter notre stand pour prévenir tout type de violence qui peuvent arriver lors des évènements Sourds à Toulouse et en France.</div>
            </div>
        </section>


        <!-- Présentation de l'association -->
        <section class="container flex flex-col md:flex-row items-center w-full md:w-9/12 mx-auto md:mx-44">
            <div class="left w-full md:w-6/12 p-4 md:p-0">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">Présentation de l'Association</h1>
                <p class="text-gray-600 mb-8">Notre association est dédiée à la lutte contre les violences dans tous les événements, en particulier au sein de la communauté sourde. Nous nous engageons à sensibiliser, informer et soutenir les victimes, tout en promouvant un environnement respectueux et inclusif. À travers des actions concrètes et des formations, nous visons à prévenir les abus et à offrir un espace sûr pour tous. Notre équipe travaille en collaboration avec diverses organisations pour renforcer la solidarité et l’entraide. Ensemble, nous œuvrons pour un avenir où chacun peut participer librement et en toute sécurité. Rejoignez-nous dans cette mission essentielle !</p>
            </div>
            <div class="image-présentation w-full md:w-6/12 flex justify-center md:justify-end p-4 md:p-0">
                <img src="assets/img/safe.png" class="h-auto w-full md:w-10/12" alt="Présentation Image">
            </div>
        </section>


        <div class="video-container mx-auto px-4 md:px-44">
            <div class="relative h-0 overflow-hidden" style="padding-bottom: 56.25%;">
                <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/bxDlWTrdsyg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

    <!-- Contact -->
    <section class="mx-auto px-4 md:px-44 contact-text">
    <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4">Trouvez l'Espace Sûr Idéal pour Votre Événement</h1>
    <p class="text-base md:text-lg mb-8">Vous cherchez un espace sûr et accueillant pour votre prochain événement ? Notre plateforme est là pour vous ! En nous fournissant quelques détails, nous pouvons vous aider à créer un environnement parfait et sécurisé pour vos invités. Remplissez le formulaire ci-dessous avec les informations sur votre événement, et laissez-nous nous occuper du reste. Votre satisfaction est notre priorité.</p>
</section>


    <!-- Formulaire de Contact -->
    <section id="contact" class="container mx-auto bg-white shadow-lg rounded-lg form_place">
    <div class="form-container flex flex-col md:flex-row">
        <div class="place-image-contact w-full md:w-1/2 mb-4 md:mb-0">
            <div class="image-contact"></div>
        </div>
        <div class="form w-full md:w-1/2 md:pl-8">
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
                    <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white hover:bg-blue-700 rounded-3xl">Envoyer</button>
                </div>
            </form>
        </div>
    </div>
</section>
<br>



    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 px-6 md:px-24">
    <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row justify-between">
            <!-- Colonne de gauche -->
            <div class="w-full md:w-1/2 mb-8 md:mb-0">
                <!-- Adresse -->
                <div class="flex items-center mb-4">
                    <div class="bg-white rounded-full p-2 mr-2">
                        <img src="assets/icons/lieu.png" alt="Location Icon" class="h-6 w-6">
                    </div>
                    <p class="text-white">55 avenue Maurice Bourges Maunoury, 31200 Toulouse</p>
                </div>
                <!-- Téléphone -->
                <div class="flex items-center mb-4">
                    <div class="bg-white rounded-full p-2 mr-2">
                        <img src="assets/icons/appel-telephonique.png" alt="Phone Icon" class="h-6 w-6">
                    </div>
                    <p class="text-white">+33 6 05 04 03 02</p>
                </div>
                <!-- E-mail -->
                <div class="flex items-center">
                    <div class="bg-white rounded-full p-2 mr-2">
                        <img src="assets/icons/email.png" alt="Email Icon" class="h-6 w-6">
                    </div>
                    <p class="text-white">parenthese_safe-space@gmail.com</p>
                </div>
            </div>
            <!-- Colonne de droite -->
            <div class="w-full md:w-1/2 text-left md:text-left">
                <h3 class="text-lg font-bold mb-4">À Propos de Nous</h3>
                <p class="text-gray-400">Nous sommes une association dédiée à la lutte contre les violences dans tous les événements, en particulier au sein de la communauté sourde. Notre mission est de sensibiliser et de prévenir les violences à travers des ateliers et des stands d'information.</p>
            </div>
        </div>
        <div class="text-center mt-8">
            &copy; 2024 Notre Entreprise. Tous droits réservés.
        </div>
    </div>
</footer>



</body>

</html>
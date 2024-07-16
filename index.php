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

        <!-- Navbar -->
        <nav class="bg-purple shadow-lg px-24">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center py-4">
                <!-- Logo -->
                    <div class="text-xl font-bold text-gray-800">
                        <a href="">
                            <img class="logo" src="assets/img/parenthese_logo.jpeg" alt="">
                        </a>
                    </div>
                    <!-- Links -->
                    <div class="hidden md:flex items-center space-x-4">
                        <a href="#" class="text-white hover:text-blue-500">Accueil</a>
                        <a href="#" class="text-white hover:text-blue-500">À propos</a>
                    </div>
                    <!-- Connexion Button -->
                    <div>
                        <a href="#" class="px-4 py-2 bg-white text-purple rounded hover:bg-purple-800 hover:text-white">Connexion</a>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Accueil -->

        <section class="container mx-auto h-screen">
            <img src="assets/img/safe.png" alt="">
            <div>
                <h1 class="">Parenthèse - Safe Space Deaf</h1>
                <div class="">sensibiliser, faire des ateliers, présenter notre stand pour prévenir tout type de violence qui peuvent arriver lors des évènements Sourds à Toulouse et en France.</div>
            </div>
        </section>

        <!-- Switch formulaire --> 

        <div class="bg-white p-8 rounded shadow-md w-full max-w-md">
            <div class="flex justify-center mb-6">
                <button id="setupRequestBtn" class="px-4 py-2 bg-blue-500 text-white">Demande de mise en place</button>
                <button id="registrationBtn" class="px-4 py-2 bg-gray-200">Inscription</button>
            </div>
        
            <form id="setupRequestForm">
                <div class="mb-4">
                    <label class="block text-gray-700">Nom de l'organisation</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Nom de l'organisation">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Email">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Description</label>
                    <textarea class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Description"></textarea>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Soumettre</button>
            </form>

            <form id="registrationForm" class="hidden">
                <div class="mb-4">
                    <label class="block text-gray-700">Nom</label>
                    <input type="text" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Nom">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Email</label>
                    <input type="email" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Email">
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700">Mot de passe</label>
                    <input type="password" class="w-full px-3 py-2 border border-gray-300 rounded" placeholder="Mot de passe">
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">S'inscrire</button>
            </form>
        </div>

            <!-- Présentation de l'entreprise -->
            <section class="container mx-auto px-24 py-8">
                <h1 class="text-3xl font-bold text-gray-800 mb-4">Parenthese Safe Space</h1>
                <p class="text-gray-600 mb-8">
                    Nous sommes une entreprise spécialisée dans la fourniture de services de haute qualité.
                    Notre mission est de fournir des solutions innovantes et efficaces pour répondre aux besoins de nos clients.
                </p>
                <!-- Video YouTube -->
                <div class="aspect-w-16 aspect-h-9">
                    <iframe class="w-full h-full" src="https://www.youtube.com/watch?v=vwgDfiGBv6c" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </section>

            <!-- Formulaire de Contact -->
            <section class="container mx-auto px-24 py-8 bg-white shadow-lg rounded-lg">
        
        <!-- TITRE FORMULAIRE DE CONTACT -->
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Contactez nous pour une mise en place d'un safe space</h2>
                <form action="#" method="POST" class="space-y-4">
        
            <!-- SOUS TITIRE CONTACT -->
            <div>
                        <label for="name" class="block text-gray-600">Titre de l'évènement</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
        
            <!-- DEBUT DATE -->
            <div>
                <label for="startDataTime" class="block text-gray-600">Date et Heure de début de l'évènement</label>
                <input type="datatime-local" id="startDateTime" name="startDateTime" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- END DATE -->
            <div>
                <label for="endDataTime" class="block text-gray-600">Date et Heure de fin de l'évènement</label>
                <input type="datatime-local" id="endDateTime" name="endDateTime" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- NOMBRE FOR EVENT -->
            <div>
                <label for="participants" class="block text-gray-600">Nombre prévu de participants :</label>
                <input type="number" id="number" name="participants" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></input>
            </div>

            <!-- DOMAINE -->
            <div>
                        <label for="domain" class="block text-gray-600">Domaine : <label>
                                <input type="text" id="domain" name="domain" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></input>
                    </div>
        
            <!-- ADD MESSAGE -->
            <div>
                        <label for="needs" class="block text-gray-600">Votre besoin : <label>
                                <textarea id="needs" name="needs" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                    </div>
        
            <!-- BUTTON -->
            <div>
                        <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Envoyer</button>
                    </div>
                </form>
            </section>

    

        <!-- Footer -->
        <footer class="bg-gray-800 text-white py-4 px-24">
            <div class="container mx-auto px-4 text-center">
                &copy; 2024 Notre Entreprise. Tous droits réservés.
            </div>
        </footer>

    </body>
</html>
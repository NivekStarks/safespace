<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Présentation</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<!-- Navbar -->
<nav class="bg-white shadow-lg px-24">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-center py-4">
            <!-- Logo -->
            <div class="text-xl font-bold text-gray-800">
                <a href="#">MonLogo</a>
            </div>
            <!-- Links -->
            <div class="hidden md:flex space-x-4">
                <a href="#" class="text-gray-800 hover:text-blue-500">Accueil</a>
                <a href="#" class="text-gray-800 hover:text-blue-500">À propos</a>
            </div>
            <!-- Connexion Button -->
            <div>
                <a href="#" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Connexion</a>
            </div>
        </div>
    </div>
</nav>

<!-- Présentation de l'entreprise -->
<section class="container mx-auto px-24 py-8">
    <h1 class="text-3xl font-bold text-gray-800 mb-4">Bienvenue chez Notre Entreprise</h1>
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
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Contactez-nous</h2>
    <form action="#" method="POST" class="space-y-4">
        <div>
            <label for="name" class="block text-gray-600">Nom</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div>
            <label for="email" class="block text-gray-600">Email</label>
            <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
        </div>
        <div>
            <label for="message" class="block text-gray-600">Message</label>
            <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
        </div>
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
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devenez un bénévole !</title>
    <link rel="shortcut icon" href="assets/img/parenthese_logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="assets/styles/style.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <?php
            include "include/header.php";
            ?>

    <section>
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Devenez Bénévole et Faites la Différence !</h1>
        <div class="text-center">Vous souhaitez contribuer à une cause qui vous tient à cœur ? Rejoignez notre équipe de bénévoles et participez à des événements significatifs ! Remplissez le formulaire ci-dessous pour nous faire part de vos coordonnées et de vos besoins. Ensemble, nous pouvons créer un impact positif et construire une communauté solidaire. Votre engagement est précieux et nous avons hâte de collaborer avec vous !</div>
    </section>
    <section class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Formulaire d'inscription</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="space-y-4">
            
            <!-- ORGANISATEUR -->
            <div>
                <label for="organisateur" class="block text-gray-600">Organisateur :</label>
                <input type="text" id="organisateur" name="organisateur" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <!-- NOM -->
            <div>
                <label for="nom" class="block text-gray-600">Nom :</label>
                <input type="text" id="nom" name="nom" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            
            <!-- PRENOM -->
            <div>
                <label for="prenom" class="block text-gray-600">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- EMAIL -->
            <div>
                <label for="email" class="block text-gray-600">Adresse mail :</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- PROFIL -->
            <div>
                <label for="profil" class="block text-gray-600">Profil :</label>
                <select id="profil" name="profil" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="this.form.submit()" required>
                    <option value="particulier" <?php echo (isset($_POST['profil']) && $_POST['profil'] == 'particulier') ? 'selected' : ''; ?>>Particulier</option>
                    <option value="association" <?php echo (isset($_POST['profil']) && $_POST['profil'] == 'association') ? 'selected' : ''; ?>>Association</option>
                    <option value="entreprise" <?php echo (isset($_POST['profil']) && $_POST['profil'] == 'entreprise') ? 'selected' : ''; ?>>Entreprise</option>
                </select>
            </div>

            <!-- SIRET -->
            <?php if (isset($_POST['profil']) && ($_POST['profil'] == 'association' || $_POST['profil'] == 'entreprise')): ?>
                <div>
                    <label for="numero_siret" class="block text-gray-600">Numéro SIRET :</label>
                    <input type="text" id="numero_siret" name="numero_siret" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
                <div>
                    <label for="email_contact" class="block text-gray-600">Adresse mail de contact :</label>
                    <input type="email" id="email_contact" name="email_contact" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
            <?php endif; ?>

            <!-- RNA -->
            <?php if (isset($_POST['profil']) && $_POST['profil'] == 'association'): ?>
                <div>
                    <label for="numero_rna" class="block text-gray-600">Numéro RNA :</label>
                    <input type="text" id="numero_rna" name="numero_rna" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>
            <?php endif; ?>

            <!-- ADRESSE POSTALE -->
            <div>
                <label for="adresse" class="block text-gray-600">Adresse postale :</label>
                <input type="text" id="adresse" name="adresse" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- CODE POSTAL -->
            <div>
                <label for="code_postal" class="block text-gray-600">Code postal :</label>
                <input type="text" id="code_postal" name="code_postal" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- VILLE -->
            <div>
                <label for="ville" class="block text-gray-600">Ville :</label>
                <input type="text" id="ville" name="ville" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- CHOIX DE LA FORMATION -->
            <div>
                <label class="block text-gray-600">Choix de la formation :</label>
                <div class="mt-2">
                    <label for="formation_flash" class="inline-flex items-center">
                        <input type="radio" id="formation_flash" name="choix_formation" value="flash" class="form-radio" required>
                        <span class="ml-2">Formation "Flash"</span>
                    </label>
                    <label for="formation_autre" class="inline-flex items-center ml-6">
                        <input type="radio" id="formation_autre" name="choix_formation" value="autre" class="form-radio" required>
                        <span class="ml-2">Autre formation</span>
                    </label>
                </div>
            </div>

            <!-- LIEU DE LA FORMATION -->
            <div>
                <label for="lieu_formation" class="block text-gray-600">Lieu de la formation :</label>
                <input type="text" id="lieu_formation" name="lieu_formation" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- NOMBRE DE PARTICIPANTS -->
            <div>
                <label for="participants" class="block text-gray-600">Nombre de participants :</label>
                <input type="number" id="participants" name="participants" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>

            <!-- CONTEXT DE LA DEMANDE -->
            <?php if (isset($_POST['choix_formation']) && $_POST['choix_formation'] == 'autre'): ?>
                <div>
                    <label for="contexte_demande" class="block text-gray-600">Contexte de la demande :</label>
                    <textarea id="contexte_demande" name="contexte_demande" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                </div>
            <?php endif; ?>

            <!-- DESCRIPTION DU BESOIN -->
            <div>
                <label for="description_besoin" class="block text-gray-600">Description du besoin :</label>
                <textarea id="description_besoin" name="description_besoin" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
            </div>

            <!-- BOUTON -->
            <div>
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Envoyer</button>
            </div>
        </form>
    </section>
</body>
</html>

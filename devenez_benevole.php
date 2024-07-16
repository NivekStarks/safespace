<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devenez un bénévole !</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 p-6">
    <section class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-2xl font-bold text-gray-800 mb-4">Formulaire d'inscription</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="space-y-4">
            
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
            <?php if (isset($_POST['profil']) && $_POST['profil'] == 'entreprise'): ?>
                <div>
                    <label for="numero_siret" class="block text-gray-600">Numéro SIRET :</label>
                    <input type="text" id="numero_siret" name="numero_siret" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
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

            <!-- BOUTON -->
            <div>
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-700">Envoyer</button>
            </div>
        </form>
    </section>
</body>
</html>

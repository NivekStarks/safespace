<?php
include_once("include/connection.php");

session_start(); // Ensure session is started at the top

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $email = $_POST['email'] ?? '';
    $profil = $_POST['profil'] ?? '';
    $adresse = $_POST['adresse'] ?? '';
    $code_postal = $_POST['code_postal'] ?? '';
    $ville = $_POST['ville'] ?? '';
    $choix_formation = $_POST['choix_formation'] ?? '';
    $lieu_formation = $_POST['lieu_formation'] ?? '';
    $participants = $_POST['participants'] ?? '';
    $description_besoin = $_POST['description_besoin'] ?? '';
    $numero_siret = isset($_POST['numero_siret']) && is_numeric($_POST['numero_siret']) ? $_POST['numero_siret'] : NULL;
    $numero_rna = isset($_POST['numero_rna']) && is_numeric($_POST['numero_rna']) ? $_POST['numero_rna'] : NULL;

    // Prepare the SQL statement
    $sql = "INSERT INTO candidaturebenevole (nom, prenom, mail, profile, adresse, postale, ville, formation, lieu_form, nbr_form, description, numero_siret, numero_rna)
            VALUES (:nom, :prenom, :email, :profil, :adresse, :code_postal, :ville, :choix_formation, :lieu_formation, :participants, :description_besoin, :numero_siret, :numero_rna)";

    $stmt = $mysqlClient->prepare($sql);

    // Bind parameters
    $stmt->bindParam(':nom', $nom);
    $stmt->bindParam(':prenom', $prenom);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':profil', $profil);
    $stmt->bindParam(':adresse', $adresse);
    $stmt->bindParam(':code_postal', $code_postal);
    $stmt->bindParam(':ville', $ville);
    $stmt->bindParam(':choix_formation', $choix_formation);
    $stmt->bindParam(':lieu_formation', $lieu_formation);
    $stmt->bindParam(':participants', $participants);
    $stmt->bindParam(':description_besoin', $description_besoin);
    $stmt->bindParam(':numero_siret', $numero_siret, PDO::PARAM_INT);
    $stmt->bindParam(':numero_rna', $numero_rna, PDO::PARAM_INT);

    // Execute the statement
    if ($stmt->execute()) {
        $_SESSION['message'] = "<div class='bg-green-500 text-white p-4 rounded-lg'>Votre candidature a été envoyée avec succès!</div>";
    } else {
        $_SESSION['message'] = "<div class='bg-red-500 text-white p-4 rounded-lg'>Erreur lors de l'envoi de la candidature.</div>";
    }

    // Redirect to the same page to avoid resubmission
    header("Location: " . $_SERVER['PHP_SELF']);
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Devenez un bénévole !</title>
    <link rel="shortcut icon" href="assets/img/parenthese_logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="assets/styles/output.css">
    <script src="assets/scripts/script.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="assets/scripts/jquery.zoomooz-helpers.js"></script>
		<script type="text/javascript" src="assets/scripts/jquery.zoomooz-anim.js"></script>
		<script type="text/javascript" src="assets/scripts/jquery.zoomooz-core.js"></script>
		<script type="text/javascript" src="assets/scripts/purecssmatrix.js"></script>
		<script type="text/javascript" src="assets/scripts/sylvester.src.stripped.js"></script>
		<script type="text/javascript" src="assets/scripts/jquery.zoomooz-zoomTarget.js"></script>
		<script type="text/javascript" src="assets/scripts/jquery.zoomooz-zoomContainer.js"></script>
        <script src="assets/scripts/menu.js"></script>
    <script src="https://kit.fontawesome.com/e3fa649643.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        function toggleFields() {
            const profil = document.getElementById('profil').value;
            document.getElementById('siret-field').style.display = profil === 'entreprise' ? 'block' : 'none';
            document.getElementById('rna-field').style.display = profil === 'association' ? 'block' : 'none';
        }

        window.onload = function () {
            toggleFields();
        };

        function toggleFields() {
        const profil = document.getElementById('profil').value;
        const siretField = document.getElementById('siret-field');
        const rnaField = document.getElementById('rna-field');

        if (profil === 'association') {
            siretField.style.display = 'none';
            rnaField.style.display = 'block';
        } else if (profil === 'entreprise') {
            siretField.style.display = 'block';
            rnaField.style.display = 'none';
        } else {
            siretField.style.display = 'none';
            rnaField.style.display = 'none';
        }
    }
    </script>
</head>

<body class="bg-gray-100 dark:bg-gray-600">
    <?php include "include/header.php"; ?>

    <?php if (isset($_SESSION['message'])): ?>
        <div class="container mx-auto p-4">
            <?php
            echo $_SESSION['message'];
            unset($_SESSION['message']); // Clear the message after displaying
            ?>
        </div>
    <?php endif; ?>

    <section class="container flex flex-col items-center mx-auto px-24 py-8 w-3/4">
        <h1 class="text-3xl font-bold text-gray-800 dark:text-white mb-4 self-start">Devenez Bénévole et Faites la Différence !</h1>
        <div class="text-gray-600 dark:text-white mb-8">Vous souhaitez contribuer à une cause qui vous tient à cœur ? Rejoignez notre équipe de bénévoles et participez à des événements significatifs ! Remplissez le formulaire ci-dessous pour nous faire part de vos coordonnées et de vos besoins. Ensemble, nous pouvons créer un impact positif et construire une communauté solidaire. Votre engagement est précieux et nous avons hâte de collaborer avec vous !</div>
    </section>

    <section class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-md mb-32 dark:bg-gray-900 dark:text-white">
        <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Candidature bénévole</h2>

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="space-y-4">
            <div>
                <label for="nom" class="block text-gray-600 dark:text-white">Nom :</label>
                <input type="text" id="nom" name="nom" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="prenom" class="block text-gray-600 dark:text-white">Prénom :</label>
                <input type="text" id="prenom" name="prenom" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="email" class="block text-gray-600 dark:text-white">Adresse mail :</label>
                <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="profil" class="block text-gray-600 dark:text-white">Profil :</label>
                <select id="profil" name="profil" class="w-full px-4 py-2 text-gray-600 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" onchange="toggleFields()" required>
                    <option value="particulier">Particulier</option>
                    <option value="association">Association</option>
                    <option value="entreprise">Entreprise</option>
                </select>
            </div>
            <div id="siret-field" style="display:none;">
                <label for="numero_siret" class="block text-gray-600 dark:text-white ">Numéro SIRET :</label>
                <input type="text" id="numero_siret" name="numero_siret" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div id="rna-field" style="display:none;">
                <label for="numero_rna" class="block text-gray-600 dark:text-white">Numéro RNA :</label>
                <input type="text" id="numero_rna" name="numero_rna" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label for="adresse" class="block text-gray-600 dark:text-white">Adresse postale :</label>
                <input type="text" id="adresse" name="adresse" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="code_postal" class="block text-gray-600 dark:text-white">Code postal :</label>
                <input type="text" id="code_postal" name="code_postal" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="ville" class="block text-gray-600 dark:text-white">Ville :</label>
                <input type="text" id="ville" name="ville" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label class="block text-gray-600 dark:text-white">Choix de la formation :</label>
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
            <div>
                <label for="lieu_formation" class="block text-gray-600 dark:text-white">Lieu de la formation :</label>
                <input type="text" id="lieu_formation" name="lieu_formation" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="participants" class="block text-gray-600 dark:text-white">Nombre de participants :</label>
                <input type="number" id="participants" name="participants" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
            </div>
            <div>
                <label for="description_besoin" class="block text-gray-600 dark:text-white">Description du besoin :</label>
                <textarea id="description_besoin" name="description_besoin" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
            </div>
            <div>
                <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white dark:bg-purple-700 rounded hover:bg-blue-700">Envoyer</button>
            </div>
        </form>
    </section>
    <?php
        include "include/footer.php";
    ?>

</body>

</html>

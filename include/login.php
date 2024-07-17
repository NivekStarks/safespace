

<?php
include_once('connection.php');
session_start();

$sqlQuery = 'SELECT * from administrateur';
$prep = $mysqlClient->prepare($sqlQuery);
$prep->execute();
$administrateurs = $prep->fetchAll();

if (!empty($_POST['MailCo']) && !empty($_POST['mot_passe'])) {
    $mail = $_POST['MailCo'];
    $mot_passe = $_POST['mot_passe'];
    $_SESSION['GARDER'] = $mot_passe;

    foreach ($administrateurs as $administrateur) {
        if ($administrateur['MailAdmin'] == $mail && $mot_passe == $administrateur['MDPAdmin']) {
            $_SESSION['LOGGED_USER'] = $mail;
            break;
        } else {
            $_SESSION['LOGGED_USER'] = $mot_passe;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg text-center">
        <?php if ($_SESSION['LOGGED_USER'] != $_SESSION['GARDER']): ?>
            <h1 class="text-2xl font-bold text-purple-700 mb-4">QUE SOUHAITEZ-VOUS FAIRE ?</h1>
            <p class="mb-6">Vous êtes : <?php echo $_SESSION['LOGGED_USER']; ?></p>
            <form>
                <button class="w-full mb-3 py-2 bg-purple-700 text-white rounded" type="submit">
                    <a href="AddOffre.php">Ajouter une offre d'emploi</a>
                </button>
                <button class="w-full mb-3 py-2 bg-purple-700 text-white rounded" type="submit">
                    <a href="DeleteOffre.php">Supprimer une offre d'emploi</a>
                </button>
                <button class="w-full mb-3 py-2 bg-purple-700 text-white rounded" type="submit">
                    <a href="AddActualites.php">Ajouter une actualité</a>
                </button>
                <button class="w-full mb-3 py-2 bg-purple-700 text-white rounded" type="submit">
                    <a href="DeleteActualites.php">Supprimer une actualité</a>
                </button>
                <button class="w-full mb-3 py-2 bg-purple-700 text-white rounded" type="submit">
                    <a href="NewBenevole.php">Ajouter un benevole</a>
                </button>
                <button class="w-full mb-3 py-2 bg-black text-white rounded" type="submit">
                    <a href="changementMDP.php">Changer mon mot de passe</a>
                </button>
                <button class="w-full py-2 bg-red-600 text-white rounded" type="submit">
                    <a href="deconnexion.php">Déconnexion</a>
                </button>
            </form>
        <?php else: ?>
            <h1 class="text-2xl font-bold text-purple-700 mb-4">ERREUR, IL SEMBLE QUE VOUS NE SOYEZ PAS CONNECTÉ</h1>
            <div class="mb-6 text-red-600 font-bold">
                Cet espace est réservé à l'administrateur du site
            </div>
            <button class="w-full py-2 bg-purple-700 text-white rounded" type="submit">
                <a href="connexion.php">Connectez-vous en cliquant ici</a>
            </button>
        <?php endif; ?>
    </div>
</body>
</html>
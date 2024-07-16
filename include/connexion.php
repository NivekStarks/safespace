<?php
session_start();
include_once('connection.php');

$sqlQuery = 'SELECT * FROM administrateur';
$prep = $mysqlClient->prepare($sqlQuery);
$prep->execute();
$administrateurs = $prep->fetchAll();

$error_message = '';

if (!empty($_POST['MailCo']) && !empty($_POST['mot_passe'])) {
    $mail = $_POST['MailCo'];
    $mot_passe = $_POST['mot_passe'];
    $_SESSION['GARDER'] = $mot_passe;

    $userFound = false;

    foreach ($administrateurs as $administrateur) {
        if ($administrateur['MailAdmin'] == $mail && $mot_passe == $administrateur['MDPAdmin']) {
            $_SESSION['LOGGED_USER'] = $mail;
            $userFound = true;
            header("Location: login.php");
            exit();
        }
    }

    if (!$userFound) {
        $error_message = 'Identifiant ou mot de passe incorrect.';
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire de Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="w-full max-w-xs">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="" method="post">
            <h2 class="text-2xl font-bold mb-6 text-center text-purple-700">Connexion</h2>
            
            <?php if ($error_message): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <strong class="font-bold">Erreur :</strong>
                    <span class="block sm:inline"><?php echo $error_message; ?></span>
                </div>
            <?php endif; ?>

            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Nom d'utilisateur
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" name="MailCo" type="text" placeholder="Nom d'utilisateur" required>
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Mot de passe
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" id="password" name="mot_passe" type="password" placeholder="********" required>
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-purple-700 hover:bg-purple-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                    Se connecter
                </button>
            </div>
        </form>
    </div>
</body>
</html>

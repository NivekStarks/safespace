

<?php
include_once('connection.php');
session_start();

$_SESSION['choix'] = 5;

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sqlQuery = 'SELECT MailBenevole FROM benevole';
    $prep = $mysqlClient->prepare($sqlQuery);
    $prep->execute();
    $benevoles = $prep->fetchAll();

    if (!empty($_POST['email_new']) && !empty($_POST['mdp_new'])) {
        $mailnew = $_POST['email_new'];
        $mot_passenew = $_POST['mdp_new'];

        $isEmailExists = false;
        foreach ($benevoles as $benevole) {
            if ($benevole['MailBenevole'] == $mailnew) {
                $isEmailExists = true;
                break;
            }
        }

        if ($isEmailExists) {
            $_SESSION['NEW_USER'] = "false";
        } else {
            $_SESSION['NEW_USER'] = $mailnew;
            $_SESSION['NEW_USER_MDP'] = $mot_passenew;

            // Ajouter le bénévole à la base de données
            $sqlQueryBenevole = 'INSERT INTO benevole (MailBenevole, MDPBenevole) VALUES (:mail, :mdp)';
            $prepBenevole = $mysqlClient->prepare($sqlQueryBenevole);
            $prepBenevole->execute([
                'mail' => $mailnew,
                'mdp' => $mot_passenew // Hash du mot de passe
            ]);
        }
    }
}

// Vérifiez si l'ajout a été confirmé
if (isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    $_SESSION['confirmation_message'] = "Bénévole ajouté avec succès.";
    // Optionally, you can clear the NEW_USER session variables
    unset($_SESSION['NEW_USER']);
    unset($_SESSION['NEW_USER_MDP']);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bénévole</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-purple-50 flex items-center justify-center h-screen">
<main class="w-full max-w-md">
    <?php if ($_SESSION['LOGGED_USER'] != $_SESSION['GARDER']): ?>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-bold text-purple-700 mb-4">Ajouter un nouveau bénévole</h1>
            <form method="post" action="">
                <div class="mb-4">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email_new" placeholder="Mail du nouveau bénévole" required>
                </div>
                <div class="mb-4">
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="myInput" type="password" name="mdp_new" placeholder="Mot de passe du nouveau bénévole" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="show-password">
                        Montrer le mot de passe
                        <input type="checkbox" onclick="myFunction()">
                    </label>
                </div>
                <div class="mb-4">
                    <button class="bg-purple-700 hover:bg-purple-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full" type="submit">Ajouter ce nouveau bénévole</button>
                </div>
            </form>
            <div class="text-center mt-4">
                <a class="text-purple-700 hover:text-purple-800" href="login.php">Revenir en arrière</a>
            </div>
        </div>

        <?php if ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
            <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                <h1 class="text-2xl font-bold text-purple-700 mb-4">Veuillez vérifier et confirmer l'action</h1>
                <?php if ($_SESSION['NEW_USER'] == $mailnew): ?>
                    <div class="text-green-700 mb-4">Adresse Mail et Mot de passe valide</div>
                    <div class="mb-4">Adresse Mail : <?php echo $_SESSION['NEW_USER']; ?></div>
                    <div class="mb-4">Mot de Passe : <?php echo $_SESSION['NEW_USER_MDP']; ?></div>
                    <div class="text-center mt-4">
                        <a class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="?confirm=true">Confirmer l'ajout</a>
                    </div>
                <?php else: ?>
                    <div class="text-red-700 mb-4">L'adresse mail rentrée est déjà présente dans la base de données</div>
                    <div class="text-center mt-4">
                        <a class="text-purple-700 hover:text-purple-800" href="admin.php">Revenir aux paramètres</a>
                    </div>
                    <div class="text-center mt-4">
                        <a class="text-purple-700 hover:text-purple-800" href="connecté.php">Revenir à l'accueil</a>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['confirmation_message'])): ?>
            <div class="bg-green-100 text-green-700 p-4 rounded mb-4">
                <?php echo $_SESSION['confirmation_message']; unset($_SESSION['confirmation_message']); ?>
            </div>
        <?php endif; ?>
    <?php else: ?>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <h1 class="text-2xl font-bold text-purple-700 mb-4">ERREUR, IL SEMBLE QUE VOUS NE SOYEZ PAS CONNECTÉ</h1>
            <div class="text-red-700 mb-4">Cet espace est réservé aux bénévoles du site</div>
            <div class="text-center mt-4">
                <a class="bg-purple-700 hover:bg-purple-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" href="connexion.php">Connectez-vous en cliquant ici</a>
            </div>
        </div>
    <?php endif; ?>
</main>

<script>
    function myFunction() {
        var x = document.getElementById("myInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</body>
</html>

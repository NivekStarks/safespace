<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Assurez-vous d'avoir installé PHPMailer via Composer

include_once('connection.php');
session_start();

$_SESSION['choix'] = 5;

// Fonction pour générer un mot de passe aléatoire
function generateRandomPassword($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomPassword = '';
    for ($i = 0; $i < $length; $i++) {
        $randomPassword .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomPassword;
}

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $sqlQuery = 'SELECT MailBenevole FROM benevole';
    $prep = $mysqlClient->prepare($sqlQuery);
    $prep->execute();
    $benevoles = $prep->fetchAll();

    if (!empty($_POST['email_new'])) {
        $mailnew = $_POST['email_new'];
        $mot_passenew = generateRandomPassword(); // Générer un mot de passe aléatoire

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

            // Stocker les données dans une variable de session temporaire
            $_SESSION['NEW_USER_TEMP'] = [
                'mail' => $mailnew,
                'mdp' => $mot_passenew
            ];
        }
    }
}

// Vérifiez si l'ajout a été confirmé
if (isset($_GET['confirm']) && $_GET['confirm'] === 'true') {
    if (isset($_SESSION['NEW_USER_TEMP'])) {
        $mailnew = $_SESSION['NEW_USER_TEMP']['mail'];
        $mot_passenew = $_SESSION['NEW_USER_TEMP']['mdp'];

        // Ajouter le bénévole à la base de données
        $sqlQueryBenevole = 'INSERT INTO benevole (MailBenevole, MDPBenevole) VALUES (:mail, :mdp)';
        $prepBenevole = $mysqlClient->prepare($sqlQueryBenevole);
        $prepBenevole->execute([
            'mail' => $mailnew,
            'mdp' => $mot_passenew // Hash du mot de passe
        ]);

        // Envoyer un e-mail avec PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Paramètres du serveur SMTP (déjà configurés dans votre code actuel)
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com'; // Utilisez le serveur SMTP de Gmail
            $mail->SMTPAuth = true;
            $mail->Username = 'votremail@gmail.com'; // Votre adresse e-mail Gmail
            $mail->Password = 'password'; // Votre mot de passe Gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Destinataires
            $mail->setFrom('votremail@gmail.com', 'Parenthèse');
            $mail->addAddress($mailnew);

            // Contenu de l'e-mail
            $mail->isHTML(true);
            $mail->Subject = 'Vos identifiants de connexion';
            $mail->Body    = "Bonjour,<br><br>Voici vos identifiants de connexion:<br><br>Email: $mailnew<br>Mot de passe: $mot_passenew<br><br>Cordialement,<br>L'équipe.";

            $mail->send();
            $_SESSION['confirmation_message'] = "Bénévole ajouté avec succès. Un e-mail avec les identifiants a été envoyé.";

            // Supprimer la session temporaire après confirmation
            unset($_SESSION['NEW_USER_TEMP']);
        } catch (Exception $e) {
            $_SESSION['confirmation_message'] = "Le bénévole a été ajouté, mais l'e-mail n'a pas pu être envoyé. Erreur: {$mail->ErrorInfo}";
        }
    }
}

// Vérifiez si l'email est pré-rempli depuis l'URL
$email_new = isset($_GET['email_new']) ? htmlspecialchars($_GET['email_new']) : '';

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
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="email" name="email_new" placeholder="Mail du nouveau bénévole" value="<?= $email_new ?>" required>
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

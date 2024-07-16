<?php include_once('connection.php'); ?>
<?php
session_start();

$sqlQuery = 'SELECT * from administrateur';
$prep = $mysqlClient->prepare($sqlQuery);
$prep->execute();
$administrateurs = $prep->fetchAll();


if ( !empty($_POST['MailCo']) && !empty($_POST['mot_passe']) ){

	$mail = $_POST['MailCo'];
    $mot_passe = $_POST['mot_passe'];
	$_SESSION['GARDER'] = $mot_passe;


	foreach ($administrateurs as $administrateur){

		if ($administrateur['MailAdmin'] == $mail && $mot_passe == $administrateur['MDPAdmin']) {

			$_SESSION['LOGGED_USER'] = $mail;
			break;
		}

		else {
			$_SESSION['LOGGED_USER'] = $mot_passe;
		}
	}
}

else {

	// $_SESSION['LOGGED_USER'] = $mot_passe;
	//


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

<main>
    <div class="section2">
        <?php if($_SESSION['LOGGED_USER'] != $_SESSION['GARDER']): ?>
            <div class="u-container">
                <div class="u-top-column-t-long">
                    <h1 class="no-margin text-2xl font-bold">
                        <span class="u-titre-principal-color" data-i18n="souhaitezFaire_i18n"> QUE SOUHAITEZ-VOUS FAIRE ? </span>
                        <p><span data-i18n="vousEtes">vous êtes :</span> <?php echo $_SESSION['LOGGED_USER'] ?></p>
                    </h1>
                    <div class="u-top-text-long">
                        <form>
                            <button class="w-full h-10 bg-blue-800 text-white mb-10" type="submit">
                                <a href="AddOffre.php">Ajouter une offre d'emploi</a>
                            </button>
                            <button class="w-full h-10 bg-blue-800 text-white mb-10" type="submit">
                                <a href="DeleteOffre.php">Supprimer une offre d'emploi</a>
                            </button>
                            <button class="w-full h-10 bg-blue-800 text-white mb-10" type="submit">
                                <a href="AddActualites.php">Ajouter une actualité</a>
                            </button>
                            <button class="w-full h-10 bg-blue-800 text-white mb-10" type="submit">
                                <a href="DeleteActualites.php">Supprimer une actualité</a>
                            </button>
                            <button class="w-full h-10 bg-blue-800 text-white mb-10" type="submit">
                                <a href="NewAdmin.php">Ajouter un administrateur</a>
                            </button>
                            <button class="w-full h-10 bg-black text-white mb-10" type="submit">
                                <a href="changementMDP.php">Changer mon mot de passe</a>
                            </button>
                            <button class="w-full h-10 bg-red-600 text-white mb-0" type="submit">
                                <a href="deconnexion.php">Déconnexion</a>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="section2">
                <div class="u-container">
                    <div class="u-top-column-t-long">
                        <h1 class="no-margin text-2xl font-bold">
                            <span class="u-titre-principal-color"> ERREUR, IL SEMBLE QUE VOUS NE SOYEZ PAS CONNECTÉ</span>
                        </h1>
                        <div class="u-top-text-long">
                            <div class="echec_bouton w-full h-10 text-red-600 border-0 mb-10 text-left font-bold text-xl">
                                Cet espace est réservé à l'administrateur du site
                            </div>
                            <button class="w-full h-10 bg-blue-800 text-white" type="submit">
                                <a href="connexion.php">Connectez-vous en cliquant ici</a>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>


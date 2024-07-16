<?php include_once('ScriptConnection.php'); ?>
<?php 
session_start();

if ($_SESSION['choix'] == 1){
    if ( !empty($_POST['titre']) && !empty($_POST['contrat']) && !empty($_POST['ville'])&& !empty($_POST['lien'])&& !empty($_POST['mot-cle1'])&& !empty($_POST['mot-cle2'])&& !empty($_POST['mot-cle3'])&& !empty($_POST['mot-cle4'])&& !empty($_POST['mot-cle5'])){

        $_SESSION['titre'] = $_POST['titre'];
        $_SESSION['contrat'] = $_POST['contrat'];
        $_SESSION['ville'] = strtoupper($_POST['ville']);
        $_SESSION['lien'] = $_POST['lien'];
        $_SESSION['mot-cle1'] = strtoupper($_POST['mot-cle1']);
        $_SESSION['mot-cle2'] = strtoupper($_POST['mot-cle2']);
        $_SESSION['mot-cle3'] = strtoupper($_POST['mot-cle3']);
        $_SESSION['mot-cle4'] = strtoupper($_POST['mot-cle4']);
        $_SESSION['mot-cle5'] = strtoupper($_POST['mot-cle5']);

    }
}

elseif ($_SESSION['choix'] == 2) {

    if ( !empty($_POST['OffreSupp'])){
        $_SESSION['OffreSupp'] = $_POST['OffreSupp'];

    }
}

elseif ($_SESSION['choix'] == 3){

    if ( !empty($_POST['titreA']) && !empty($_POST['contenu']) && !empty($_POST['date_actu'])){
        $_SESSION['titreA'] = $_POST['titreA'];
        $_SESSION['contenu'] = $_POST['contenu'];
		$_SESSION['date_actu'] = $_POST['date_actu'];

    }
}

else {

    if ( !empty($_POST['ActuSupp'])){
        $_SESSION['ActuSupp'] = $_POST['ActuSupp'];

    }
}

?>

<html lang="fr">
	<head>
		<meta charset="UTF-8">
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../favicon.ico" sizes="any">
		<link rel="icon" href="../asset/favicon/logo-favicon.ico" type="image/svg+xml">
		<link rel="apple-touch-icon" href="../asset/favicon/logo-favicon.ico"><!-- 180×180 -->
		<link rel="manifest" href="/site.webmanifest">
		<title>Skyincap - Recapitulatif</title>
		<link href="../style/recap.css" rel="stylesheet" type="text/css">
		<link href="../style/css-1920.css" rel="stylesheet" type="text/css">
		<link href="../style/reset.css" rel="stylesheet" type="text/css">
		<link href="../style/fonts.css" rel="stylesheet" type="text/css">
		<link href="../style/header-footer.css" rel="stylesheet" type="text/css">
		<link href="../style/main.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<?php include('header.php') ?>
		<main>
	
<?php if($_SESSION['LOGGED_USER'] != $_SESSION['GARDER']): ?>
	<?php if($_SESSION['choix'] == 1): ?>
		<div class="section2">
            <div class="u-container">
				<div class="u-top-column-t-long">
					<h1 class="no-margin"> <span class="u-titre-principal-color" data-i18n="action_i18n"> Veuillez vérifier et confirmer l'action </span></h1>
					<div class="u-top-text-long">
						<div class="retour_bouton" style="width:100% ; height: 40px;  padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							Titre de l'offre : <?php echo $_SESSION['titre']; ?>
    					</div>
    					<div class="retour_bouton" style="width:100% ; height: 40px;  padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							 Type de contrat : <?php echo $_SESSION['contrat']; ?>
    					</div>
    					<div class="retour_bouton" style="width:100% ; height: 40px;  padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							 Ville : <?php echo $_SESSION['ville']; ?>
    					</div>
    					<div class="retour_bouton" style="width:100% ; height: 40px;  padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px; ">

    							Lien Linkedin :  <a href=<?php echo $_SESSION['lien']; ?> target="_blank"> Cliquez-ici pour vérifier </a>


    					</div>
    					<div class="retour_bouton" style="width:100% ; height: 40px;  padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							 Mot-clé 1 : <?php echo $_SESSION['mot-cle1']; ?>
    					</div>
    					<div class="retour_bouton" style="width:100% ; height: 40px;  padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							 Mot-clé 2 : <?php echo $_SESSION['mot-cle2']; ?>
    					</div>
    					<div class="retour_bouton" style="width:100% ; height: 40px;  padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							Mot-clé 3 : <?php echo $_SESSION['mot-cle3']; ?>
    					</div>
    					<div class="retour_bouton" style="width:100% ; height: 40px;  padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							Mot-clé 4 : <?php echo $_SESSION['mot-cle4']; ?>
    					</div>
    					<div class="retour_bouton" style="width:100% ; height: 40px;  padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							 Mot-clé 5 : <?php echo $_SESSION['mot-cle5']; ?>
    					</div>

    					<form method="post" action="AddConfirmation.php">
    						<input class="retour_bouton" style="width:100% ; height: 40px;  background-color: #427c29 ;padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px;" name="envoyer" type="submit" value="Confirmer la publication">
    					</form>

    					<div class="retour_bouton" style="width:100% ; height: 40px;  background-color: #CC3F44;padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							<a style="color: black;" href="AddOffre.php" data-i18n="Revenir-en-arriere2_i18n"> Revenir aux paramètres </a>
    					</div>
					</div>
				</div>
            </div>
        </div>

    <?php elseif ($_SESSION['choix'] == 2): ?> 
		<div class="section2">
            <div class="u-container">
				<div class="u-top-column-t-long">
					<h1 class="no-margin"> <span class="u-titre-principal-color"> Veuillez vérifier et confirmer l'action </span></h1>
					<div class="u-top-text-long">
						<div class="retour_bouton" style="width:100% ; height: 40px;  padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							Numéro et Titre de l'offre : <?php echo $_SESSION['OffreSupp']; ?>
    					</div>
    					<form method="post" action="AddConfirmation.php">
    						<input class="retour_bouton" style="width:100% ; height: 40px;  background-color: #427c29 ;padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px;" name="envoyer" type="submit" value="Confirmer la suppression">
    					</form>
    					<div class="retour_bouton" style="width:100% ; height: 40px;  background-color: #CC3F44;padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							<a style="color: black;" href="DeleteOffre.php"> Revenir à l'accueil </a>
    					</div>
					</div>
				</div>
            </div>
        </div>
    <?php elseif ($_SESSION['choix'] == 3): ?> 
        <div class="section2">
            <div class="u-container">
				<div class="u-top-column-t-long">
					<h1 class="no-margin"> <span class="u-titre-principal-color" data-i18n="action_i18n"> Veuillez vérifier et confirmer l'action </span></h1>
					<div class="u-top-text-long">
						<div class="retour_bouton" style="width:100% ; height: 40px;  padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							Titre de l'actu : <?php echo $_SESSION['titreA']; ?>
    					</div>
						<div class="retour_bouton" style="width:100% ; height: 40px;  padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							Date de l'actu : <?php echo $_SESSION['date_actu']; ?>
    					</div>
    					<div class="retour_bouton" style="width:100% ; height: 150px;  padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							 Contenu : <?php echo $_SESSION['contenu']; ?>
    					</div>
    					<form method="post" action="AddConfirmation.php" enctype="multipart/form-data">
                            <div class="retour_bouton" style="width:100% ; height: 40px;  padding-left: 10px;
                                    border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
                                    Ajouter maintenant l'image de l'actu :
                            </div>
                            <input type="file" name="the_file" id="fileToUpload" style="width:100% ; height: 40px; border: 3px solid #ccc;display: inline-block;padding: 6px 0 0 10px;cursor: pointer;">
    						<input class="retour_bouton" style="width:100% ; height: 40px;  background-color: #427c29 ;padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px;" name="submit" type="submit" value="Confirmer la publication">
    					</form>

    					<div class="retour_bouton" style="width:100% ; height: 40px;  background-color: #CC3F44;padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							<a style="color: black;" href="AddActualites.php" data-i18n="Revenir-en-arriere2_i18n"> Revenir aux paramètres </a>
    					</div>
					</div>
				</div>
            </div>
        </div>
    <?php else: ?> 
        <div class="section2">
            <div class="u-container">
				<div class="u-top-column-t-long">
					<h1 class="no-margin"> <span class="u-titre-principal-color" > Veuillez vérifier et confirmer l'action </span></h1>
					<div class="u-top-text-long">
						<div class="retour_bouton" style="width:100% ; height: 40px;  padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							Numéro et Titre de l'actu : <?php echo $_SESSION['ActuSupp']; ?>
    					</div>
    					<form method="post" action="AddConfirmation.php">
    						<input class="retour_bouton" style="width:100% ; height: 40px;  background-color: #427c29 ;padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;" name="envoyer" type="submit" value="Confirmer la suppression">
    					</form>
    					<div class="retour_bouton" style="width:100% ; height: 40px;  background-color: #CC3F44;padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							<a style="color: black;" href="DeleteActualites.php" > Revenir à l'accueil </a>
    					</div>
					</div>
				</div>
            </div>
        </div>
	<?php endif; ?>
<?php else: ?>
	<div class="section2">
				<div class="u-container">
					<div class="u-top-column-t-long">
						<h1 class="no-margin"> <span class="u-titre-principal-color"> ERREUR, IL SEMBLE QUE VOUS NE SOYEZ PAS CONNECTÉ</span></h1>
						<div class="u-top-text-long">
								<div class="echec_bouton" style="width:100% ; height: 40px; color:#CC3F44;	border: 0; margin-bottom: 40px; text-align: left; font-weight: bold; font-size: 22px; ">Cet espace est réservé au administrateur du site</div>
								<button style="width:100% ; height: 40px; background-color:#4861AD;" type="submit">
									<a style="color: white;" href="connexion.php"> Connectez-vous en cliquant ici </a>
								</button>
						</div>
					</div>
				</div>
	</div>
<?php endif; ?>
	</main>
	<div class="u-creative-code"></div>
	<?php include('footer.php') ?>	
</body>
	<script src="../script/app.js"></script>
	<script src="../script/activePage.js"></script>
	<script src="../script/accessibility.js"></script>
    <script src="../script/header.js"></script>
	<script src="../script/main.js"></script>
</html>




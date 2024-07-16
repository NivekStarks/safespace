<?php include_once('ScriptConnection.php'); ?>
<?php
session_start();

?>


<!doctype html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="icon" href="../favicon.ico" sizes="any">
		<link rel="icon" href="../asset/favicon/logo-favicon.ico" type="image/svg+xml">
		<link rel="apple-touch-icon" href="../asset/favicon/logo-favicon.ico"><!-- 180×180 -->
		<link rel="manifest" href="/site.webmanifest">
		<title>Skyincap - Que faire ?</title>
		<link href="../style/connecté.css" rel="stylesheet" type="text/css">
		<link href="../style/css-1920.css" rel="stylesheet" type="text/css">
		<link href="../style/reset.css" rel="stylesheet" type="text/css">
		<link href="../style/fonts.css" rel="stylesheet" type="text/css">
		<link href="../style/header-footer.css" rel="stylesheet" type="text/css">
		<link href="../style/main.css" rel="stylesheet" type="text/css">
	</head>
	<body>

	<?php include('header.php') ?>

	<main>
		<div class="section2">
	<?php if($_SESSION['LOGGED_USER'] != $_SESSION['GARDER']): ?>
            <div class="u-container">
				<div class="u-top-column-t-long">
					<h1 class="no-margin"> <span class="u-titre-principal-color" data-i18n="souhaitezFaire_i18n"> QUE SOUHAITEZ-VOUS FAIRE ? </span><p><span data-i18n="vousEtes">vous etes :</span> <?php echo $_SESSION['LOGGED_USER'] ?></p></h1>
					<div class="u-top-text-long">
						<form>
							<button style="width:100% ; height: 40px; background-color:#4861AD;padding-left: 10px;margin-bottom: 40px;" type="submit">
								<a href="AddOffre.php"> Ajouter une offre d'emploi </a>
							</button>
							<button style="width:100% ; height: 40px; background-color:#4861AD;padding-left: 10px;margin-bottom: 40px;" type="submit">
								<a href="DeleteOffre.php"> Supprimer une offre d'emploi </a>
							</button>
							<button style="width:100% ; height: 40px; background-color:#4861AD;padding-left: 10px;margin-bottom: 40px;" type="submit">
								<a href="AddActualites.php"> Ajouter une actualité </a>
							</button>
							<button style="width:100% ; height: 40px; background-color:#4861AD;padding-left: 10px;margin-bottom: 40px;" type="submit">
								<a href="DeleteActualites.php"> Supprimer une actualité </a>
							</button>
							<button style="width:100% ; height: 40px; background-color:#4861AD;padding-left: 10px;margin-bottom: 40px;" type="submit">
								<a href="NewAdmin.php"> Ajouter un administrateur </a>
							</button>
							<button style="width:100% ; height: 40px; background-color:#000000;padding-left: 10px;margin-bottom: 40px;" type="submit">
								<a href="changementMDP.php"> Changer mon mot de passe </a>
							</button>
							<button style="width:100% ; height: 40px; background-color:#CC3F44;padding-left: 10px;margin-bottom: 0px;" type="submit">
								<a href="deconnexion.php"> Deconnexion </a>
							</button>
						</form>
					</div>
				</div>
            </div>
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
        </div>
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






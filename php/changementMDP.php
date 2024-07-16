<?php include_once('ScriptConnection.php'); ?>
<?php 
session_start();


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
		<title>Skyincap - Changer son mot de passe </title>
		<link href="../style/offre.css" rel="stylesheet" type="text/css">
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
		<div class="section2">
            <div class="u-container">
				<div class="u-top-column-t-long">
					<h1 class="no-margin"> <span class="u-titre-principal-color" data-i18n="changer-mot-de-passe_i18n"> Changer mon mot de passe </span></h1>
					<div class="u-top-text-long">
						<form method="post" action="validation.php">
							<input style="width:100% ; height: 40px; background-color:#EDEDED ;" id="myInput1" type="password" name="new" placeholder="Nouveau mot de passe" required>
                            <label style='font-size: 15px;font-weight: bold;font-family: Gotham, "Helvetica Neue", Helvetica, Arial, "sans-serif"'> Montrer le mot de passe
								<input type="checkbox" onclick="myFunction()">
							</label>
							<input style="width:100% ; height: 40px; background-color:#EDEDED ;" id="myInput2" type="password" name="new_confirm" placeholder="Confirmez le nouveau mot de passe" required>
                            <label style='font-size: 15px;font-weight: bold;font-family: Gotham, "Helvetica Neue", Helvetica, Arial, "sans-serif"'> Montrer le mot de passe
								<input type="checkbox" onclick="myFunction2()">
							</label>
							<input name="envoyer" type="submit" style="width:100% ; height: 40px; background-color:#4861AD;font-weight: bold; font-size: 15px;text-align: left;" value="Confirmer le changement" >
						</form>
                        <div class="retour_bouton" style="width:100% ; height: 40px; background-color:#CC3F44; padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							<a style="color: black;" href="connecté.php" data-i18n="Revenir-en-arriere2_i18n"> Revenir en arrière </a>
    					</div>
					</div>
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
	</main>

	<div class="u-creative-code"></div>
	<?php include('footer.php') ?>

	</body>
	<script src="../script/app.js"></script>
	<script src="../script/activePage.js"></script>
	<script src="../script/accessibility.js"></script>
    <script src="../script/header.js"></script>
	<script src="../script/main.js"></script>

	<script>
		
        function myFunction() {
		var x = document.getElementById("myInput1");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
		}

        function myFunction2() {
		var x = document.getElementById("myInput2");
		if (x.type === "password") {
			x.type = "text";
		} else {
			x.type = "password";
		}
		}
	</script>
</html>

<?php include_once('ScriptConnection.php'); ?>
<?php 

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
		<title>Skyincap - Home</title>
		<link href="../style/connexion.css" rel="stylesheet" type="text/css">
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
            <div class="u-container">
				<div class="u-top-column-t-long">
					<h1 class="no-margin"> <span class="u-titre-principal-color"> CONNEXION </span></h1>
					<div class="u-top-text-long">
						<form method="post" action="verification.php" > 

							<input style="width:100% ; height: 40px; background-color:#EDEDED ;" type="email" name="MailCo" placeholder="Adresse Mail administrateur" required>
							<input style="width:100% ; height: 40px; background-color:#EDEDED ;" id="myInput" type="password" name="mot_passe" placeholder="Mot de Passe administrateur" required>
							<label style='font-size: 15px;font-weight: bold;font-family: Gotham, "Helvetica Neue", Helvetica, Arial, "sans-serif"'> Montrer le mot de passe
							<input type="checkbox" onclick="myFunction()">
							</label>
							<input name="envoyer" type="submit" style="width:100% ; color:white; height: 40px; background-color:#4861AD;text-align: left; font-weight: bold; font-size: 15px;" value="Se connecter" >

						</form>
					</div>
				</div>
            </div>
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
</html>






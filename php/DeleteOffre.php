<?php include_once('ScriptConnection.php'); ?>
<?php 
session_start();

$_SESSION['choix'] = 2;



$sqlQuery = 'SELECT IdOffre, NomOffre from offre';
$prep = $mysqlClient->prepare($sqlQuery);
$prep->execute();
$offres = $prep->fetchAll();


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
		<title>Skyincap - Suppresion</title>
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
					<h1 class="no-margin"> <span class="u-titre-principal-color" data-i18n="supprimer_emploi_i18n"> Supprimer une offre d'emploi </span></h1>
					<div class="u-top-text-long">
						<form method="post" action="recap.php">
							<select name="OffreSupp" style="width:100% ; height: 40px; background-color:#EDEDED ;">
								<option value="" disabled selected>Selectionner l'offre d'emploi</option>
                        <?php foreach ($offres as $offre){ ?>   
								<option value="<?php echo $offre['IdOffre'];?>, <?php echo $offre['NomOffre'];?>">#<?php echo $offre['IdOffre'];?>,<?php echo $offre['NomOffre'];?></option>
                        <?php } ?> 
    						</select>
							<input name="envoyer" type="submit" style="width:100% ; height: 40px; color:white;background-color:#4861AD;font-weight: bold; font-size: 15px;text-align: left;" value="Supprimer l'offre du site" >
						</form>
						<div class="retour_bouton" style="width:100% ; height: 40px; background-color:#CC3F44; padding-left: 10px;
    							border: 0; margin-bottom: 40px; color:  black; text-align: left; font-weight: bold; font-size: 15px; padding-top: 12.5px;">
    							<a style="color: black;" href="connecté.php" data-i18n=Revenir-en-arriere2_i18n> Revenir en arrière </a>
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
</html>




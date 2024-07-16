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
		<title>Skyincap - Ajouter une offre</title>
		<link href="../style/offre.css" rel="stylesheet" type="text/css">
		<link href="../style/css-1920.css" rel="stylesheet" type="text/css">
		<link href="../style/reset.css" rel="stylesheet" type="text/css">
		<link href="../style/fonts.css" rel="stylesheet" type="text/css">
		<link href="../style/header-footer.css" rel="stylesheet" type="text/css">
		<link href="../style/main.css" rel="stylesheet" type="text/css">
	</head>
	<body>
	<header>
			<div class="header-background">
				<div class="container">
					<div class="logo-navigation">
						<a href="../index.php" class="header-subnav__logo-link">
							<img src="../asset/logo/Proposition_New_logo_blanc.svg" class="logo" alt="Home">
						</a>
					</div>
					<nav class="menu-header" id="menu">
						<ul class="main_pages">
                            <li>
								<bouton class="menu-item" role="menuitem">
									<a class="js-a-menu-header" href="../pages/index.php">Accueil</a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton class="menu-item" role="menuitem">
									<a class="js-a-menu-header" href="../pages/about-us.php">A propos</a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="../pages/vie-entreprise.php" class="">Vie d'entreprise</a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="../pages/valeurs.php" class="">Nos valeurs</a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="../pages/expertises.php" class="">Expertises</a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="../pages/carriere.php" class="">Carrière</a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="../pages/actus.php" class="">Actualités</a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="../pages/contact.php" class="">Contact</a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
						</ul>
					</nav>
					<div class="search-navigation-menu" style="display:none">
						<a href="#modal-language" class="header-logo-link js-modal" style="width : 40%;border: 2px solid #000000;
    	border-radius: 5px;">
							<img src="../asset/icons/svg/black/language_FILL0_wght400_GRAD0_opsz48.svg" class="logo-right-menu" style="height: 60px;" alt="Home">
						</a>
						<a href="#modal-compagny" class="header-logo-link js-modal" style="width : 40%;border: 2px solid #000000;
    	border-radius: 5px;">
							<img src="../asset/icons/svg/black/chocolate burger.svg" class="logo-right-menu" style="height: 60px;" alt="Home">
						</a>
					</div>
					<div class="search-navigation">
						<a href="#modal-language" class="header-logo-link js-modal">
							<img src="../asset/icons/svg/white/language_FILL0_wght400_GRAD0_opsz48.svg" class="logo-right-menu-bis" style="height: 28px;" alt="Home">
						</a>
						<a href="#modal-compagny" class="header-logo-link js-modal">
							<img src="../asset/icons/svg/white/chocolate burger.svg" class="logo-right-menu-bis" alt="Home">
						</a>
					</div>
					<aside id="modal-language" class="u-modal" style="display: none;">
						<div class="u-modal-wrapper js-modal-stop">
							<div class="modal-header">
								<bouton class="js-close-modal close-modal">&times; CLOSE</bouton>
							</div>
							<h1 class="js-titre-h1" style="margin-left: 0 ;">Choisissez votre langue</h1>
							<div class="u-modal-item">
								<a href="../index.php" class="header-boutton-language-struc u-rebond-fleche" >
									<div class="header-boutton-text">
										<span class="js-a-text-18">Français </span><span style="font-size: 14px; font-weight: 500;">(FR)</span>
									</div>
									<div class="u-item-content-button--fleche--">
										<img src="../asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
									</div>
								</a>
								<a href="../eng/index.php" class="header-boutton-language-struc u-rebond-fleche" >
									<div class="header-boutton-text" lang="en">
										<span class="js-a-text-18">English </span><span style="font-size: 14px; font-weight: 500;">(UK-US)</span>
									</div>
									<div class="u-item-content-button--fleche--" >
										<img src="../asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
									</div>
								</a>
							</div>
						</div>
					</aside> 
					<div class="disparaitre">
						<svg class="menu-hamburger" xmlns="http://www.w3.org/2000/svg" height="40" viewBox="0 -960 960 960" width="40"><path d="M120-240v-66.666h720V-240H120Zm0-206.667v-66.666h720v66.666H120Zm0-206.667V-720h720v66.666H120Z"/></svg>
						<svg class="cross-hamburger" xmlns="http://www.w3.org/2000/svg" height="40" viewBox="0 -960 960 960" width="40"><path d="m251.333-204.667-46.666-46.666L433.334-480 204.667-708.667l46.666-46.666L480-526.666l228.667-228.667 46.666 46.666L526.666-480l228.667 228.667-46.666 46.666L480-433.334 251.333-204.667Z"/></svg>
					</div>
					<aside id="modal-compagny" class="u-modal" style="display: none;">
						<div class="u-modal-wrapper-wide js-modal-stop">
							<div class="modal-header">
								<bouton class="js-close-modal close-modal">&times; CLOSE</bouton>
							</div>
							<div class="u-modal-wrapper-container">
								<div class="u-modal-split-item">
									<div class="modal-body">
										<div class="modal-split modal-skyincap">
											<a href="https://www.skyincap.com" class="header-boutton-struc u-rebond-fleche" >
												<div class="header-boutton-text">
													<span class="js-a-text-18">Aller sur le site de SKYINCAP</span>
												</div>
												<div class="u-item-content-button--fleche--">
													<img src="../asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
												</div>
											</a>
										</div>
									</div>
									
								</div>
								<div class="u-modal-split-item">
									<div class="modal-body">
										<div class="modal-split modal-skyconseil">
											<a href="https://www.skyconseil.fr" class="header-boutton-struc u-rebond-fleche">
												<div class="header-boutton-text">
													<span class="js-a-text-18">Aller sur le site de SKYCONSEIL</span>
												</div>
												<div class="u-item-content-button--fleche--">
													<img src="../asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
												</div>
											</a>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</aside> 
				</div>
			</div>
			<div class="accessibility-header">
				<div class="a-slider">
					<div class="a-icon"><img src="../asset/icons/svg/white/augmentation de la police.svg" class="u-cover"></div>
					<input type="range" id="slider" min="14" max="30" value="14" step="1">
					<div class="a-icon"><img src="../asset/icons/svg/white/Baisse de la police.svg" class="u-cover"></div>
				</div>
				<div class="a-menu">
					<button type="button" class="a-menu-item" style="padding-left:0px">
						<a href="">
							<img class="a-icon" id="a-contraste" src="../asset/icons/svg/white/contrast_FILL0_wght400_GRAD0_opsz48.svg">
						</a>
					</button>
					<button type="button" class="a-menu-item" style="padding-left:0px">
						<a href="#modal-accessibility-info" class="js-modal">
							<img class="a-icon" src="../asset/icons/svg/white/help.svg">
						</a>
					</button>	
				</div>
			</div>
			<aside id="modal-accessibility-info" class="u-modal" style="display: none;">
				<div class="u-modal-wrapper js-modal-stop">
					<div class="modal-header">
						<bouton type="button" class="js-close-modal">&times; CLOSE</bouton>
						
					</div>
					<div class="modal-body">
						<h2>Pourquoi ce bandeau d'accessibilitée ?</h2>
						<p>Dans notre démarche d'entreprise adaptée nous souhaitons proposer une solution simple et innovante permettant une meillieur accessibilitée sur noter site internet.
							<br><br>Vous pouvez donc retrouver un slider de gestion de la taille de la police, un bouton de contraste...</p>
					</div>
				</div>
			</aside>
		</header>
	<main>
		<div class="section2">
            <div class="u-container">
				<div class="u-top-column-t-long">
					<h1 class="no-margin"> <span class="u-titre-principal-color"> Ajouter votre avatar </span></h1>
					<div class="u-top-text-long">
						<form method="post" action="AvatarEnregistré.php" enctype="multipart/form-data">
							<input style="width:100% ; height: 40px; background-color:#EDEDED ;" type="email" name="email_avatar" placeholder="Adresse mail Skyincap" required>
                            <input type="file" name="the_file" id="fileToUpload" style="width:100% ; height: 40px; border: 3px solid #ccc;display: inline-block;padding: 6px 0 0 10px;cursor: pointer;">
                            <input style="width:100% ; height: 40px; background-color:#EDEDED ;" type="text" name="cle" placeholder="Clé de sécurité" required>
							<input name="submit" type="submit" style="width:100% ;color:white; height: 40px; background-color:#4861AD;font-weight: bold; font-size: 15px;text-align: left;" value="Publier votre avatar sur le site" >
						</form>
					</div>
				</div>
            </div>
        </div>
	</main>
	<footer>
		<div class="footer-background">
			<div class="row">
				  <div class="column_1">
				    <a href="#" class="header-subnav__logo-link">
						<img src="../asset/logo/Proposition_New_logo_blanc.svg" class="logo" alt="Home">
					</a>
				  </div>
				  <div class="column_2">
				  	<div class="column_2-struct">
				  		<div class="text1">
				  			<div class="decouvrir">
							  <h3>Decouvrir</h3>
				  				<ul>
								  	<li class="carrier">
										<bouton role="menuitem">
											<a href="../pages/carriere.php" class="">Carrière</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
									<li class="actu">
										<bouton role="menuitem">
											<a href="../pages/actus.php" class="">Actualités</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
									<li class="ese">
										<bouton role="menuitem">
											<a href="../pages/about-us.php" class="">Entreprise</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
									<li class="values">
										<bouton role="menuitem">
											<a href="../pages/valeurs.php" class="">Nos valeurs</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
				  				</ul>
				  			</div>
				  			<div class="informations">
				  				<h3>Informations</h3>
				  				<ul>
								  	<li class="contact">
										<bouton role="menuitem">
											<a href="../pages/contact.php" class="">Contact</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
									<li class="data_perso">
										<bouton role="menuitem">
											<a href="../pages/donnees-personnelles.php" class="">Données personnelles</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
									<li class="infos">
										<bouton role="menuitem">
											<a href="../pages/cgu.php" class="">Informations Légales</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
									<li class="plan">
										<bouton role="menuitem">
											<a href="#" class="">Plan du site</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
				  				</ul>
				  			</div>
				  			<div class="autres">
				  				<ul>
								  	<li class="acces">
										<bouton role="menuitem">
											<a href="#modal-accessibility-info" class="">Accéssibilité</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
									<li class="cookie">
										<bouton role="menuitem">
											<a href="../pages/cookies.php" class="">Cookies</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
				  				</ul>
				  			</div>



				  		</div>
				  		<div class="separateur">
				  			<hr>
				  		</div>
				  		<div class="text2">
				  			<h3><a href="https://fr.linkedin.com/company/skyincap" target="_blank" style="text-decoration: none; color: white;">LinkedIn</a></h3>
				  		</div>
				  		<div class="separateur">
				  			<hr>
				  		</div>
				  		<div class="text4">
				  			<h4> Copyright © 2024 Skyincap. Tous droits réservés. </h4>

				  		</div>
				  	</div>
				  </div>
			</div>
		</div>
	</footer>
	</body>
	<script src="../script/app.js"></script>
	<script src="../script/activePage.js"></script>
	<script src="../script/accessibility.js"></script>
    <script src="../script/header.js"></script>
</html>










<?php include_once('php/ScriptConnection.php'); ?>
<?php
session_start();

$sqlQuery = 'SELECT *  from actualité ORDER BY DateAjoutActu DESC LIMIT 2';
$prep = $mysqlClient->prepare($sqlQuery);
$prep->execute();
$actualites = $prep->fetchAll();

if (strpos($_SERVER['REQUEST_URI'], '/index.php') === false) {
    header('Location: /skyincap-website/index.php');
    exit();
}


if(empty($_SERVER['REQUEST_URI'])) {
    // Rediriger vers la page d'erreur 404
    http_response_code(404);
    include('php/error.php');
    exit();
}
?>
<!doctype html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<link rel="canonical" href="https://www.skyincap.com">
		<link rel="alternate" href="https://www.skyincap.com/eng/" hreflang="en-EG">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta property="analytics-s-channel" content="homepage">
		<meta name="Description" content="Skyincap : Ingénierie Innovante au Service de Tous. Découvrez notre entreprise adaptée spécialisée dans l'ingénierie, créant des solutions innovantes pour un avenir inclusif et performant.">
		<meta property="og:description" content="Skyincap : Ingénierie Innovante au Service de Tous. Découvrez notre entreprise adaptée spécialisée dans l'ingénierie, créant des solutions innovantes pour un avenir inclusif et performant.">
		<meta property="og:type" content="website">
		<meta property="og:locale" content="fr_FR">
		<meta property="og:url" content="https://www.skyincap.com">
		<link rel="icon" href="/favicon.ico">
		<link rel="icon" href="asset/favicon/logo-favicon.ico" type="image/svg+xml">
		<link rel="apple-touch-icon" href="asset/favicon/logo-favicon.ico"><!-- 180×180 -->
		<link rel="manifest" href="/site.webmanifest">
		<title data-i18n="titre_skyincap_i18n">Skyincap - Entreprise adaptée spécialisée dans l'ingénierie haute-technologie</title>
		<link href="style/index.css" rel="stylesheet" type="text/css">
		<link href="style/css-1920.css" rel="stylesheet" type="text/css">
		<link href="style/reset.css" rel="stylesheet" type="text/css">
		<link href="style/fonts.css" rel="stylesheet" type="text/css">
		<link href="style/header-footer.css" rel="stylesheet" type="text/css">
		<link href="style/main.css" rel="stylesheet" type="text/css">
	</head>
	<body>

	<header>
			<div class="header-background js-a-contrast-header">
				<div class="container">
					<div class="logo-navigation">
						<a href="index.php" class="header-subnav__logo-link">
							<img src="asset/logo/Proposition_New_logo_blanc.svg" class="logo" alt="Home">
						</a>
					</div>
					<nav class="menu-header" id="menu">
						<ul class="main_pages">
                            <li>
								<bouton class="menu-item" role="menuitem">
									<a class="js-a-menu-header" href="index.php" data-i18n="home_i18n" ></a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton class="menu-item" role="menuitem">
									<a class="js-a-menu-header" href="pages/about-us.php" data-i18n="about_us_i18n"></a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="pages/vie-entreprise.php" data-i18n="corporate_life_i18n" class=""></a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="pages/valeurs.php" data-i18n="our_values_i18n" class=""></a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="pages/expertises.php" data-i18n="expertise_i18n" class=""></a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="pages/carriere.php" data-i18n="career_i18n" class=""></a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="pages/actus.php" data-i18n="news_i18n" class=""></a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="pages/contact.php" data-i18n="contact_i18n" class=""></a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
						</ul>
					</nav>



					<div class="search-navigation-menu" style="display:none">
						<a href="#modal-language" class="header-logo-link js-modal" style="width : 50%;border: 2px solid #000000;
    	border-radius: 5px;">
							<img src="asset/icons/svg/black/language_FILL0_wght400_GRAD0_opsz48.svg" class="logo-right-menu" style="height: 60px;" alt="Home">
						</a>
						<a href="#modal-compagny" class="header-logo-link js-modal" style="width : 50%;border: 2px solid #000000;
    	border-radius: 5px; margin-left: 10px;">
							<img src="asset/icons/svg/black/chocolate burger.svg" class="logo-right-menu" style="height: 60px;" alt="Home">
						</a>
					</div>

					<div class="search-navigation">
						<a href="#modal-language" class="header-logo-link js-modal">
							<img src="asset/icons/svg/white/language_FILL0_wght400_GRAD0_opsz48.svg" class="logo-right-menu-bis" style="height: 28px;" alt="Home">
						</a>
						<a href="#modal-compagny" class="header-logo-link js-modal">
							<img src="asset/icons/svg/white/chocolate burger.svg" class="logo-right-menu-bis" alt="Home">
						</a>
					</div>

					<aside id="modal-language" class="u-modal" style="display: none;">
						<div class="u-modal-wrapper js-modal-stop">
							<div class="modal-header">
								<bouton class="js-close-modal close-modal">&times; CLOSE</bouton>
							</div>
							<h1 class="js-titre-h1" style="margin-left: 0 ;" data-i18n="langue_i18n" ></h1>



							 <div class="u-modal-item">


							 <button class="header-boutton-language-struc u-rebond-fleche" id="change-language-button">
								<div class="Pfren"><span>FR/EN</span></div>
								<div class="logofleche"><img src="asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche"></div>

							</button> <!--  bouton -->

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
										<div class="modal-split modal-skyconseil">
											<a href="https://www.skyconseil.fr" class="header-boutton-struc u-rebond-fleche">
												<div class="header-boutton-text">
													<span class="js-a-text-18" data-i18n="site_skyconseil_i18n"></span>
												</div>
												<div class="u-item-content-button--fleche--">
													<img src="asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
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
				<div class="a-slider js-a-contrast-header">
					<div class="a-icon"><img src="asset/icons/svg/white/augmentation de la police.svg" class="u-cover" id="augmentation-a"></div>
					<input type="range" id="slider" min="14" max="30" value="14" step="3.2">
					<div class="a-icon"><img src="asset/icons/svg/white/Baisse de la police.svg" class="u-cover" id="diminution-a"></div>
				</div>
				<div class="a-menu js-a-contrast-header">
					<button type="button" class="a-menu-item">
						<a href="">
							<img class="a-icon" id="a-contraste" src="asset/icons/svg/white/contrast_FILL0_wght400_GRAD0_opsz48.svg">
						</a>
					</button>
				</div>
			</div>
		</header>


		<main>

		<div class="section1 acceuil">
		<video autoplay loop muted playsinline class="u-cover">
			<source src="asset/videos/seq1.mp4" type="video/mp4">
			<source src="asset/videos/seq1.webm" type="video/webm">
		</video>
			<div class="container js-a-contrast-dark">
				<a href="#Domaines"><img src="asset/icons/svg/white/keyboard_double_arrow_up_FILL0_wght400_GRAD0_opsz48 2.svg" class="double-fleche" alt="Double flèche pour descendre"></a>
			</div>
		</div>

		<div class="section2">
			<div class="container">
				<h1 class="titre-principal js-a-titre-h1" id="Domaines" data-i18n="domaine_i18n">Nos domaines d'expertises</h1>
				<div class="s2-menu-expertise">
					<div class="s2-menu-expertise-item">
						<a href="pages/expertises.php#expert_data">
							<div>
								<img src="asset/images/systeme.webp" class="s2-menu-expertise-item-img" alt="Image d'un dashboard remplie de données, pour représenter le domaine de la Data">
							</div>
							<div class="overlay-grey"></div>
							<div class="s2-menu-expertise-item-content js-a-contrast-dark">
								<img src="asset/icons/svg/white/database.svg" height="50px" alt="logo d'une base de donnée">
								<h3 class="js-a-titre-h3">
									Data<br>
								</h3>
							</div>
							<div class="s2-menu-expertise-item--bottom js-a-contrast-dark u-rebond-fleche">
								<div class="s2-menu-expertise-item--bottom-content">
									<img src="asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s2-menu-expertise-item--bottom-content-fleche" alt="">
								</div>
							</div>
						</a>
					</div>
					<div class="s2-menu-expertise-item">
						<a href="pages/expertises.php#expert_software">
							<div>
								<img src="asset/images/dev.webp" class="s2-menu-expertise-item-img" alt="Image d'une personne codant sur son ordinateur, pour représenter le domaine : software & developpement">
							</div>
							<div class="overlay-grey"></div>
							<div class="s2-menu-expertise-item-content js-a-contrast-dark">
								<img src="asset/icons/svg/white/software.svg" height="50px" alt="Logo d'ingénieur">
								<h3 class="js-a-titre-h3" data-i18n="Logiciels_systèmes_i18n">
									Logiciels et systèmes
								</h3>
							</div>
							<div class="s2-menu-expertise-item--bottom js-a-contrast-dark u-rebond-fleche">
								<div class="s2-menu-expertise-item--bottom-content">
									<img src="asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s2-menu-expertise-item--bottom-content-fleche" alt="">
								</div>
							</div>
						</a>
					</div>
					<div class="s2-menu-expertise-item">
						<a href="pages/expertises.php#expert_project">
							<div>
								<img src="asset/images/management.webp" class="s2-menu-expertise-item-img" alt="Image réprésentant la data">
							</div>
							<div class="overlay-grey"></div>
							<div class="s2-menu-expertise-item-content js-a-contrast-dark">
								<img src="asset/icons/svg/white/ingenieur.svg" height="50px" alt="">
								<h3 class="js-a-titre-h3" data-i18n="Gestion_Porjet_i18n">
									Gestion de projet<br>
								</h3>
							</div>
							<div class="s2-menu-expertise-item--bottom js-a-contrast-dark u-rebond-fleche">
								<div class="s2-menu-expertise-item--bottom-content">
									<img src="asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s2-menu-expertise-item--bottom-content-fleche" alt="">
								</div>
							</div>
						</a>
					</div>
					<!-- <div class="s2-menu-expertise-item">
						<a href="pages/expertises.php#expert_it">
							<div>
								<img src="asset/images/it.webp" class="s2-menu-expertise-item-img" alt="Image réprésentant la data">
							</div>
							<div class="overlay-grey"></div>
							<div class="s2-menu-expertise-item-content js-a-contrast-dark">
								<img src="asset/icons/svg/white/it.svg" height="50px" alt="">
								<h3 class="js-a-titre-h3">
									???????<br>
								</h3>
							</div>
							<div class="s2-menu-expertise-item--bottom js-a-contrast-dark u-rebond-fleche">
								<div class="s2-menu-expertise-item--bottom-content">
									<img src="asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s2-menu-expertise-item--bottom-content-fleche" alt="">
								</div>
							</div>
						</a>
					</div> -->
				</div>
			</div>
		</div>
		<div class="section5">
			<div class="s5-container">
				<div class="s5-image--">
				</div>
				<div class="s5-item js-a-contrast-dark">
					<div class="s5-item-container">
						<div class="s5-item-content">
							<h1 class="s5-item-titre js-a-titre-h1" data-i18n="Entreprise_adapte_i18n">Une entreprise adaptée</h1>
							<p class="s5-item-texte js-a-text" data-i18n="fonde_2018_i18n">Fondée en 2018 par un ingénieur aéronautique et un mathématicien, Skyincap est une entreprise adaptée dans le domaine de l'ingénierie de haut niveau. En tant qu'Entreprise Adaptée, notre engagement est de renforcer l'inclusion de personnes en situation de handicap, de promouvoir leur talent et d'agir pour lever les tabous persistants dans le secteur industriel scientifique et technique. Nous comptons pour près de 50% de personnes en qualification RQTH dans notre effectif et nous œuvrons pour démontrer que la situation de handicap n’est pas un obstacle pour l’ingénierie de haut-niveau, plutôt une question de flexibilité et d’adaptation parfois de l’environnement de travail.
 </p>
						</div>
						<div class="s5-button-struct">
							<button>
								<a href="pages/valeurs.php" class="s5-bottom-actu-button-- hover-underline-animation u-rebond-fleche">
									<div class="s5-button-text">
										<span data-i18n="savoirPlusValeurs_i18n">En savoir plus sur nos valeurs</span>
									</div>
									<div class="s4-mid-actu-content-boutton-fleche">
										<img src="asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s5-bottom-actu-content-boutton-fleche--" alt="fleche">
									</div>
								</a>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		

		<div class="section-4-chiffres">
			<div class="u-container">
				<h1 class="titre-principal js-titre-h2" data-i18n="QueslquesChiffres_i18n">
					Quelques chiffres
				</h1>
				<div class="u-chiffres-struct">
					<div class="u-chiffres-content">
						<div class="u-chiffres-content-item s4-item s4-left">
							<span class="u-chiffres-content-item-chiffre"><div id="NiveauBAC3">0</div></span><span class="u-chiffres-content-item-text js-a-text-18" data-i18n="NiveauBAC3_i18n">Des effectifs de niveau bac +4/5</span>
						</div>
					</div>
					<div class="u-chiffres-content">
						<div class="u-chiffres-content-item s4-item s4-left-center">
							<span class="u-chiffres-content-item-chiffre"><div id="SalaireHandicap">0</div></span><span class="u-chiffres-content-item-text js-a-text-18" data-i18n="SalaireHandicap_i18n">De salariés en situation de handicap</span>
						</div>
					</div>
					<div class="u-chiffres-content">
						<div class="u-chiffres-content-item s4-item s4-right-center">
							<span class="u-chiffres-content-item-chiffre"><div id="domaine_expertise">0</div></span><span class="u-chiffres-content-item-text js-a-text-18" data-i18n="domaine_expertise_i18n">Domaines d'expertise</span>
						</div>
					</div>
					<div class="u-chiffres-content">
						<div class="u-chiffres-content-item s4-item s4-right">
							<div class="u-chiffres-content-item-chiffre">
								<span ><div id="agencesFrance">0</div></span>
							</div>
							<div class="u-chiffres-content-item-text js-a-text-18">
								<span data-i18n="agencesFrance_i18n">Agences en France (Nice & Toulouse)</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="section4">
			<div class="container">
				<div class="u-top-column">
					<div class="u-top-titre-principal">
						<h1 class="js-a-titre-h1" data-i18n="Actualités_i18n">
							Actualités
						</h1>
					</div>
					<!-- <div class="u-top-text">
						<div>
							<p class="s4-top-text_actu-- js-a-text" data-i18n="TousNews">
								Toutes les actualités de l’entreprise, les reports, news, brevets...
							</p>
						</div>
					</div> -->
				</div>
				<div class="s4-mid-actu-struct">
                <?php foreach ($actualites as $actu){ ?>
					<div class="s4-mid-actu-item">
						<div class="s4-mid-actu-img">
							<a href="#">
								<img src="asset/actu/<?php echo $actu['Image_Actu'];?>" class="s4-mid-actu-img--" alt="">
							</a>
						</div>
						<div class="s4-mid-actu-content">
							<div class="s4-mid-actu-content-all">
								<div class="s4-mid-actu-content-date js-a-text">
									<span><?php echo $actu['DateAjoutActu'];?></span>
								</div>
								<div class="s4-mid-actu-content-titre js-a-text-18">
									<span><?php echo $actu['Titre'];?></span>
								</div>
								<div class="s4-mid-actu-content-texte js-a-text">
									<span>
                                    <?php list($a, $b) = explode('.', $actu['Contenu']);
                                        echo $a ?>
									</span>
								</div>
							</div>
							<div  class="s4-mid-actu-content-button">
								<button>
									<div>
										<a href="#modal-lasted-actu-<?php echo $actu['IdActu']; ?>" class="s4-mid-actu-content-button-- hover-underline-animation-block u-rebond-fleche js-modal">
											<div class="s4-mid-actu-content-boutton-text u-rebond-fleche">
												<span data-i18n="savoirPlus_i18n">En savoir plus</span>
											</div>
											<div class="s4-mid-actu-content-boutton-fleche">
												<img src="asset/icons/svg/black/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
											</div>
										</a>
									</div>
								</button>
								<aside id="modal-lasted-actu-<?php echo $actu['IdActu']; ?>" class="u-modal" style="display: none;">
									<div class="u-modal-wrapper js-modal-stop">
										<div class="modal-header">
											<bouton class="js-close-modal">&times; CLOSE</bouton>

										</div>
										<div class="modal-body">
										<!-- <div class="modal-body-img">
												<img class="u-cover" src="asset/actu/<?php // echo $actu['Image_Actu']; ?>" alt="">
											</div> -->
											<h2 class="js-titre-h2"><?php echo $actu['Titre']; ?></h2>
											<p class="js-a-text"><?php echo $actu['Contenu']; ?></p>
										</div>
									</div>
								</aside>
							</div>
						</div>
					</div>
                    <?php } ?>
                </div>
				<div class="s4-bottom-actu-struct js-a-contrast-dark">
					<button>
						<a href="pages/actus.php#actualites_entreprise" class="s4-bottom-actu-button-- hover-underline-animation u-rebond-fleche">
							<div class="s4-bottom-actu-content-boutton-text">
								<span data-i18n="savoirPlus_i18n">En savoir plus</span>
							</div>
							<div class="s4-mid-actu-content-boutton-fleche">
								<img src="asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
							</div>
						</a>
					</button>
				</div>
			</div>
		</div>
		<div class="section-image" style="background-image: url(asset/images/stock-photo-smiling-group-of-diverse-work-colleagues-talking-together-during-a-meeting-in-the-lounge-of-a-2277758873.webp); background-position: top;"></div>
		<div class="section8">
			<div class="s8-container">
				<div class="s8-carriere">
					<div class="s8-carriere-titre">
						<h1 class="s8-carriere-titre-principal js-a-titre-h1" data-i18n="Carriere">Les carrières</h1>
					</div>
					<div class="s8-carriere-content">
						<!-- <div class="s8-carriere-content-texte">
							<p class="js-a-text" data-i18n="JobSkyincap_i18n">Trouvez le job de vos rêves chez SKYINCAP</p>
						</div> -->
						<div class="s8-carriere-content-button-item">
								<button class="s8-carriere-content-button-item--">
									<a href="pages/carriere.php#offres" class="s8-carriere-content-button-- hover-underline-animation u-rebond-fleche js-a-contrast-dark">
										<div class="s8-carriere-content-button--texte ">
											<span data-i18n="VoirOffres_i18n">Voir toutes les offres</span>
										</div>
										<div class="s8-carriere-content-button--fleche">
											<img src="asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="u-item-content-button--fleche--" alt="fleche">
										</div>
									</a>
								</button>
						</div>
					</div>
				</div>
				<div class="u-separateur gris"></div>
				<div class="s8-temoignage">
					<div class="s8-temoignage-text">
						<span class="u-temoignage-text--temoignge js-a-text-18" data-i18n="PourSalaires_i18n">"Pour les salariés, la clé est l’accompagnement, tant dans la montée en compétences et également dans l’adaptation des conditions de travail liées à chaque personne."</span>
							<div class="u-temoignage-text--- u-temoignage-text---padding js-a-text">
								<span class="u-temoignage-text--Nom">Delphine MOLINIER</span>
								<br>
								<p data-i18n="Directrice_i18n">Directrice opérationnelle</p>
							</div>
					</div>
					<div class="s8-temoignage-img">
						<img class="s8-temoignage-img--" src="asset/images/stock-photo-smiling-young-woman-leaning-on-an-island-in-her-kitchen-at-home-browsing-online-with-a-laptop-2321151347.webp" alt="">
					</div>
				</div>
			</div>
		</div>

	</main>

	<!-- CARROUSEL -->
    <section class="section3">

        <div class="section3-titre js-a-titre-h1" data-i18n="partenaire_i18n">NOS PARTENAIRES</div>

        <section class="customer-logos slider">
            <a href="https://www.agefiph.fr/" target="_blank"><div class="slide"><img src="asset/images/entreprise-adap/agefiph2.fbda5f61.png"></div></a>
            <a href="https://www.capemploi.info/" target="_blank"><div class="slide"><img src="asset/images/entreprise-adap/logo-bloc-avec-signature.png"></div></a>
            <a href="https://www.prefectures-regions.gouv.fr/occitanie" target="_blank"><div class="slide"><img src="asset/images/entreprise-adap/siteon0.png"></div></a>
            <a href="https://www.facegrandtoulouse.org/" target="_blank"><div class="slide"><img src="asset/images/entreprise-adap/GRAND_TOULOUSE_SANS_BASELINE.png"></div></a>
			<a href="https://www.reseau-gesat.com/" target="_blank"><div class="slide"><img src="asset/images/entreprise-adap/logo-Gesat.svg"></div></a>
            <a href="https://metropole.toulouse.fr/" target="_blank"><div class="slide"><img src="asset/images/entreprise-adap/Logo_Toulouse_Métropole.svg.png"></div></a>
            <a href="https://www.unea.fr//" target="_blank"><div class="slide"><img src="asset/images/entreprise-adap/unea.png"></div></a>
        </section>
    </section>

	<?php include('php/banner.php') ?>

	<div class="u-creative-code"></div>
	<footer>

		<div class="footer-background">
			<div class="row">
				  <div class="column_1">
				    <a href="#" class="footer-subnav__logo-link">
						<img src="asset/logo/Proposition_New_logo_blanc.svg" class="logo" alt="Home">
					</a>
				  </div>
				  <div class="column_2">
				  <div class="column_2-struct">
				  		<div class="text1">
				  			<div class="decouvrir">
				  				<h3 class="js-a-titre-h3" data-i18n="discover_i18n">Decouvrir</h3>
				  				<ul>
								  	<li class="carrier">
										<bouton role="menuitem">
											<a href="pages/carriere.php" class="js-a-text-12" data-i18n="career_i18n">Carrière</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
									<li class="actu">
										<bouton role="menuitem">
											<a href="pages/actus.php" class="js-a-text-12" data-i18n="news_i18n">Actualités</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
									<li class="ese">
										<bouton role="menuitem">
											<a href="pages/about-us.php" class="js-a-text-12" data-i18n="corporate_i18n">Entreprise</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
									<li class="values">
										<bouton role="menuitem">
											<a href="pages/valeurs.php" class="js-a-text-12" data-i18n="our_values_i18n">Nos valeurs</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
				  				</ul>
				  			</div>
				  			<div class="informations">
				  				<h3 class="js-a-titre-h3">Informations</h3>
				  				<ul>
								  	<li class="contact">
										<bouton role="menuitem">
											<a href="pages/contact.php" class="js-a-text-12" data-i18n="contact_i18n">Contact</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
									<li class="data_perso">
										<bouton role="menuitem">
											<a href="pages/donnees-personnelles.php" class="js-a-text-12" data-i18n="Politique-de-confidentialité_data_i18n">Politique de confidentialité</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
									<li class="infos">
										<bouton role="menuitem">
											<a href="pages/cgu.php" class="js-a-text-12" data-i18n="cookies-Mentions-légales_i18n">Mentions légales</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
									<li class="cookie">
										<bouton role="menuitem">
											<a href="pages/cookies.php" class="js-a-text-12" data-i18n="cookie_i18n">Cookies</a>
										</bouton>
										<div class="header-hidden-content_dynamic" style="height: 0px;"></div>
									</li>
				  				</ul>
				  			</div>
				  			<div class="autres">
				  				<ul>
									
				  				</ul>
				  			</div>



				  		</div>
				  		<div class="separateur">
				  			<hr>
				  		</div>
				  		<div class="text2">
				  			<h3 class="js-a-titre-h3"><a href="https://fr.linkedin.com/company/skyincap" target="_blank" style="text-decoration: none; color: white;">Linkedin</a></h3>
				  		</div>
				  		<div class="separateur">
				  			<hr>
				  		</div>
				  		<div class="text4">
				  			<h4 data-i18n="copyright_i18n" class="js-a-text-12"> Copyright © 2024 Skyincap. Tous droits réservés. </h4>

				  		</div>
				  	</div>
				  </div>
			</div>
		</div>
	</footer>



	</body>
	<script src="script/app.js"></script>
	<script src="script/activePage.js"></script>
	<script src="script/accessibility.js"></script>
    <script src="script/header.js"></script>
	<script src="script/main.js"></script>
	<script src="script/carrousel.js"></script>

	<script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<script>
		// SLIDER

		// Attend que le document soit prêt
		$(document).ready(function(){
		// Sélectionne l'élément avec la classe 'customer-logos' et initialise le slider
		$('.customer-logos').slick({
			// Affiche 6 diapositives à la fois
			slidesToShow: 4,
			// Défile d'une diapositive à la fois
			slidesToScroll: 1,
			// Active le mode de lecture automatique
			autoplay: true,
			// Vitesse de lecture automatique : 1500 millisecondes
			autoplaySpeed: 2000,
			// Désactive les flèches de navigation
			arrows: false,
			// Désactive les points indicateurs
			dots: false,
			// Ne met pas en pause le défilement automatique au survol
			pauseOnHover: false,
			// Réglages de la réactivité du slider
			responsive: [
				{
					// Point de rupture à une largeur d'écran de 768 pixels
					breakpoint: 800,
					// Réglages spécifiques à cet intervalle de largeur d'écran
					settings: {
						// Affiche 4 diapositives à la fois
						slidesToShow: 3
					}
				},
				{
					// Point de rupture à une largeur d'écran de 520 pixels
					breakpoint: 520,
					// Réglages spécifiques à cet intervalle de largeur d'écran
					settings: {
						// Affiche 3 diapositives à la fois
						slidesToShow: 1
					}
				}
			]
		});
		});
	</script>


</html>






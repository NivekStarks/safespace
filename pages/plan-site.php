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
    <title>Skyincap - CGU</title>
    <link href="../style/annexes.css" rel="stylesheet" type="text/css">
    <link href="../style/cgu.css" rel="stylesheet" type="text/css">
    <link href="../style/css-1920.css" rel="stylesheet" type="text/css">
    <link href="../style/reset.css" rel="stylesheet" type="text/css">
    <link href="../style/fonts.css" rel="stylesheet" type="text/css">
    <link href="../style/header-footer.css" rel="stylesheet" type="text/css">
    <link href="../style/main.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php include('header.php') ?>

	<main>
		<div id="CGU" class="section2">
            <div class="u-container">
				<div class="u-top-column-t-long">
					<h1 class="no-margin" data-i18n="Plan_site_i18n"></span></h1>
					<div class="u-top-text-long">
						<div class=" u-row">
							<p class="u-top-text-long--" data-i18n="Texte_Plan_site_i18n"></p>
							<p class="u-top-text-long--">
								<a href="../index.php" >www.skyincap.com</a>
							</p>
						</div>
						<p class="u-top-text-long--" data-i18n="site">
						</p>
                    </div>
				</div>
            </div>
        </div>
        <div class="section3">
            <div class="u-container">
				<div class="u-annexe-item">
					<div class="u-annexe-liste-struc">
						<p class="js-a-text">
							<ul>
								<li >
                                    <a href="../index.php" style="color:black;" data-i18n="home_i18n">Accueil</a>
								</li>
                                <li >
                                    <a href="about-us.php" style="color:black;" data-i18n="about_us_i18n">À propos</a>
								</li>
                                <li >
                                   <a href="vie-entreprise.php" style="color:black;" data-i18n="corporate_life_i18n">Vie d'entreprise</a>
								</li>
                                <li >
                                    <a href="valeurs.php" style="color:black;" data-i18n="our_values_i18n">Nos valeurs</a>
								</li>
                                <li >
                                    <a href="expertises.php" style="color:black;" data-i18n="expertise_i18n">Expertises</a>
								</li>
                                <li >
                                    <a href="carriere.php" style="color:black;" data-i18n="career_i18n">Carrière</a>
								</li>
                                <li >
                                    <a href="actus.php" style="color:black;" data-i18n="news_i18n">Actualités</a>
								</li>
                                <li >
                                    <a href="contact.php" style="color:black;" data-i18n="contact_i18n">Contact</a>
								</li>
							</ul>
						</p>
					</div>
                    <div class="u-annexe-liste-struc">
						<p class="js-a-text">
							<ul>
								<li >
                                    <a href="donnees-personnelles.php" style="color:black;" data-i18n="personal_data_i18n">Données personnelles</a>
								</li>
                                <li >
                                    <a href="cookies.php" style="color:black;" data-i18n="cookie_i18n">Cookies</a>
								</li>
                                <li >
                                    <a href="plan-site.php" style="color:black;" data-i18n="Plan_site_i18n"> Plan du site</a>
								</li>
                                <li >
                                    <a href="#modal-accessibility-info" class="js-modal" style="color:black;" data-i18n="accessibility_i18n"> Accessibilité</a>
								</li>
                                <li >
                                    <a href="cgu.php" style="color:black;" data-i18n="legal_information_i18n"> Informations légales</a>
								</li>
							</ul>
						</p>
					</div>
				</div>
            </div>
        </div>
		<div class="u-lien-linkedin">
            <div class="u-container">
			<div class="u-ll-struct">
                    <div class="u-ll-titre">	
					<p class="u-ll-titre-- js-a-text" data-i18n="RetrouvezLink_i18n"><br class="u-br"></p>
					<p class="u-ll-titre-- js-a-text"><a href="https://www.linkedin.com/company/skyincap/" target="_blank" class="u-ll-titre-lien">Linkedin</a></p>					
				
				</div>

                <div class="u-ll-texte">
                    <p class="u-ll-texte-- js-a-text" data-i18n="Découvrez_Linkedin_i18n_1">Découvrez l’ensemble de nos
                </div>
            </div>
        </div>
    </div>
    <?php include('../php/banner.php') ?>
    
    <div class="u-creative-code"></div>
</main>

<?php include('footer.php') ?>
</body>
<script src="../script/activePage.js"></script>
<script src="../script/app.js"></script>
<script src="../script/accessibility.js"></script>
<script src="../script/main.js"></script>
<script src="../script/header.js"></script>
<script>
    const menuHamburger = document.querySelector(".menu-hamburger")
    const navLinks = document.querySelector(".menu-header")

    menuHamburger.addEventListener('click', () => {
        navLinks.classList.toggle('mobile-menu')
    })
</script>
</html>






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
		<title data-i18n="skyincap-donnees-personnelles_i18n">Skyincap - Données personnelles</title>
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
        <div id="Domaines--" class="section2">
            
            <div class="u-container">
                <div class="u-top-column-t-long">
                    <h1 class="no-margin js-a-titre-h1" data-i18n="Données-personnelles-cookies_date_i18n">Données personnelles</h1>
                    <div class="u-top-text-long">
                        <p class="u-top-text-long-- js-a-text" data-i18n="protection_i18n">
                            La protection de vos données personnelles est d’une
                            grande importance pour SKYINCAP qui prend donc toutes
                            les précautions utiles pour s'assurer que vos données
                            personnelles sont traitées en toute sécurité.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="section3">
            <div class="u-container">
                <div class="u-annexe-item">
                    <div class="u-annexe-titre">
                        <h3 class="js-titre-h2" data-i18n="protection_life_i18n">Protection de la Vie Privée :</h3>
                    </div>
                    <div class="u-annexe-liste-struc">
                        <p class="js-a-text" data-i18n="accord_life_i18n">
                            Nous accordons une importance primordiale à la protection de la vie privée de nos visiteurs. Nous tenons à vous assurer que lorsque vous explorez notre site web, aucune information personnelle n'est collectée sans votre consentement explicite. Nous croyons que chacun devrait pouvoir naviguer en ligne en toute confiance, sachant que ses données personnelles sont sécurisées. Nous ne recueillons ni ne stockons d'informations telles que les noms, les adresses e-mail, les numéros de téléphone, ou toute autre donnée personnelle, à moins que vous ne choisissiez activement de les fournir dans le cadre d'une interaction spécifique, telle que l'inscription à une newsletter. Votre tranquillité d'esprit et votre confiance sont notre priorité absolue.
                        </p>
                    </div>
                </div>
                <div class="u-annexe-item">
                    <div class="u-annexe-titre">
                        <h3 class="js-titre-h2" data-i18n="respect_i18n">Respect de Votre Anonymat :</h3>
                    </div>
                    <div class="u-annexe-liste-struc">
                        <p class="js-a-text" data-i18n="droit_i18n">
                            Nous respectons votre droit à l'anonymat et à la discrétion lorsque vous visitez notre site web. Notre approche est guidée par la conviction que votre expérience en ligne devrait être exempte de tout suivi indésirable. Vous pouvez parcourir nos pages en toute quiétude, sachant que nous ne mettons en œuvre aucun mécanisme de suivi invasif. Aucun cookie de traçage ou de profilage n'est utilisé pour suivre vos mouvements en ligne. Notre engagement envers votre confidentialité signifie que vos données personnelles restent sous votre contrôle, et nous ne partageons, ne vendons ni ne louons aucune information que vous pourriez nous fournir à des tiers. Si vous avez des questions concernant notre politique de confidentialité ou la manière dont nous traitons les données, n'hésitez pas à nous contacter. Votre tranquillité est notre engagement.
                        </p>
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

		menuHamburger.addEventListener('click',()=>{
		navLinks.classList.toggle('mobile-menu')
		})
	</script>
</html>






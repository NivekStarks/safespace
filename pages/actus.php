<?php include_once('../php/ScriptConnection.php'); ?>
<?php
session_start();


$sqlQuery = 'SELECT *  from actualité ORDER BY DateAjoutActu DESC LIMIT 4';
$prep = $mysqlClient->prepare($sqlQuery);
$prep->execute();
$actualites = $prep->fetchAll();

$sqlQuery = 'SELECT *  from actualité ORDER BY DateAjoutActu DESC LIMIT 4 OFFSET 4';
$prep = $mysqlClient->prepare($sqlQuery);
$prep->execute();
$actualitessupps = $prep->fetchAll();

$sqlQuery = 'select COUNT(IdActu) from actualité';
$prep = $mysqlClient->prepare($sqlQuery);
$prep->execute();
$nombres = $prep->fetchAll();

foreach ($nombres as $nombre){

	$nbActu = $nombre["COUNT(IdActu)"];

}

$essai = $nbActu - 4 - ($nbActu % 4)


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
		<title data-i18n="nos-actualites_i18n">Skyincap - Nos Actualités</title>
		<link href="../style/actusR.css" rel="stylesheet" type="text/css">
		<link href="../style/css-1920.css" rel="stylesheet" type="text/css">
		<link href="../style/reset.css" rel="stylesheet" type="text/css">
		<link href="../style/fonts.css" rel="stylesheet" type="text/css">
		<link href="../style/header-footer.css" rel="stylesheet" type="text/css">
		<link href="../style/main.css" rel="stylesheet" type="text/css">
	</head>
	<body>

	<?php include('header.php') ?>

		<main>
		<div class="section1" style="background-image: url(../asset/images/news.webp); height: 75vh;">
			<div class="container js-a-contrast-dark">
				<a href="#Actus"><img src="../asset/icons/svg/white/keyboard_double_arrow_up_FILL0_wght400_GRAD0_opsz48 2.svg" class="double-fleche" alt="Double flèche pour descendre"></a>
			</div>
		</div>
		<div class="section4">
			<div class="u-container">
				<div class="u-top-column" id="actualites_entreprise">
					<div class="u-top-titre-principal">
						<h1 id="Actus" data-i18n="news_i18n">
							Actualités 
						</h1>
					</div>
					<!-- <div class="u-top-text">
						<div>
							<p class="s4-top-text_actu--" data-i18n="news_text_i18n">
								Toutes les actualités de l’entreprise, les reports, news, brevets... 
							</p>
						</div>
					</div> -->
				</div>
	<?php if ($nbActu <= 4): ?>
				<div class="s4-mid-actu-struct">
        <?php foreach ($actualites as $actu){ ?> 
					<div class="s4-mid-actu-item">
						<div class="s4-mid-actu-img">
							<a href="#">
								<img src="../asset/actu/<?php echo $actu['Image_Actu'];?>" class="s4-mid-actu-img--" alt="">
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
											<div class="s4-mid-actu-content-boutton-text">
												<span data-i18n="savoirPlus_i18n">En savoir plus</span>
											</div>
											<div class="s4-mid-actu-content-boutton-fleche">
												<img src="../asset/icons/svg/black/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
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
											<!-- <div class="modal-body-img-actus">
                                                <img src="../asset/actu/ <?php //echo $actu['Image_Actu']; ?> " class="u-cover" alt="">
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

	<?php elseif ($nbActu <= 8): ?>	
		<div class="s4-mid-actu-struct">
        <?php foreach ($actualites as $actu){ ?> 
					<div class="s4-mid-actu-item">
						<div class="s4-mid-actu-img">
							<a href="#">
								<img src="../asset/actu/<?php echo $actu['Image_Actu'];?>" class="s4-mid-actu-img--" alt="">
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
										<a href="#modal-lasted-actu-<?php echo $actu['IdActu']; ?>" class="s4-mid-actu-content-button-- js-modal">
											<div class="s4-mid-actu-content-boutton-text">
												<span>En savoir plus</span>
											</div>
											<div class="s4-mid-actu-content-boutton-fleche">
												<img src="../asset/icons/svg/black/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
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
											<div class="modal-body-img">
                                                <img src="../asset/actu/<?php echo $actu['Image_Actu']; ?>" class="u-cover" alt="">
											</div>
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
				<div id="barre--0" onclick="dropdown()" class="s4-bottom-actu-struct">
					<button id="bouton8">
						<a class="s4-bottom-actu-button--">
							<div class="s4-bottom-actu-content-boutton-text">
								<span>Voir plus d'actualités</span>
							</div>
							<div class="s4-mid-actu-content-boutton-fleche">
								<img src="../asset/icons/svg/white/keyboard_double_arrow_up_FILL0_wght400_GRAD0_opsz48 2.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
							</div>
						</a>
					</button>
				</div>
				<div id="bloc--0" class="s4-mid-actu-struct"  style="display:none" >
        <?php foreach ($actualitessupps as $actu){ ?> 
					<div class="s4-mid-actu-item">
						<div class="s4-mid-actu-img">
							<a href="#">
								<img src="../asset/actu/<?php echo $actu['Image_Actu'];?>" class="s4-mid-actu-img--" alt="">
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
										<a href="#modal-lasted-actu-<?php echo $actu['IdActu']; ?>" class="s4-mid-actu-content-button-- js-modal">
											<div class="s4-mid-actu-content-boutton-text">
												<span>En savoir plus</span>
											</div>
											<div class="s4-mid-actu-content-boutton-fleche">
												<img src="../asset/icons/svg/black/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
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
											<div class="modal-body-img">
                                                <img src="../asset/actu/<?php echo $actu['Image_Actu']; ?>" class="u-cover" alt="">
											</div>
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
	
	<?php else: ?>

		<div class="s4-mid-actu-struct">
        <?php foreach ($actualites as $actu){ ?> 
					<div class="s4-mid-actu-item">
						<div class="s4-mid-actu-img">
							<a href="#">
								<img src="../asset/actu/<?php echo $actu['Image_Actu'];?>" class="s4-mid-actu-img--" alt="">
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
										<a href="#modal-lasted-actu-<?php echo $actu['IdActu']; ?>" class="s4-mid-actu-content-button-- js-modal">
											<div class="s4-mid-actu-content-boutton-text">
												<span>En savoir plus</span>
											</div>
											<div class="s4-mid-actu-content-boutton-fleche">
												<img src="../asset/icons/svg/black/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
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
											<div class="modal-body-img">
                                                <img src="../asset/actu/<?php echo $actu['Image_Actu']; ?>" class="u-cover" alt="">
											</div>
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
		<div id="barre-0" class="s4-bottom-actu-struct">
					<button>
						<a class="s4-bottom-actu-button--">
							<div class="s4-bottom-actu-content-boutton-text">
								<span>Voir plus d'actualités</span>
							</div>
							<div class="s4-mid-actu-content-boutton-fleche">
								<img src="../asset/icons/svg/white/keyboard_double_arrow_up_FILL0_wght400_GRAD0_opsz48 2.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
							</div>
						</a>
					</button>
		</div>

        <?php
        $i=4;
		for ($i=4; $i <= $essai ; $i+=4):
            $sqlQuery = 'SELECT *  from actualité ORDER BY DateAjoutActu DESC LIMIT 4 OFFSET ' . $i . '';
            $prep = $mysqlClient->prepare($sqlQuery);
            $prep->execute();
            $ajouts = $prep->fetchAll();
        ?>
            <div id="test-<?php echo $i; ?>" style="display:none" class="s4-mid-actu-struct">
            <?php foreach ($ajouts as $ajout){ ?> 
					<div class="s4-mid-actu-item">
						<div class="s4-mid-actu-img">
							<a href="#">
								<img src="../asset/actu/<?php echo $ajout['Image_Actu'];?>" class="s4-mid-actu-img--" alt="">
							</a>
						</div>
						<div class="s4-mid-actu-content">
							<div class="s4-mid-actu-content-all">
								<div class="s4-mid-actu-content-date js-a-text">
									<span><?php echo $ajout['DateAjoutActu'];?></span>
								</div>
								<div class="s4-mid-actu-content-titre js-a-text-18">
									<span><?php echo $ajout['Titre'];?></span>
								</div>
								<div class="s4-mid-actu-content-texte js-a-text">
									<span>
                                        <?php list($a, $b) = explode('.', $ajout['Contenu']);
                                        echo $a ?>
									</span>
								</div>
							</div>
							<div  class="s4-mid-actu-content-button">
								<button>
									<div>
										<a href="#modal-lasted-actu-<?php echo $ajout['IdActu']; ?>" class="s4-mid-actu-content-button-- js-modal">
											<div class="s4-mid-actu-content-boutton-text">
												<span>En savoir plus</span>
											</div>
											<div class="s4-mid-actu-content-boutton-fleche">
												<img src="../asset/icons/svg/black/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
											</div>
										</a>
									</div>
								</button>
								<aside id="modal-lasted-actu-<?php echo $ajout['IdActu']; ?>" class="u-modal" style="display: none;">
									<div class="u-modal-wrapper js-modal-stop">
										<div class="modal-header">
											<bouton class="js-close-modal">&times; CLOSE</bouton>
											
										</div>
										<div class="modal-body">
											<div class="modal-body-img">
                                                <img src="../asset/actu/<?php echo $ajout['Image_Actu']; ?>" class="u-cover" alt="">
											</div>
											<h2 class="js-titre-h2"><?php echo $ajout['Titre']; ?></h2>
											<p class="js-a-text"><?php echo $ajout['Contenu']; ?></p>
										</div>
									</div>
								</aside>	
							</div>
						</div>
					</div>
            <?php } ?>	
			</div> 
            <div id="barre-<?php echo $i; ?>" class="s4-bottom-actu-struct" style="display:none">
					<button>
						<a class="s4-bottom-actu-button--">
							<div class="s4-bottom-actu-content-boutton-text">
								<span>Voir plus d'actualités</span>
							</div>
							<div class="s4-mid-actu-content-boutton-fleche">
								<img src="../asset/icons/svg/white/keyboard_double_arrow_up_FILL0_wght400_GRAD0_opsz48 2.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
							</div>
						</a>
					</button>
			</div>
    
            <?php endfor; ?>

			<div id="test-<?php echo $i; ?>" style="display:none" class="s4-mid-actu-struct">
			<?php 
			$sqlQuery = 'SELECT *  from actualité ORDER BY DateAjoutActu DESC LIMIT 4 OFFSET ' . $i . '';
            $prep = $mysqlClient->prepare($sqlQuery);
            $prep->execute();
            $fins = $prep->fetchAll();
			foreach ($fins as $ajout){ ?> 
					<div class="s4-mid-actu-item">
						<div class="s4-mid-actu-img">
							<a href="#">
								<img src="../asset/actu/<?php echo $ajout['Image_Actu'];?>" class="s4-mid-actu-img--" alt="">
							</a>
						</div>
						<div class="s4-mid-actu-content">
							<div class="s4-mid-actu-content-all">
								<div class="s4-mid-actu-content-date js-a-text">
									<span><?php echo $ajout['DateAjoutActu'];?></span>
								</div>
								<div class="s4-mid-actu-content-titre js-a-text-18">
									<span><?php echo $ajout['Titre'];?></span>
								</div>
								<div class="s4-mid-actu-content-texte js-a-text">
									<span>
                                        <?php list($a, $b) = explode('.', $ajout['Contenu']);
                                        echo $a ?>
									</span>
								</div>
							</div>
							<div  class="s4-mid-actu-content-button">
								<button>
									<div>
										<a href="#modal-lasted-actu-<?php echo $ajout['IdActu']; ?>" class="s4-mid-actu-content-button-- js-modal">
											<div class="s4-mid-actu-content-boutton-text">
												<span>En savoir plus</span>
											</div>
											<div class="s4-mid-actu-content-boutton-fleche">
												<img src="../asset/icons/svg/black/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
											</div>
										</a>
									</div>
								</button>
								<aside id="modal-lasted-actu-<?php echo $ajout['IdActu']; ?>" class="u-modal" style="display: none;">
									<div class="u-modal-wrapper js-modal-stop">
										<div class="modal-header">
											<bouton class="js-close-modal">&times; CLOSE</bouton>
											
										</div>
										<div class="modal-body">
											<div class="modal-body-img">
                                                <img src="../asset/actu/<?php echo $ajout['Image_Actu']; ?>" class="u-cover" alt="">
											</div>
											<h2 class="js-titre-h2"><?php echo $ajout['Titre']; ?></h2>
											<p class="js-a-text"><?php echo $ajout['Contenu']; ?></p>
										</div>
									</div>
								</aside>	
							</div>
						</div>
					</div>
            <?php } ?>	
				</div>	
	<?php endif; ?>
			</div>
		</div>

		<?php include('../php/banner.php') ?>
		
		<div class="u-creative-code"></div>
	</main>

	<?php include('footer.php') ?>

</body>
	<script src="../script/app.js"></script>
	<script src="../script/activePage.js"></script>
	<script src="../script/accessibility.js"></script>
	<script src="../script/header.js"></script>
	<script src="../script/main.js"></script>

	<?php if ($nbActu <= 4): ?>

		<script>
			
		</script>

	<?php elseif ($nbActu <= 8): ?>

		<script>

			function dropdown()
			{       
				document.getElementById("bloc--0").style.display="flex";
				document.getElementById("barre--0").style.display="none";
			}

		</script>

	<?php elseif($nbActu > 8): ?>
		<script type="text/javascript">

			<?php for ($i=4; $i <= 4 ; $i+=4): ?>

			const barre<?php echo $i-4;?> = document.getElementById("barre-<?php echo $i-4;?>")
			const test<?php echo $i;?> = document.getElementById("test-<?php echo $i;?>")
			const barre<?php echo $i;?> = document.getElementById("barre-<?php echo $i;?>")

			barre<?php echo $i-4;?>.addEventListener('click',()=>{

			barre<?php echo $i-4;?>.style.display = "none"
			test<?php echo $i;?>.style.display = "flex"
			barre<?php echo $i;?>.style.display = "flex"

			})
			<?php endfor; ?>

			<?php for ($i=8; $i <= $essai + 4 ; $i+=4): ?>

			const test<?php echo $i;?> = document.getElementById("test-<?php echo $i;?>")
			const barre<?php echo $i;?> = document.getElementById("barre-<?php echo $i;?>")

			barre<?php echo $i-4;?>.addEventListener('click',()=>{

			barre<?php echo $i-4;?>.style.display = "none"
			test<?php echo $i;?>.style.display = "flex"
			barre<?php echo $i;?>.style.display = "flex"

			})
			<?php endfor; ?>



		</script>

	<?php else: ?>

	<?php endif; ?>

</html>


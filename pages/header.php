<?php
if(empty($_SERVER['REQUEST_URI'])) {
    // Rediriger vers la page d'erreur 404
    http_response_code(404);
    include('../php/error.php');
    exit();
}
?>

<header>
			<div class="header-background js-a-contrast-header">
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
									<a class="js-a-menu-header" href="../index.php" data-i18n="home_i18n"></a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton class="menu-item" role="menuitem">
									<a class="js-a-menu-header" href="about-us.php" data-i18n="about_us_i18n">À propos</a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="vie-entreprise.php" class="" data-i18n="corporate_life_i18n">Vie d'entreprise</a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="valeurs.php" class="" data-i18n="our_values_i18n">Nos valeurs</a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="expertises.php" class="" data-i18n="expertise_i18n">Expertises</a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="carriere.php" class="" data-i18n="career_i18n">Carrières</a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="actus.php" class="" data-i18n="news_i18n">Actualités</a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
							<li>
								<bouton role="menuitem">
									<a class="js-a-menu-header" href="contact.php" class="" data-i18n="contact_i18n">Contact</a>
								</bouton>
								<div class="header-hidden-content_dynamic"></div>
							</li>
						</ul>
					</nav>
					<div class="search-navigation-menu" style="display:none;">
						<a href="#modal-language" class="header-logo-link js-modal" style="width : 50%;border: 2px solid #000000;
    	border-radius: 5px;">
							<img src="../asset/icons/svg/black/language_FILL0_wght400_GRAD0_opsz48.svg" class="logo-right-menu" style="height: 60px;" alt="Home">
						</a>
						<a href="#modal-compagny" class="header-logo-link js-modal" style="width : 50%;border: 2px solid #000000;
    	border-radius: 5px; margin-left: 10px;">
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
							<h1 class="js-titre-h1" style="margin-left: 0 ;" data-i18n="langue_i18n">Choisissez votre langue</h1>
							<div class="u-modal-item">
						
							<button class="header-boutton-language-struc u-rebond-fleche" id="change-language-button">
								<div class="Pfren"><span>FR/EN</span></div>
								<div class="logofleche"><img src="../asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche"></div>

							</button> <!--  bouton -->


							<!-- <button class="header-boutton-language-struc u-rebond-fleche" id="change-language-button">
								<div class="belwen1">
									<di class="center1"><span>EN/FR</span></div>
									<img src="../asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
								</div>
							</button> -->


								<!-- <a href="about-us.php" class="header-boutton-language-struc u-rebond-fleche" >
									<div class="header-boutton-text">
										<span class="js-a-text-18">Français </span><span style="font-size: 14px; font-weight: 500;">(FR)</span>
									</div>
									<div class="u-item-content-button--fleche--">
										<img src="../asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
									</div>
								</a>
								<a href="../eng/about-us.php" class="header-boutton-language-struc u-rebond-fleche" >
									<div class="header-boutton-text" lang="en">
										<span class="js-a-text-18">English </span><span style="font-size: 14px; font-weight: 500;">(UK-US)</span>
									</div>
									<div class="u-item-content-button--fleche--" >
										<img src="../asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg" class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
									</div>
								</a> -->


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
													<span class="js-a-text-18" data-i18n="site_skyconseil_i18n">Aller sur le site de SKYCONSEIL</span>
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
				<div class="a-slider js-a-contrast-header">
					<div class="a-icon"><img src="../asset/icons/svg/white/augmentation de la police.svg" class="u-cover" id="augmentation-a"></div>
					<input type="range" id="slider" min="14" max="30" value="14" step="3.2">
					<div class="a-icon"><img src="../asset/icons/svg/white/Baisse de la police.svg" class="u-cover" id="diminution-a"></div>
				</div>
				<div class="a-menu js-a-contrast-header">
					<button type="button" class="a-menu-item">
						<a href="">
							<img class="a-icon" id="a-contraste" src="../asset/icons/svg/white/contrast_FILL0_wght400_GRAD0_opsz48.svg">
						</a>
					</button>	
				</div>
			</div>
		</header>
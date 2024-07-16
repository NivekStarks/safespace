<?php include_once('../php/ScriptConnection.php'); ?>
<?php
session_start();

$sqlQuery = 'select COUNT(IdOffre) from offre';
$prep = $mysqlClient->prepare($sqlQuery);
$prep->execute();
$nombres = $prep->fetchAll();

foreach ($nombres as $nombre) {

    $nbOffre = $nombre["COUNT(IdOffre)"];

}

$sqlQuery = 'SELECT Motcle1, Motcle2, Motcle3, Motcle4, Motcle5 FROM `offre`';
$prep = $mysqlClient->prepare($sqlQuery);
$prep->execute();
$motscles = $prep->fetchAll();

$sqlQuery = 'SELECT *  from offre ORDER BY DateAjoutOffre DESC ';
$prep = $mysqlClient->prepare($sqlQuery);
$prep->execute();
$emplois = $prep->fetchAll();

$sqlQuery = 'SELECT *  from offre ORDER BY DateAjoutOffre DESC LIMIT 6';
$prep = $mysqlClient->prepare($sqlQuery);
$prep->execute();
$emploisplus = $prep->fetchAll();

$sqlQuery = 'SELECT *  from offre ORDER BY DateAjoutOffre DESC LIMIT 1000000 OFFSET 6';
$prep = $mysqlClient->prepare($sqlQuery);
$prep->execute();
$emploisapres = $prep->fetchAll();

$mots = array();
foreach ($motscles as $motscle) {
    array_push($mots, $motscle['Motcle1']);
    array_push($mots, $motscle['Motcle2']);
    array_push($mots, $motscle['Motcle3']);
    array_push($mots, $motscle['Motcle4']);
    array_push($mots, $motscle['Motcle5']);
}

$result = array_unique($mots);
sort($result);

if (!empty($_POST['key-words']) && !empty($_POST['contract-type']) && !empty($_POST['localisation']) && !empty($_POST['order-by'])) {
    $_SESSION['motR'] = $_POST['key-words'];
    $_SESSION['contratR'] = $_POST['contract-type'];
    $_SESSION['localisationR'] = $_POST['localisation'];
    $_SESSION['ordreR'] = $_POST['order-by'];

    $sqlQuery = "SELECT *  from offre WHERE Contrat like '" . $_POST['contract-type'] . "' AND Ville like '" . $_POST['localisation'] . "' AND (Motcle1 like '" . $_SESSION['motR'] . "' OR Motcle2 like '" . $_SESSION['motR'] . "' OR Motcle3 like '" . $_SESSION['motR'] . "' OR Motcle4 like '" . $_SESSION['motR'] . "' OR Motcle5 like '" . $_SESSION['motR'] . "') ORDER BY DateAjoutOffre " . $_SESSION['ordreR'] . "";
    $prep = $mysqlClient->prepare($sqlQuery);
    $prep->execute();
    $resultats = $prep->fetchAll();

    $sqlQuery = "SELECT COUNT(IdOffre)  from offre WHERE Contrat like '" . $_POST['contract-type'] . "' AND Ville like '" . $_POST['localisation'] . "' AND (Motcle1 like '" . $_SESSION['motR'] . "' OR Motcle2 like '" . $_SESSION['motR'] . "' OR Motcle3 like '" . $_SESSION['motR'] . "' OR Motcle4 like '" . $_SESSION['motR'] . "' OR Motcle5 like '" . $_SESSION['motR'] . "') ORDER BY DateAjoutOffre " . $_SESSION['ordreR'] . "";
    $prep = $mysqlClient->prepare($sqlQuery);
    $prep->execute();
    $nombres = $prep->fetchAll();

    foreach ($nombres as $nombre) {

        $nboffreSQL = $nombre["COUNT(IdOffre)"];

    }

}


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
    <title data-i18n="skyincap-carrieres_i18n">Skyincap - Carrières</title>
    <link href="../style/carriere.css" rel="stylesheet" type="text/css">
    <link href="../style/css-1920.css" rel="stylesheet" type="text/css">
    <link href="../style/reset.css" rel="stylesheet" type="text/css">
    <link href="../style/fonts.css" rel="stylesheet" type="text/css">
    <link href="../style/header-footer.css" rel="stylesheet" type="text/css">
    <link href="../style/main.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php include('header.php') ?>

<main>
    <div class="section1 carriere">
        <div class="container js-a-contrast-dark">
            <a href="#Carriere"><img
                        src="../asset/icons/svg/white/keyboard_double_arrow_up_FILL0_wght400_GRAD0_opsz48 2.svg"
                        class="double-fleche" alt="Double flèche pour descendre"></a>
        </div>
    </div>
    <div class="section2">
        <div class="s2-container">
            <div class="s2-titre-principal">
                <h1 id="Carriere" data-i18n="Carriere_carriere_i18n" class="js-a-titre-h1"> Votre carriere chez </h1>
                <img class="logo-picture" src="../asset/logo/Proposition_New_logo-color.png"/>

            </div>
            <!-- <h1 id="h1-mobile"><span class="u-titre-principal-color-mobile js-a-titre-h1">SKYINCAP</span></h1> -->
            <div class="s2-temoignage">
                <div class="s8-temoignage-img">
                    <img class="s8-temoignage-img--"
                         src="../asset/images/stock-photo-smiling-young-woman-leaning-on-an-island-in-her-kitchen-at-home-browsing-online-with-a-laptop-2321151347.webp"
                         alt="">
                </div>
                <div class="s8-temoignage-text">
                    <span class="u-temoignage-text--temoignge js-a-text-18" data-i18n="carriere_salariés_i18n"></span>
                    <div class="u-temoignage-text--- u-temoignage-text---padding">
                        <span class="u-temoignage-text--Nom js-a-text-14">Delphine MOLINIER</span>
                        <br>
                        <span class="u-temoignage-text--- js-a-text-14" data-i18n="carriere_directrice_i18n">Directrice opérationnelle</span>
                    </div>
                </div>
            </div>
        </div>
            <!-- <div class="u-separateur gris"></div>
            <div class="s2-item">
                <div class="s2-item-titre">
                    <h3 class="js-a-titre-h3" data-i18n="carriere_ingénieur_i18n">Vous êtes ingénieur(e)</h3>
                </div>
                <div class="s2-item-content">
                    <div class="s2-item-content-button-item">
                        <button class="s2-item-content-button-item--">
                            <a href="#modal-inge" class="s2-item-content-button-- js-modal">
                                <div class="s2-item-content-button--texte">
                                    <span class="js-a-text-14" data-i18n="carriere_savoir_i18n">En savoir plus</span>
                                </div>
                                <div class="s2-item-content-button--fleche">
                                    <img src="../asset/icons/svg/black/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg"
                                         class="u-item-content-button--fleche---" alt="fleche">
                                </div>
                            </a>
                        </button>
                        <aside id="modal-inge" class="u-modal" style="display: none;">
                            <div class="u-modal-wrapper js-modal-stop js-a-text-14">
                                <div class="modal-header">
                                    <bouton class="js-close-modal">&times; CLOSE</bouton>

                                </div>
                                <div class="modal-body">
                                    <h2 class="js-titre-h2" data-i18n="carriere_ingénieur_i18n">Vous êtes
                                        ingénieur(e)</h2>
                                    <p class="js-a-text" data-i18n="carriere_specialise_i18n">Entreprise spécialisée en
                                        ingénierie haute technologie, Skyincap est à l’écoute de nouveaux profils pour
                                        des postes de niveau ingénieur afin d’accompagner sa croissance sur des projets
                                        innovants.</p>
                                    <br><br>
                                    <p class="js-a-text" data-i18n="carriere_specialise2_i18n">Continuons de développer
                                        le projet Skyincap ensemble !</p>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
            <div class="u-separateur gris"></div>
            <div class="s2-item">
                <div class="s2-item-titre">
                    <h3 class="js-a-titre-h3" data-i18n="carriere_fonction_i18n">Les fonctions support</h3>
                </div>
                <div class="s2-item-content">
                    <div class="s2-item-content-button-item">
                        <button id="Btn-rhc" class="s2-item-content-button-item--">
                            <a href="#modal1" class="s2-item-content-button-- js-modal" style="z-index: 10;">
                                <span class="s2-item-content-button--texte js-a-text-14" data-i18n="carriere_savoir_i18n">En savoir plus</span>
                                <div class="s2-item-content-button--fleche">
                                    <img src="../asset/icons/svg/black/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg"
                                         class="u-item-content-button--fleche---" alt="fleche">
                                </div>
                            </a>
                        </button>
                        <aside id="modal1" class="u-modal" style="display: none;">
                            <div class="u-modal-wrapper js-modal-stop js-a-text-14">
                                <div class="modal-header">
                                    <bouton class="js-close-modal">&times; CLOSE</bouton>
                                </div>
                                <div class="modal-body">
                                    <h2 class="js-titre-h2" data-i18n="carriere_fonction_i18n">Les fonctions
                                        support</h2>
                                    <p class="js-a-text" data-i18n="carriere_assure_i18n">Afin d’assurer la gestion de
                                        l’entreprise, nous disposons de services supports (ressources humaines,
                                        communication…).</p>
                                    <br><br>
                                    <p class="js-a-text" data-i18n="carriere_assure2_i18n">Envie de compter parmi nos
                                        effectifs ? Rejoignez-nous !</p>
                                    </p>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
            <div class="u-separateur gris"></div>
            <div class="s2-item">
                <div class="s2-item-titre">
                    <h3 class="js-a-titre-h3" data-i18n="carriere_evolution_i18n">Les évolutions de carrière</h3>
                </div>
                <div class="s2-item-content">
                    <div class="s2-item-content-button-item">
                        <button id="Btn-carr" class="s2-item-content-button-item--">
                            <a href="#modal-carr" class="s2-item-content-button-- js-modal">
                                <div class="s2-item-content-button--texte">
                                    <span class="js-a-text-14" data-i18n="carriere_savoir_i18n">En savoir plus</span>
                                </div>
                                <div class="s2-item-content-button--fleche">
                                    <img src="../asset/icons/svg/black/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg"
                                         class="u-item-content-button--fleche---" alt="fleche">
                                </div>
                            </a>
                        </button>
                        <aside id="modal-carr" class="u-modal" style="display: none;">
                            <div class="u-modal-wrapper js-modal-stop js-a-text-14">
                                <div class="modal-header">
                                    <bouton class="js-close-modal">&times; CLOSE</bouton>

                                </div>
                                <div class="modal-body">
                                    <h2 class="js-titre-h2" data-i18n="carriere_evolution_i18n">Les évolutions de
                                        carrière</h2>
                                    <p class="js-a-text" data-i18n="carriere_identité_i18n">Du fait de son identité
                                        start-up, Skyincap fait preuve d’agilité vis-à-vis de ses équipes en favorisant
                                        notamment la prise de responsabilité sur des projets innovants et la montée en
                                        compétence.</p>
                                    <br><br>
                                    <p class="js-a-text">A FINIR</p>
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div> -->
        <!-- </div> -->
    </div>
    <div class="section-image"></div>
    <div class="section4">
        <div class="u-container">
            <div class="u-top-column" id="offre">
                <div class="u-top-titre-principal" id="offres">
                    <h1 data-i18n="carriere_emploi_i18n" class="js-a-titre-h1">Nos offres d'emploi</h1>
                </div>
                <div class="u-top-text-long">
                    <div class="s4-top-filtre-content">
                        <form id="s4-filters2" method="post" action="carriere.php#offre" class="u-row">
                            <div class="row1"><label for="filtre" data-i18n="carriere_filtrer_i18n">Filtrer par :</label>
                            <div class="s4-filters-item">
                                <label for="key-words"></label>
                                <select name="key-words" id="key-words" class="bouton-filtre js-a-contrast-dark">
                                    <option value="%" data-i18n="carriere_keyword_i18n">Mots Clés</option>
                                    <?php foreach ($result as $mot) { ?>
                                        <option value="<?php echo $mot; ?>"><?php echo $mot; ?></option>
                                    <?php } ?>
                                </select>
                                <div class="s4-filters-icon">
                                    <img src="../asset/icons/svg/white/add_FILL0_wght400_GRAD0_opsz48 2.svg"
                                         class="u-item-content-button--fleche---" alt="fleche">
                                </div>
                            </div>
                            <div class="s4-filters-item">
                                <label for="contract-type"></label>
                                <select name="contract-type" id="contract-type" class="bouton-filtre js-a-contrast-dark">
                                    <option value="%" data-i18n="carriere_contrat_i18n">Contrat</option>
                                    <option value="CDI" data-i18n="carriere_cdi_i18n">CDI</option>
                                    <option value="CDD" data-i18n="carriere_cdd_i18n">CDD</option>
                                    <option value="Stage" data-i18n="carriere_stage_i18n">Stage</option>
                                    <option value="Alternance" data-i18n="carriere_alternance_i18n">Alternance</option>
                                </select>
                                <div class="s4-filters-icon">
                                    <img src="../asset/icons/svg/white/add_FILL0_wght400_GRAD0_opsz48 2.svg"
                                         class="u-item-content-button--fleche---" alt="fleche">
                                </div>
                            </div>
                            <div class="s4-filters-item s4-filter-margin-ajust">
                                <label for="localisation"></label>
                                <select name="localisation" id="localisation" class="bouton-filtre js-a-contrast-dark">
                                    <option value="%" data-i18n="carriere_ville_i18n">Ville</option>
                                    <option value="Toulouse">Toulouse</option>
                                    <option value="Nice">Nice</option>
                                </select>
                                <div class="s4-filters-icon">
                                    <img src="../asset/icons/svg/white/add_FILL0_wght400_GRAD0_opsz48 2.svg"
                                         class="u-item-content-button--fleche---" alt="fleche">
                                </div>
                            </div></div>
                            <div class="row1"><label for="order-by" id="SomeLabel" class="space1" data-i18n="carriere_trier_par_i18n">Trier par :</label>
                            <div class="s4-filters-item">
                                <select name="order-by" id="order-by" class="bouton-filtre order-filtre js-a-contrast-dark">
                                    <option value="DESC" data-i18n="carriere_recent_i18n">Le plus récent</option>
                                    <option value="ASC" data-i18n="carriere_ancien_i18n">Le plus ancien</option>
                                </select>
                                <div class="s4-filters-icon">
                                    <img src="../asset/icons/svg/white/add_FILL0_wght400_GRAD0_opsz48 2.svg"
                                         class="u-item-content-button--fleche---" alt="fleche">
                                </div>
                            </div>
                            <div class="s4-filters-item">
                                <input id="appliquerFiltres" data-i18n-key="carriere_appliquer_filtres_i18n" type="submit" name="submit" class="bouton-filtre order-filtre js-a-contrast-dark" value="">
                                
                                <div class="s4-filters-icon" id="last">
                                    <img src="../asset/icons/svg/white/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg"
                                         class="u-item-content-button--fleche---" alt="fleche">
                                </div>
                            </div></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="s4-midlle">
                <div class="s4-middle-mot-cles">
                    <div class="s4-middle-mot-cles-item s4-middle-mc js-a-contrast-dark"><span>Mots Clés</span>
                    </div>
                    <div class="s4-middle-mot-cles-item s4-middle-contart js-a-contrast-dark"><span>Contrat</span>
                    </div>
                    <div class="s4-middle-mot-cles-item s4-middle-loc js-a-contrast-dark"><span>Localisation</span>
                    </div>
                    <div class="s4-middle-mot-cles-item s4-middle-apply js-a-contrast-dark"><span>Apply</span></div>
                    </form>
                </div>
                <?php if (!isset($_POST['key-words'])): ?>
                <?php if ($nbOffre <= 6): ?>
                <div class="s4-middle-offres">
                    <?php foreach ($emplois as $emploi) { ?>
                        <div class="s4-middle-offres-item">
                            <div class="u-separateur noir s4-separateur"></div>
                            <div class="s4-offre-container">
                                <div class="s4-titre-offre">
                                    <h2 class="js-titre-h2"><?php echo $emploi['NomOffre']; ?></h2>
                                </div>
                                <div class="s4-offre-keyword">
                                    <div class="s4-offre-kw--"><span
                                                class="border-arrondi"><?php echo $emploi['Motcle1']; ?></span></div>
                                    <div class="s4-offre-kw--"><span
                                                class="border-arrondi"><?php echo $emploi['Motcle2']; ?></span></div>
                                    <div class="s4-offre-kw--"><span
                                                class="border-arrondi"><?php echo $emploi['Motcle3']; ?></span></div>
                                    <div class="s4-offre-kw--"><span
                                                class="border-arrondi"><?php echo $emploi['Motcle4']; ?></span></div>
                                    <div class="s4-offre-kw--"><span
                                                class="border-arrondi"><?php echo $emploi['Motcle5']; ?></span></div>
                                </div>
                                <div class="s4-offre-contrat">
									<span>
                                    <p class="petit"> Contrat : </p> <h4
                                                style="display:inline-block"><?php echo $emploi['Contrat']; ?></h4>
									</span>
                                </div>
                                <div class="s4-offre-ville">
									<span>
                                    <p class="petit"> Ville : </p> <h4
                                                style="display:inline-block"><?php echo $emploi['Ville']; ?></h4>
									</span>
                                </div>
                                <div class="s4-offre-apply">
                                    <a href=<?php echo $emploi['Lien']; ?> target="_blank"><img
                                                src="../asset/icons/svg/black/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg"
                                                class="s4-offre-apply-fleche" alt=""></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <?php else: ?>
                    <div class="s4-middle-offres">
                        <?php foreach ($emploisplus as $emploi) { ?>
                            <div class="s4-middle-offres-item">
                                <div class="u-separateur noir s4-separateur"></div>
                                <div class="s4-offre-container">
                                    <div class="s4-titre-offre">
                                        <h2><?php echo $emploi['NomOffre']; ?></h2>
                                    </div>
                                    <div class="s4-offre-keyword">
                                        <div class="s4-offre-kw--"><span
                                                    class="border-arrondi"><?php echo $emploi['Motcle1']; ?></span>
                                        </div>
                                        <div class="s4-offre-kw--"><span
                                                    class="border-arrondi"><?php echo $emploi['Motcle2']; ?></span>
                                        </div>
                                        <div class="s4-offre-kw--"><span
                                                    class="border-arrondi"><?php echo $emploi['Motcle3']; ?></span>
                                        </div>
                                        <div class="s4-offre-kw--"><span
                                                    class="border-arrondi"><?php echo $emploi['Motcle4']; ?></span>
                                        </div>
                                        <div class="s4-offre-kw--"><span
                                                    class="border-arrondi"><?php echo $emploi['Motcle5']; ?></span>
                                        </div>
                                    </div>
                                    <div class="s4-offre-contrat">
									<span>
									<p class="petit"> Contrat : </p> <h4
                                                style="display:inline-block"><?php echo $emploi['Contrat']; ?></h4>
									</span>
                                    </div>
                                    <div class="s4-offre-ville">
									<span>
                                    <p class="petit"> Ville : </p> <h4
                                                style="display:inline-block"><?php echo $emploi['Ville']; ?></h4>
									</span>
                                    </div>
                                    <div class="s4-offre-apply">
                                        <a href=<?php echo $emploi['Lien']; ?> target="_blank"><img
                                                    src="../asset/icons/svg/black/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg"
                                                    class="s4-offre-apply-fleche" alt=""></a>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                        <div id="barre1" onclick="dropdown()" class="s4-bottom-actu-struct">
                            <button>
                                <a class="s4-bottom-actu-button--">
                                    <div class="s4-bottom-actu-content-boutton-text">
                                        <span>Voir l'ensemble de nos offres</span>
                                    </div>
                                    <div class="s4-mid-actu-content-boutton-fleche">
                                        <img src="asset/icons/svg/white/keyboard_double_arrow_up_FILL0_wght400_GRAD0_opsz48 2.svg"
                                             class="s4-mid-actu-content-boutton-fleche--" alt="fleche">
                                    </div>
                                </a>
                            </button>
                        </div>
                        <div class="s4-middle-offres" style="display:none" id="bloc">
                            <?php foreach ($emploisapres as $emploi) { ?>
                                <div class="s4-middle-offres-item">
                                    <div class="u-separateur noir s4-separateur"></div>
                                    <div class="s4-offre-container">
                                        <div class="s4-titre-offre">
                                            <h2><?php echo $emploi['NomOffre']; ?></h2>
                                        </div>
                                        <div class="s4-offre-keyword">
                                            <div class="s4-offre-kw--"><span
                                                        class="border-arrondi"><?php echo $emploi['Motcle1']; ?></span>
                                            </div>
                                            <div class="s4-offre-kw--"><span
                                                        class="border-arrondi"><?php echo $emploi['Motcle2']; ?></span>
                                            </div>
                                            <div class="s4-offre-kw--"><span
                                                        class="border-arrondi"><?php echo $emploi['Motcle3']; ?></span>
                                            </div>
                                            <div class="s4-offre-kw--"><span
                                                        class="border-arrondi"><?php echo $emploi['Motcle4']; ?></span>
                                            </div>
                                            <div class="s4-offre-kw--"><span
                                                        class="border-arrondi"><?php echo $emploi['Motcle5']; ?></span>
                                            </div>
                                        </div>
                                        <div class="s4-offre-contrat">
									<span>
                                    <p class="petit"> Contrat : </p> <h4
                                                style="display:inline-block"><?php echo $emploi['Contrat']; ?></h4>
									</span>
                                        </div>
                                        <div class="s4-offre-ville">
									<span>
                                    <p class="petit"> Ville : </p> <h4
                                                style="display:inline-block"><?php echo $emploi['Ville']; ?></h4>
									</span>
                                        </div>
                                        <div class="s4-offre-apply">
                                            <a href=<?php echo $emploi['Lien']; ?> target="_blank"><img
                                                        src="../asset/icons/svg/black/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg"
                                                        class="s4-offre-apply-fleche" alt=""></a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php endif; ?>
                            <?php else: ?>
                            <div class="s4-middle-offres">
                                <?php if ($nboffreSQL == 0): ?>
                                    <div class="s4-middle-offres-item">
                                        <div class="u-separateur noir s4-separateur"></div>
                                        <div class="s4-offre-container">
                                            <div class="s4-titre-offre">
                                                <h2>Il n'y a pas d'offre disponibles selon vos critères</h2>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <?php foreach ($resultats as $resultat) { ?>
                                        <div class="s4-middle-offres-item">
                                            <div class="u-separateur noir s4-separateur"></div>
                                            <div class="s4-offre-container">
                                                <div class="s4-titre-offre">
                                                    <h2><?php echo $resultat['NomOffre']; ?></h2>
                                                </div>
                                                <div class="s4-offre-keyword">
                                                    <div class="s4-offre-kw--"><span
                                                                class="border-arrondi"><?php echo $resultat['Motcle1']; ?></span>
                                                    </div>
                                                    <div class="s4-offre-kw--"><span
                                                                class="border-arrondi"><?php echo $resultat['Motcle2']; ?></span>
                                                    </div>
                                                    <div class="s4-offre-kw--"><span
                                                                class="border-arrondi"><?php echo $resultat['Motcle3']; ?></span>
                                                    </div>
                                                    <div class="s4-offre-kw--"><span
                                                                class="border-arrondi"><?php echo $resultat['Motcle4']; ?></span>
                                                    </div>
                                                    <div class="s4-offre-kw--"><span
                                                                class="border-arrondi"><?php echo $resultat['Motcle5']; ?></span>
                                                    </div>
                                                </div>
                                                <div class="s4-offre-contrat">
									<span>
                                    <p class="petit"> Contrat : </p> <h4
                                                style="display:inline-block"><?php echo $resultat['Contrat']; ?></h4>
									</span>
                                                </div>
                                                <div class="s4-offre-ville">
									<span>
                                    <p class="petit"> Ville : </p> <h4
                                                style="display:inline-block"><?php echo $resultat['Ville']; ?></h4>
									</span>
                                                </div>
                                                <div class="s4-offre-apply">
                                                    <a href=<?php echo $resultat['Lien']; ?> target="_blank"><img
                                                                src="../asset/icons/svg/black/arrow_forward_FILL0_wght400_GRAD0_opsz48.svg"
                                                                class="s4-offre-apply-fleche" alt=""></a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="u-lien-linkedin u-ll-gris">
                    <div class="u-container">
                        <div class="u-ll-struct">
                            <div class="u-ll-titre">

                                <p class="u-ll-titre-- js-a-text" data-i18n="RetrouvezLink_i18n"><br class="u-br"></p>
                                <p class="u-ll-titre-- js-a-text"><a href="https://www.linkedin.com/company/skyincap/"
                                                                     target="_blank"
                                                                     class="u-ll-titre-lien">Linkedin</a></p>

                            </div>

                            <div class="u-ll-texte">
                                <p class="u-ll-texte-- js-a-text" data-i18n="Découvrez_Linkedin_i18n">Découvrez nos
                                    actualités et l’ensemble de nos opportunités professionnelles sur LinkedIn.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="u-creative-code"></div>
</main>

<?php include('../php/banner.php') ?>

<?php include('footer.php') ?>

</body>
<script src="../script/activePage.js"></script>
<script src="../script/app.js"></script>
<script src="../script/accessibility.js"></script>
<script src="../script/header.js"></script>
<script src="../script/main.js"></script>

<script>

    function dropdown() {
        document.getElementById("bloc").style.display = "block";
        document.getElementById("barre1").style.display = "none";
    }

</script>

</html>






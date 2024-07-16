<?php
// Vérifie si le cookie 'accept_cookies' est défini
if (!isset($_COOKIE['accept_cookies'])) {
    // Si le cookie n'est pas défini, affiche la bannière de cookies
    ?>
    <div class="cookie-banner colonne-Bonjour-cookies">
        <div class="titre-text-cookies">
            <h1 class="js-a-titre-h3" data-i18n="cookies-bonjour_i18n">Bonjour voyageur, c'est l'heure des cookies !</h1>
            <p class="js-a-text" data-i18n="cookies-bonjour-2_i18n">Ce site utilise des cookies. En continuant à naviguer sur ce site, vous acceptez notre utilisation des cookies.</p>
        </div>
        <div class="cookie-buttons">
            <button class="button-28" onclick="acceptCookies()" data-i18n="cookies-accepter_i18n">Tout accepter</button><br>
            <button class="button-28" onclick="refuseCookies()" data-i18n="cookies-refuser_i18n">Tout refuser</button>
        </div>
        <div class="place-gauche-politique">
            <?php
            // Vérifier si la page est index.php
            $page = basename($_SERVER['PHP_SELF']);
            $page_donnees = ($page === 'index.php') ? 'pages/donnees-personnelles.php' : '../pages/donnees-personnelles.php';
            $page_cgu = ($page === 'index.php') ? 'pages/cgu.php' : '../pages/cgu.php';
            ?>
            <a href="<?php echo $page_donnees; ?>" class="text-politique js-a-menu-header hover-underline-animation" data-i18n="Données-personnelles-cookies_date_i18n">Politique de confidentialité</a>
            <a href="<?php echo $page_cgu; ?>" class="text-politique js-a-menu-header termes-margin hover-underline-animation" data-i18n="cookies-Mentions-légales_i18n">Mentions légales</a>
        </div>
    </div>
    <?php
}
?>



<?php
// Vérifier si la page est index.php
$page = basename($_SERVER['PHP_SELF']);
$stylePath = ($page === 'index.php') ? 'style/banner.css' : '../style/banner.css';
?>

<head>
    <link rel="stylesheet" href="<?php echo $stylePath; ?>">
</head>




<script>
    function acceptCookies() {
        // Définir un cookie 'accept_cookies' avec une durée de validité d'un an
        document.cookie = "accept_cookies=true; expires=" + new Date(new Date().getTime() + 365 * 24 * 60 * 60 * 1000).toUTCString() + "; path=/";

        // Cacher la bannière de cookies
        document.querySelector('.cookie-banner').style.display = 'none';
    }

    function refuseCookies() {
        // Vous pouvez ajouter une action spécifique pour le refus des cookies
        // Par exemple, rediriger l'utilisateur vers une page sans suivi
        // Pour l'instant, refuser ou accepter les cookies ne change rien car aucun cookie n'est collecté
        document.cookie = "accept_cookies=true; expires=" + new Date(new Date().getTime() + 365 * 24 * 60 * 60 * 1000).toUTCString() + "; path=/";

        // Cacher la bannière de cookies
        document.querySelector('.cookie-banner').style.display = 'none';
    }
</script>

</html>
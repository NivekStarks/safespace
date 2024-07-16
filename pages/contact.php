<?php
///////////////////////////////////////
//////////// A ENLEVER ////////////////
///////////////////////////////////////

// use PHPMailer\PHPMailer\PHPMailer;
// use PHPMailer\PHPMailer\Exception;

// require 'PHPMailer/src/Exception.php';
// require 'PHPMailer/src/PHPMailer.php';
// require 'PHPMailer/src/SMTP.php';

// $mailSent = false; // Initialisez la variable

// if (isset($_POST['submit'])) {
//     $nom = $_POST['nom'];
//     $prenom = $_POST['prenom'];
//     $mailClient = $_POST['mail'];
//     $type = $_POST['type'];
//     $objet = $_POST['objet'];
//     $message = $_POST['message'];

//     // Instantiation de PHPMailer
//     $mail = new PHPMailer(true);

//     try {
//         // Configuration du serveur SMTP
//         $mail->isSMTP();
//         $mail->Host = 'A COMPLETER'; // Remplacez par votre serveur SMTP
//         $mail->SMTPAuth = true;
//         $mail->Username = 'A COMPLETER'; // Remplacez par votre adresse e-mail
//         $mail->Password = 'A COMPLETER'; // Remplacez par votre mot de passe e-mail
//         $mail->SMTPSecure = 'tls';
//         $mail->Port = 587;

//         // Destinataire et expéditeur
//         $mail->setFrom('A COMPLETER', 'Votre Nom');
//         $mail->addAddress('A COMPLETER', 'Destinataire');

//         // Contenu du mail
//         $mail->isHTML(true);
//         $mail->Subject = 'Nouveau message de ' . $nom . ' ' . $prenom;
//         $mail->Body = 'Nom d\'entreprise : ' . $type . '<br>' .
//             'Objet : ' . $objet . '<br>' .
//             'Message : ' . $message . '<br>' .
//             'Adresse e-mail : ' . $mailClient;

//         // Envoi du mail
//         $mail->send();

//         // Mettez à jour la variable $mailSent
//         $mailSent = true;
//     } catch (Exception $e) {
//         echo "Erreur lors de l'envoi du message : {$mail->ErrorInfo}";
//     }
// }
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
	<title>Skyincap - Contact</title>
	<link href="../style/contact.css" rel="stylesheet" type="text/css">
	<link href="../style/css-1920.css" rel="stylesheet" type="text/css">
	<link href="../style/reset.css" rel="stylesheet" type="text/css">
	<link href="../style/fonts.css" rel="stylesheet" type="text/css">
	<link href="../style/header-footer.css" rel="stylesheet" type="text/css">
	<link href="../style/main.css" rel="stylesheet" type="text/css">
</head>

<body>

	<?php include('header.php') ?>

	<main>
		<div class="section1 contact" style="height: 75vh;">
			<div class="container js-a-contrast-dark">
				<a href="#Contact"><img
						src="../asset/icons/svg/white/keyboard_double_arrow_up_FILL0_wght400_GRAD0_opsz48 2.svg"
						class="double-fleche" alt="Double flèche pour descendre"></a>
			</div>
		</div>
		<div class="section2">
			<div class="u-container">
				<div class="u-top-column-t-long">
					<div class="column-gauche-contact">
						<h1 id="Contact" class="no-margin js-a-titre-h1" data-i18n="Nous_contacter_i18n"> 
							<span class="u-titre-principal-color"> Nous contacter </span>
						</h1>
						<div class="row-contact-email hover-underline-animation">
							<img class="icon-email" src="../asset/icons/png/email.png" alt="">
							<a href="mailto:contact@skyincap.com"><p class="js-a-text-18">contact@skyincap.com</p></a>
						</div>
					</div>
					
					<div class="u-top-text-long">
						<!-- ///////// -->
						<!-- A ENLEVER -->
						<!-- ///////// -->
						<!-- <form method="post" action=""> -->
						<form id="myForm" method="post" action="#">
							<input class="formContact " type="text" name="nom" autocomplete="family-name"
								data-i18n="contact_nom_i18n" placeholder="Nom*" required>
							<input class="formContact" type="text" name="prenom" autocomplete="name"
								data-i18n="contact_prenom_i18n" placeholder="Prénom*" required>
							<input class="formContact" type="email" name="mail" autocomplete="email"
								data-i18n="contact_email_i18n" placeholder="Email*" required>
							<input class="formContact" type="text" name="type" data-i18n="contact_nomentreprise_i18n"
								placeholder="Nom de l'entreprise ">
							<input class="formContact" type="text" name="objet" data-i18n="contact_objet_i18n"
								placeholder="Objet*" required>
							<textarea class="formContact2" type="text" name="message" placeholder="Message*"
								required></textarea>
							<p style="color: red ; margin-bottom : 1.5em" data-i18n="contact_champs-oligatoire_i18n">
								*champs obligatoire</p>
							
							<input class="formSubmit formInput js-a-contrast-dark2" name="submit" type="submit" style="width:100% ; cursor: pointer; color:white; height: 40px; background-color:#4861AD; font-weight: bold; font-size: 15px;text-align: left;" data-i18n="contact_bouton_i18n" value="Envoyer le message" onclick="sendMail()">
							<!-- ///////// -->
							<!-- A ENLEVER -->
							<!-- ///////// -->
							<!-- <a href="#modal-mail" class="js-modal"> 
								<input class="formSubmit formInput" name="submit" type="submit" style="width:100% ; cursor: pointer; ;color:white; height: 40px; background-color:#4861AD;font-weight: bold; font-size: 15px;text-align: left;" data-i18n="contact_bouton_i18n" value="Envoyer le message">
							</a> -->
						</form>
					</div>
				</div>
			</div>
		</div>

		<aside id="modal-mail" class="u-modal" style="display: none;">
            <div class="u-modal-wrapper js-modal-stop">
                <div class="modal-header">
                    <bouton class="js-close-modal close-modal">&times; CLOSE</bouton>    
                </div>
                <div class="modal-body">
					<h1 class="no-margin">
						<span class="u-titre-principal-color" data-i18n="<?php echo $mailSent ? 'email_sent_success_i18n' : 'email_sent_error_i18n'; ?>"></span>
					</h1>
				</div>
            </div>
        </aside>

		<div class="section3">
			<div class="u-container">
				<div class="s3-4-titre">
					<h1 class="js-a-titre-h1" data-i18n="Nos_agences_i18n">Nos agences</h1>
				</div>
				<div class="s3-4-content">
					<h2 class="js-titre-h2">Toulouse</h2>
					<p class="js-a-text" data-i18n="Siège_i18n">(Siège)</p>
					<div class="s3-item-container">
						<div class="s3-item">
							<div class="s3-item-logo">
								<img class="s3-logo" src="../asset/icons/svg/black/locaux.svg"
									alt="pictogramme d'un local">
							</div>
							<p class="s3-content-- js-a-text">
								<!-- <span class="bold">Adresse de l'agence de Toulouse (Siège)</span> -->
								<!-- <br><br> -->
								1 rue du Professeur Pierre Vellas <br> Bâtiment B08 <br>
								31000 TOULOUSE <br><br>
								France
							</p>
						</div>
						<!-- <div class="s3-item">
							<div class="s3-item-logo">
								<img class="s3-logo" src="asset/icons/svg/black/telephone.svg" alt="pictogramme d'un local">
							</div>
							<p class="s3-4-content-- js-a-text">
								<span class="bold">Numéros de téléphones</span>
								<br><br>
								Numéro en cours de distibution.
							</p>
						</div> -->
						<div class="s3-image--">

						</div>
					</div>
					<div class="u-separateur gris" style="margin: 50px 0 50px 0;"></div>
					<h2 class="js-titre-h2">Nice</h2>
					<div class="s3-item-container">
						<div class="s3-item">
							<div class="s3-item-logo">
								<img class="s3-logo" src="../asset/icons/svg/black/locaux.svg"
									alt="pictogramme d'un local">
							</div>
							<p class="s3-content-- js-a-text">
								<!-- <span class="bold">Adresse de l'agence de Nice</span>
								<br><br> -->
								<br><br>
								470 Prom. des Anglais <br>
								06200 NICE <br><br>
								France
							</p>
						</div>
						<div class="s3-image2--">

						</div>
						<!-- <div class="s3-item">
							<div class="s3-item-logo">
								<img class="s3-logo" src="asset/icons/svg/black/telephone.svg" alt="pictogramme d'un local">
							</div>
							<p class="s3-4-content-- js-a-text">
								<span class="bold">Numéros de téléphones</span>
								<br><br>
								Numéro en cours de distibution.
							</p>
						</div> -->
					</div>
					<h2 class="js-titre-h2" style="display: none;">Nantes</h2>
					<!-- Il faut seulement changer le text et changer le display:none > display:flex -->
					<div class="s3-item-container" id="agence-nantes" style="display: none;">
						<div class="s3-item">
							<div class="s3-item-logo">
								<img class="s3-logo" src="../asset/icons/svg/black/locaux.svg"
									alt="pictogramme d'un local">
							</div>
							<p class="s3-content-- js-a-text">
								<span class="bold">Adresse de l'entreprise</span>
								<br><br>
								1 rue du Professeur Pierre Vellas <br> Bâtiment B08 <br>
								31000 TOULOUSE <br>
								France
							</p>
						</div>
						<div class="s3-item">
							<div class="s3-item-logo">
								<img class="s3-logo" src="../asset/icons/svg/black/locaux.svg"
									alt="pictogramme d'un local">
							</div>
							<p class="s3-4-content-- js-a-text">
								<span class="bold">Numéros de téléphones</span>
								<br><br>
								+33 581 976 996
							</p>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="u-lien-linkedin">
			<div class="u-container">
				<div class="u-ll-struct">
					<div class="u-ll-titre">

						<p class="u-ll-titre-- js-a-text" data-i18n="RetrouvezLink_i18n"><br class="u-br"></p>
						<p class="u-ll-titre-- js-a-text"><a href="https://www.linkedin.com/company/skyincap/"
								target="_blank" class="u-ll-titre-lien">Linkedin</a></p>

					</div>

					<div class="u-ll-texte">
						<p class="u-ll-texte-- js-a-text" data-i18n="Découvrez_Linkedin_i18n">Découvrez nos actualités
							et l’ensemble de nos opportunités professionnelles sur LinkedIn.</p>
					</div>
				</div>
			</div>
		</div>
		<?php include('../php/banner.php') ?>

		<div class="u-creative-code"></div>
	</main>

	<?php include('footer.php') ?>

</body>

<script>
	// Fonction pour mettre à jour les placeholders et le texte du bouton en fonction de la langue
	function updateTranslations(language) {

		var translationFile = language + '.json';

		fetch('../locales/' + translationFile)
			.then(response => response.json())
			.then(translationData => {
				var elements = document.querySelectorAll('[data-i18n]');
				elements.forEach(element => {
					var key = element.getAttribute('data-i18n');
					if (key === 'contact_bouton_i18n' || translationData[key]) {
						if (key === 'contact_bouton_i18n') {
							element.value = translationData[key];
						} else {
							element.placeholder = translationData[key];
						}
					}
				});
			});
	}

	document.getElementById('change-language-button').addEventListener('click', function () {
		var currentLanguage = document.documentElement.lang;
		var newLanguage = (currentLanguage === 'fr') ? 'en' : 'fr';
		document.documentElement.lang = newLanguage;
		updateTranslations(newLanguage);
	});
</script>


<script>
	/////////////////////
	// FONCTION MAILTO://
	/////////////////////
    function sendMail() {
        var nom = document.querySelector('input[name="nom"]').value;
        var prenom = document.querySelector('input[name="prenom"]').value;
        var mail = document.querySelector('input[name="mail"]').value;
        var type = document.querySelector('input[name="type"]').value;
        var objet = document.querySelector('input[name="objet"]').value;
        var message = document.querySelector('textarea[name="message"]').value;

        var subject = 'Message de ' + nom + ' ' + prenom;
        var body = 'Nom: ' + nom + '\n';
        body += 'Prénom: ' + prenom + '\n';
        body += 'Mail: ' + mail + '\n';
        body += 'Type: ' + type + '\n';
        body += 'Objet: ' + objet + '\n';
        body += 'Message: ' + message;

        var mailtoLink = 'mailto:destination@example.com' +
            '?subject=' + encodeURIComponent(subject) +
            '&body=' + encodeURIComponent(body);

        window.location.href = mailtoLink;
    }
</script>

<script src="../script/activePage.js"></script>
<script src="../script/app.js"></script>
<script src="../script/accessibility.js"></script>
<script src="../script/header.js"></script>
<script src="../script/main.js"></script>

</html>
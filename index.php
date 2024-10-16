<?php
include_once('include/connection.php');
session_start();

// Vérifier si le token CSRF est déjà défini dans la session
if (empty($_SESSION['csrf_token'])) {
    // Générer un token CSRF et le stocker dans la session
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

$cities = [
    "Paris" => ["lat" => 48.8566, "lon" => 2.3522],
    "Marseille" => ["lat" => 43.2965, "lon" => 5.3698],
    "Lyon" => ["lat" => 45.7640, "lon" => 4.8357],
    "Toulouse" => ["lat" => 43.6045, "lon" => 1.4442],
    "Nice" => ["lat" => 43.7102, "lon" => 7.2620],
    "Nantes" => ["lat" => 47.2184, "lon" => -1.5536],
    "Strasbourg" => ["lat" => 48.5734, "lon" => 7.7521],
    "Montpellier" => ["lat" => 43.6108, "lon" => 3.8767],
    "Bordeaux" => ["lat" => 44.8378, "lon" => -0.5792],
    "Lille" => ["lat" => 50.6292, "lon" => 3.0573],
    "Rennes" => ["lat" => 48.1173, "lon" => -1.6778],
    "Reims" => ["lat" => 49.2583, "lon" => 4.0317],
    "Le Havre" => ["lat" => 49.4944, "lon" => 0.1079],
    "Saint-Étienne" => ["lat" => 45.4397, "lon" => 4.3872],
    "Toulon" => ["lat" => 43.1242, "lon" => 5.9280],
    "Angers" => ["lat" => 47.4784, "lon" => -0.5632],
    "Grenoble" => ["lat" => 45.1885, "lon" => 5.7245],
    "Dijon" => ["lat" => 47.3220, "lon" => 5.0415],
    "Nîmes" => ["lat" => 43.8367, "lon" => 4.3601],
    "Aix-en-Provence" => ["lat" => 43.5297, "lon" => 5.4474],
    "Brest" => ["lat" => 48.3904, "lon" => -4.4861],
    "Limoges" => ["lat" => 45.8336, "lon" => 1.2611],
    "Clermont-Ferrand" => ["lat" => 45.7772, "lon" => 3.0870],
    "Tours" => ["lat" => 47.3941, "lon" => 0.6848],
    "Amiens" => ["lat" => 49.8950, "lon" => 2.3023]
];

// Traitement du formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Vérification du token CSRF
    if (!hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        die("Token CSRF invalide !");
    }

    // Clé secrète reCAPTCHA
    $secret = 'VOTRE_CLÉ_SECRÈTE'; // Remplacez par votre clé secrète

    // Vérification du reCAPTCHA
    if (empty($_POST['g-recaptcha-response'])) {
        $_SESSION['message'] = "<div class='bg-red-500 text-white p-4 rounded-lg'>Veuillez cocher le reCAPTCHA.</div>";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    $captcha_response = $_POST['g-recaptcha-response'];
    $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$captcha_response}");
    $response_keys = json_decode($response, true);

    if (!$response_keys["success"]) {
        $_SESSION['message'] = "<div class='bg-red-500 text-white p-4 rounded-lg'>Échec de la vérification reCAPTCHA. Veuillez réessayer.</div>";
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }

    // Le reCAPTCHA est validé, continuer le traitement du formulaire
    $name = strip_tags($_POST['name']);
    $startDateTime = strip_tags($_POST['startDateTime']);
    $endDateTime = strip_tags($_POST['endDateTime']);
    $participants = strip_tags($_POST['participants']);
    $domain = strip_tags($_POST['domain']);
    $needs = strip_tags($_POST['needs']);
    $lieu = strip_tags($_POST['LIEU']);
    $email = strip_tags($_POST['email']);

    // Récupérer les coordonnées pour la ville sélectionnée
    $latitude = $cities[$lieu]['lat'];
    $longitude = $cities[$lieu]['lon'];

    // Préparer et exécuter la requête SQL
    $stmt = $mysqlClient->prepare("INSERT INTO events (name, startDateTime, endDateTime, participants, domain, needs, LIEU, email, Latitude, Longitude) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $startDateTime, $endDateTime, $participants, $domain, $needs, $lieu, $email, $latitude, $longitude]);

    if ($stmt) {
        echo "<div class='bg-green-500 text-white p-4'>Votre demande a été envoyée avec succès!</div>";
    } else {
        echo "<p class='text-red-500'>Erreur: " . $stmt->errorInfo()[2] . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Présentation</title>
    <script src="https://kit.fontawesome.com/e3fa649643.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js" type="text/javascript"></script>
    <link rel="shortcut icon" href="assets/img/parenthese_logo.jpeg" type="image/x-icon">
    <link rel="stylesheet" href="assets/styles/output.css">
    <link rel="stylesheet" href="assets/styles/style.css">
    <script src="assets/scripts/menu.js"></script>
    <script src="assets/scripts/script.js"></script>
    <script type="text/javascript" src="assets/scripts/jquery.zoomooz-helpers.js"></script>
    <script type="text/javascript" src="assets/scripts/jquery.zoomooz-anim.js"></script>
    <script type="text/javascript" src="assets/scripts/jquery.zoomooz-core.js"></script>
    <script type="text/javascript" src="assets/scripts/purecssmatrix.js"></script>
    <script type="text/javascript" src="assets/scripts/sylvester.src.stripped.js"></script>
    <script type="text/javascript" src="assets/scripts/jquery.zoomooz-zoomTarget.js"></script>
    <script type="text/javascript" src="assets/scripts/jquery.zoomooz-zoomContainer.js"></script>
    <link rel="stylesheet" href="assets/styles/style.css">
    <script src="assets/scripts/script.js"></script>
    <script src="assets/scripts/menu.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<body class="bg-gray-100 dark:bg-gray-600">

    <?php include "include/header.php"; ?>

    <div class="w-full bg-gray-stronge">

        <!-- Accueil -->
        <section class="bg-custom bg-cover bg-center mx-auto hero-img flex align-center items-end">
            <div class="bg-gradient-to-r from-gray-500 rounded-lg py-8 px-6 w-full md:w-3/4">
                <h1 class="text-4xl md:text-6xl text-white">Parenthèse - Safe Space Deaf</h1>
                <div class="text-xl md:text-3xl text-white mt-4">Sensibiliser, faire des ateliers, présenter notre stand pour prévenir tout type de violence qui peuvent arriver lors des évènements Sourds à Toulouse et en France.</div>
            </div>
        </section>

        <!-- Présentation de l'association -->
        <section class="container flex items-center dark:bg-gray-600 dark:text-white px-24 py-8">
            <div class="left">
                <h1 class="text-3xl font-bold text-gray-800 mb-4 dark:text-white">Qui sommes-nous ?</h1>
                <div class="item2 zoomItem">
                    <span class="text-gray-600 mb-8 dark:text-white">
                        Notre association est dédiée à la lutte contre les violences
                        dans tous les événements, en particulier au sein de la
                        communauté sourde. Nous nous engageons à sensibiliser,
                        informer et soutenir les victimes, tout en promouvant un
                        environnement respectueux et inclusif. À travers des actions
                        concrètes et des formations, nous visons à prévenir les abus
                        et à offrir un espace sûr pour tous. Notre équipe travaille en
                        collaboration avec diverses organisations pour renforcer la
                        solidarité et l’entraide. Ensemble, nous œuvrons pour un
                        avenir où chacun peut participer librement et en toute
                        sécurité. Rejoignez-nous dans cette mission essentielle !
                    </span>
                </div>
            </div>
            <img src="assets/img/safe.png" class="h-40" alt="">
        </section>

        <!-- Section Vidéo -->
        <div class="flex justify-center items-center dark:bg-gray-600">
            <div class="w-3/4">
                <div class="relative" style="height:500px">
                    <iframe class="absolute top-0 left-0 w-full h-full" src="https://www.youtube.com/embed/bxDlWTrdsyg" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>

        <!-- Liste des Formations -->
        <section class="mx-32 px-4 py-8 bg-white shadow-lg rounded-lg my-16 dark:bg-gray-900 dark:text-white">
            <h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-4">Liste des Formations</h2>
            <div class="overflow-x-auto">
                <table class="w-full border-collapse">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">ID</th>
                            <th class="border px-4 py-2">Titre</th>
                            <th class="border px-4 py-2">Description</th>
                            <th class="border px-4 py-2">Participants Min</th>
                            <th class="border px-4 py-2">Participants Max</th>
                            <th class="border px-4 py-2">Date de Création</th>
                            <th class="border px-4 py-2">Date de Fin de Publication</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        try {
                            $today = date('Y-m-d H:i:s');
                            $sql = "SELECT * FROM formations WHERE creation_date <= :today AND end_publication_date >= :today";
                            $stmt = $mysqlClient->prepare($sql);
                            $stmt->bindParam(':today', $today);
                            $stmt->execute();

                            if ($stmt->rowCount() > 0) {
                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                    echo "<tr>";
                                    echo "<td class='border px-4 py-2'>" . htmlspecialchars($row['id']) . "</td>";
                                    echo "<td class='border px-4 py-2'>" . htmlspecialchars($row['title']) . "</td>";
                                    echo "<td class='border px-4 py-2'>" . htmlspecialchars($row['description']) . "</td>";
                                    echo "<td class='border px-4 py-2'>" . htmlspecialchars($row['min_participants']) . "</td>";
                                    echo "<td class='border px-4 py-2'>" . htmlspecialchars($row['max_participants']) . "</td>";
                                    echo "<td class='border px-4 py-2'>" . date('d/m/Y', strtotime($row['creation_date'])) . "</td>";
                                    echo "<td class='border px-4 py-2'>" . date('d/m/Y', strtotime($row['end_publication_date'])) . "</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7' class='border px-4 py-2 text-center text-gray-600'>Pas de formations disponibles</td></tr>";
                            }
                        } catch (PDOException $e) {
                            echo "<tr><td colspan='7' class='border px-4 py-2 text-red-500'>Erreur: " . $e->getMessage() . "</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </section>

        <!-- Formulaire de Contact -->
        <section id="contact" class="container mx-auto bg-white shadow-lg rounded-lg form_place">
            <div class="form-container flex flex-col md:flex-row">
                <div class="place-image-contact w-full md:w-1/2 mb-4 md:mb-0">
                    <div class="image-contact"></div>
                </div>
                <div class="form w-full md:w-1/2 md:pl-8 form-droite">
                    <h2 class="text-2xl font-bold text-gray-800 mb-4">NOUS CONTACTER</h2>
                    <form action="" method="POST" class="space-y-4">
                        <!-- Token CSRF -->
                        <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">

                        <div>
                            <label for="name" class="block text-gray-600">Titre de l'évènement</label>
                            <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <div>
                            <label for="email" class="block text-gray-600">Adresse de contact</label>
                            <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <div>
                            <label for="LIEU" class="block text-gray-600">Lieu de l'évènement</label>
                            <input type="text" id="LIEU" name="LIEU" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <div>
                            <label for="startDateTime" class="block text-gray-600">Date Heure début de l'évènement</label>
                            <input type="datetime-local" id="startDateTime" name="startDateTime" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <div>
                            <label for="endDateTime" class="block text-gray-600">Date Heure de fin de l'évènement</label>
                            <input type="datetime-local" id="endDateTime" name="endDateTime" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <div>
                            <label for="participants" class="block text-gray-600">Nombre prévu de participants</label>
                            <input type="number" id="participants" name="participants" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <div>
                            <label for="domain" class="block text-gray-600">Domaine</label>
                            <input type="text" id="domain" name="domain" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        </div>

                        <div>
                            <label for="needs" class="block text-gray-600">Votre besoin</label>
                            <textarea id="needs" name="needs" rows="4" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                        </div>

                        <!-- Ajout du reCAPTCHA -->
                        <div class="flex justify-center">
                            <div class="g-recaptcha" data-sitekey="VOTRE_CLÉ_DE_SITE"></div>
                        </div>

                        <div>
                            <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white hover:bg-blue-700 rounded-3xl">Envoyer</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <!-- Bouton de retour -->
        <a href="#" class="fixed bottom-4 right-4 p-2 bg-gray-800 text-white rounded"><i class="fa-solid fa-arrow-up"></i></a>

    </div>

    <?php include "include/footer.php"; ?>
</body>

</html>

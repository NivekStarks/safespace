<?php
// Inclure le fichier autoload de Composer pour utiliser PHPMailer
require 'vendor/autoload.php';
require('connection.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Fonction pour envoyer un email
function sendEmail($recipientEmail, $subject, $body)
{
    $mail = new PHPMailer(true);
    try {
        // Configuration SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';  // Serveur SMTP Gmail
        $mail->SMTPAuth = true;
        $mail->Username = 'votremail@gmail.com';  // Votre adresse Gmail
        $mail->Password = 'votremotdepasse';  // Votre mot de passe Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Expéditeur et destinataire
        $mail->setFrom('votremail@gmail.com', 'Votre Nom');
        $mail->addAddress($recipientEmail);

        // Contenu de l'email
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';
        $mail->Encoding = 'base64';
        $mail->Subject = $subject;
        $mail->Body = $body;

        // Envoyer l'email
        $mail->send();

        // Retourner un message de confirmation
        return "Email envoyé à {$recipientEmail}";
    } catch (Exception $e) {
        return "Erreur lors de l'envoi de l'email : {$mail->ErrorInfo}";
    }
}

// Traitement du formulaire après validation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $eventId = $_POST['event_id'];
    $action = $_POST['action'];

    if ($action === 'update_coords') {
        $x = $_POST['x'];
        $y = $_POST['y'];

        $queryUpdateCoords = "UPDATE events SET x = :x, y = :y WHERE id = :id";
        $stmtUpdateCoords = $mysqlClient->prepare($queryUpdateCoords);
        $stmtUpdateCoords->bindParam(':x', $x);
        $stmtUpdateCoords->bindParam(':y', $y);
        $stmtUpdateCoords->bindParam(':id', $eventId);
        $stmtUpdateCoords->execute();

        $messageConfirmation = "Coordonnées mises à jour pour l'événement ID {$eventId}";
    } else {
        $query = "SELECT email FROM events WHERE id = :id";
        $stmt = $mysqlClient->prepare($query);
        $stmt->bindParam(':id', $eventId);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row) {
            $recipientEmail = $row['email'];
            if ($action === 'valider') {
                // Envoyer email de validation
                $messageConfirmation = sendEmail($recipientEmail, 'Confirmation de l\'événement', 'Votre événement a été confirmé.');
            } elseif ($action === 'invalider') {
                // Supprimer l'événement de la base de données
                $queryDelete = "DELETE FROM events WHERE id = :id";
                $stmtDelete = $mysqlClient->prepare($queryDelete);
                $stmtDelete->bindParam(':id', $eventId);
                $stmtDelete->execute();

                // Envoyer email de refus
                $messageConfirmation = sendEmail($recipientEmail, 'Refus de l\'événement', 'Votre événement a été refusé.');
            } elseif ($action === 'informations_manquantes') {
                // Envoyer email d'informations manquantes
                $messageConfirmation = sendEmail($recipientEmail, 'Informations manquantes sur l\'événement', 'Merci de fournir plus d\'informations sur votre événement.');
            }
        }
    }
}

// Récupération de toutes les soumissions de formulaire
$query = "SELECT * FROM events ORDER BY id DESC";
$result = $mysqlClient->query($query);

if (!$result) {
    die("Erreur lors de la récupération des données: " . $mysqlClient->errorInfo()[2]);
}
?>


<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Back Office - Soumissions de Formulaire</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/style.css">
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Back Office - Soumissions de Formulaire</h2>

        <!-- Affichage du message de confirmation -->
        <?php if (isset($messageConfirmation)) : ?>
            <div id="successMessage" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <strong class="font-bold">Succès !</strong>
                <span class="block sm:inline"><?php echo htmlspecialchars($messageConfirmation); ?></span>
            </div>
            <script>
                // Effacer le message après 5 secondes
                setTimeout(function() {
                    document.getElementById('successMessage').remove();
                }, 5000);
            </script>
        <?php endif; ?>

        <!-- Tableau des soumissions de formulaire -->
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="bg-purple-600 text-white">
                    <th class="py-2 px-4 border-b">Nom de l'événement</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Lieu</th>
                    <th class="py-2 px-4 border-b">Date Heure début</th>
                    <th class="py-2 px-4 border-b">Date Heure fin</th>
                    <th class="py-2 px-4 border-b">Participants</th>
                    <th class="py-2 px-4 border-b">Domaine</th>
                    <th class="py-2 px-4 border-b">Besoin</th>
                    <th class="py-2 px-4 border-b">X</th>
                    <th class="py-2 px-4 border-b">Y</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['name']); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['email']); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['LIEU']); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['startDateTime']); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['endDateTime']); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['participants']); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['domain']); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['needs']); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['x']); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['y']); ?></td>
                        <td class="py-2 px-4 border-b">
                            <form method="post" action="">
                                <input type="hidden" name="event_id" value="<?php echo $row['id']; ?>">
                                <button type="submit" name="action" value="valider" class="text-green-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </button>
                                <button type="submit" name="action" value="invalider" class="text-red-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                    </svg>
                                </button>
                                <button type="submit" name="action" value="informations_manquantes" class="text-yellow-500">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                                    </svg>
                                </button>
                            </form>
                            <form method="post" action="" class="mt-2">
                                <input type="hidden" name="event_id" value="<?php echo $row['id']; ?>">
                                <input type="text" name="x" placeholder="X" value="<?php echo htmlspecialchars($row['x']); ?>" class="border rounded px-2 py-1 w-16">
                                <input type="text" name="y" placeholder="Y" value="<?php echo htmlspecialchars($row['y']); ?>" class="border rounded px-2 py-1 w-16">
                                <button type="submit" name="action" value="update_coords" class="text-green-500 mt-2">
                                    Modifier
                                </button>
                            </form>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Bouton lien Coordonnées GPS centré -->
        <div class="mt-4 flex justify-center">
            <a href="https://www.coordonnees-gps.fr/" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">
                Coordonnées GPS
            </a>
        </div>
    </div>

    <script>
        function closeMessage() {
            document.querySelector('.alert').remove();
        }
    </script>
</body>

</html>
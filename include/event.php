<?php
// Connexion à la base de données
require('connection.php');

// Sélectionner toutes les soumissions de formulaire
$query = "SELECT * FROM events ORDER BY id DESC";
$result = $mysqlClient->query($query);

// Vérification de l'exécution de la requête
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
</head>

<body>
    <h2>Back Office - Soumissions de Formulaire</h2>

    <table border="1">
        <thead>
            <tr>
                <th>Nom de l'événement</th>
                <th>Date Heure début</th>
                <th>Date Heure fin</th>
                <th>Participants</th>
                <th>Domaine</th>
                <th>Besoin</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['name']); ?></td>
                    <td><?php echo htmlspecialchars($row['startDateTime']); ?></td>
                    <td><?php echo htmlspecialchars($row['endDateTime']); ?></td>
                    <td><?php echo htmlspecialchars($row['participants']); ?></td>
                    <td><?php echo htmlspecialchars($row['domain']); ?></td>
                    <td><?php echo htmlspecialchars($row['needs']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>

<?php

// Connexion à la base de données
require('include/connection.php');

// Vérification de la connexion à la base de données
if (!$conn) {
    die("Échec de la connexion à la base de données: " . mysqli_connect_error());
}
echo "Connexion réussie à la base de données<br>";

// Sélectionner toutes les soumissions de formulaire
$query = "SELECT * FROM contact_form ORDER BY id DESC"; // Assurez-vous que 'id' est votre clé primaire
$result = mysqli_query($conn, $query);

// Vérification de l'exécution de la requête
if (!$result) {
    die("Erreur lors de la récupération des données: " . mysqli_error($conn));
}

// Vérifier s'il y a des résultats
if (mysqli_num_rows($result) > 0) {
    echo "Nombre de soumissions de formulaire trouvées: " . mysqli_num_rows($result) . "<br>";
} else {
    echo "Aucune soumission de formulaire trouvée<br>";
}

// Libérer le résultat de la mémoire
mysqli_free_result($result);

// Fermer la connexion à la base de données
mysqli_close($conn);

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
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
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

    <?php
    // Libérer le résultat de la mémoire
    mysqli_free_result($result);

    // Fermer la connexion à la base de données
    mysqli_close($conn);
    ?>
</body>

</html>
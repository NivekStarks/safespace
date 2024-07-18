<?php
session_start();
include_once("connection.php");

// Fetch candidates from the database
$sql = "SELECT * FROM candidaturebenevole";
$stmt = $mysqlClient->prepare($sql);
$stmt->execute();
$candidats = $stmt->fetchAll(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $mail = $_POST['mail'];
    
    if (isset($_POST['validate'])) {
        // Redirect to newBenevole.php
        header("Location: newBenevole.php");
        exit();
    } elseif (isset($_POST['refuse'])) {
        // Refuse candidate
        $deleteSql = "DELETE FROM candidaturebenevole WHERE mail = :mail";
        $deleteStmt = $mysqlClient->prepare($deleteSql);
        $deleteStmt->bindParam(':mail', $mail);
        
        if ($deleteStmt->execute()) {
            // Redirect to avoid resubmission
            header("Location: " . $_SERVER['PHP_SELF']);
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Candidats</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-bold mb-6">Liste des Candidats</h1>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300 text-sm">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="py-2 px-4 border-b">Nom</th>
                        <th class="py-2 px-4 border-b">Prénom</th>
                        <th class="py-2 px-4 border-b">Email</th>
                        <th class="py-2 px-4 border-b">Profil</th>
                        <th class="py-2 px-4 border-b">Adresse</th>
                        <th class="py-2 px-4 border-b">Code Postal</th>
                        <th class="py-2 px-4 border-b">Ville</th>
                        <th class="py-2 px-4 border-b">Formation</th>
                        <th class="py-2 px-4 border-b">Lieu de Formation</th>
                        <th class="py-2 px-4 border-b">Nombre de Participants</th>
                        <th class="py-2 px-4 border-b">Description</th>
                        <th class="py-2 px-4 border-b">Numéro SIRET</th>
                        <th class="py-2 px-4 border-b">Numéro RNA</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($candidats as $candidat): ?>
                        <tr>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($candidat['nom']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($candidat['prenom']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($candidat['mail']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($candidat['profile']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($candidat['adresse']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($candidat['postale']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($candidat['ville']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($candidat['formation']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($candidat['lieu_form']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($candidat['nbr_form']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($candidat['description']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($candidat['numero_siret']) ?></td>
                            <td class="py-2 px-4 border-b"><?= htmlspecialchars($candidat['numero_rna']) ?></td>
                            <td class="py-2 px-4 border-b">
                                <form method="POST">
                                    <input type="hidden" name="mail" value="<?= $candidat['mail'] ?>">
                                    <button type="submit" name="validate" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-700">Valider</button>
                                    <button type="submit" name="refuse" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700">Refuser</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>

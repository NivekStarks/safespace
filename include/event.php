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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/styles/style.css">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background-color: #fefefe;
            margin: auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
            max-height: 80%;
            overflow-y: auto;
            box-shadow: 0 5px 15px rgba(0,0,0,.5);
            border-radius: 10px;
            white-space: pre-wrap; /* Permet d'afficher les sauts de ligne */
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
    <script>
        function toggleText(text) {
            var modal = document.getElementById("modal");
            var modalContent = document.getElementById("modal-content-text");
            modalContent.innerText = text.trim();  // Trim whitespace
            modal.style.display = "flex";
        }

        function closeModal() {
            var modal = document.getElementById("modal");
            modal.style.display = "none";
        }

        window.onclick = function(event) {
            var modal = document.getElementById("modal");
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        function validerEvent(id) {
            console.log("Valider l'événement avec l'ID: " + id);
            // Ajoutez ici la logique pour rester la donnée
        }

        function invaliderEvent(row) {
            if (confirm("Êtes-vous sûr de vouloir invalider cet événement ?")) {
                // Supprimer la ligne du tableau
                var rowElement = row.parentNode.parentNode;
                rowElement.parentNode.removeChild(rowElement);
            }
        }
    </script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto p-4">
        <h2 class="text-2xl font-bold mb-4">Back Office - Soumissions de Formulaire</h2>

        <table class="min-w-full bg-white border">
            <thead>
                <tr class="bg-purple-600 text-white">
                    <th class="py-2 px-4 border-b">Nom de l'événement</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Date Heure début</th>
                    <th class="py-2 px-4 border-b">Date Heure fin</th>
                    <th class="py-2 px-4 border-b">Participants</th>
                    <th class="py-2 px-4 border-b">Domaine</th>
                    <th class="py-2 px-4 border-b">Besoin</th>
                    <th class="py-2 px-4 border-b">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['name']); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['email']); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['startDateTime']); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['endDateTime']); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['participants']); ?></td>
                        <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($row['domain']); ?></td>
                        <td class="py-2 px-4 border-b">
                            <span onclick="toggleText('<?php echo htmlspecialchars(addslashes($row['needs'])); ?>')" class="show-more text-blue-500 cursor-pointer">
                                En voir plus
                            </span>
                        </td>
                        <td class="py-2 px-4 border-b">
                            <button onclick="validerEvent(<?php echo $row['id']; ?>)" class="text-green-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                </svg>
                            </button>
                            <button onclick="invaliderEvent(this)" class="text-red-500">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>

    <!-- The Modal -->
    <div id="modal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p id="modal-content-text"></p>
        </div>
    </div>
</body>

</html>

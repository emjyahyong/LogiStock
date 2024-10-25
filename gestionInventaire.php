<?php
session_start(); // Démarrer la session
if (!isset($_SESSION['id'])) {
    header("Location: index.php"); // Rediriger vers la page de connexion si non connecté
    exit();
}
$idGerant = $_SESSION['id']; // Récupérer l'ID depuis la session
?>

<!DOCTYPE HTML>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Articles</title>
    <link rel="shortcut icon" href="images/ico_LRT.png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
</head>
<body>
    <div class="container my-4">
    <h1 class="text-center" style="margin-top: 2%;">Logistock - Solution pour la gestion d'inventaire</h1>
        <h2 class="text-center">Liste des Articles</h2>
        <table id="myTable" class="table table-striped table-hover border shadow-sm">
            <thead class="table-primary">
                <tr>
                    <th>Article</th>
                    <th>Stock</th>
                    <th>Prix</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Connexion à la base de données
                require_once "./connexionBDD.php";
                $sql = "SELECT * FROM inventaireslogistock WHERE idGerant = :idGerant"; 
                $requete = $cnx->prepare($sql);
                $requete->bindParam(':idGerant', $idGerant);
                $requete->execute();

                while ($ligne = $requete->fetch()) {
                    // Utilisation d'une classe pour styliser le stock
                    $stockClass = ($ligne['stock'] > 10) ? 'badge bg-success' : ($ligne['stock'] > 0 ? 'badge bg-warning' : 'badge bg-danger');
                    echo "<tr>
                            <td>{$ligne['nomArticles']}</td>
                            <td><span class=\"badge {$stockClass}\">{$ligne['stock']}</span></td>
                            <td>{$ligne['prix']} €</td>
                            <td>
                                <a href=\"consultArticle.php?id={$ligne['id']}\" class=\"btn btn-warning btn-sm\">
                                    <i class=\"fas fa-edit\"></i></a>
                                <a href=\"supprimerArticle.php?id={$ligne['id']}\" class=\"btn btn-danger btn-sm\">
                                    <i class=\"fas fa-trash-alt\"></i>
                                </a>
                            </td>
                          </tr>";
                }
                ?>
                <tr>
                    <td colspan="4" class="text-center">
                        <a href="./formAjoutArticle.php" class="btn-add-article">Ajouter un nouvel article</a>

                    </td>
                </tr>
            </tbody>
        </table>
        <form action="deconnexionGerant.php" method="POST">
            <button type="submit" class="btn-deconnexion">Se déconnecter</button>
        </form>

    </div>

    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>

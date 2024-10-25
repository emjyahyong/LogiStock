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
</head>
<body>
    <div class="container">
        <h2 class="my-4">Liste des Articles</h2>
        <table class="table table-striped">
            <thead>
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
                    echo "<tr>
                            <td>{$ligne['nomArticles']}</td>
                            <td>{$ligne['stock']}</td>
                            <td>{$ligne['prix']} €</td>
                            <td>
                                <a href=\"consultArticle.php?id={$ligne['id']}\" class=\"btn btn-warning btn-sm\">Modifier</a>
                                <a href=\"supprimerArticle.php?id={$ligne['id']}\" class=\"btn btn-danger btn-sm\">Supprimer</a>
                            </td>
                          </tr>";
                }
                ?>
                <tr>
                    <td colspan="4" class="text-center">
                        <a href="./formAjoutArticle.html" class="btn btn-success">Ajouter un nouvel article</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>

<?php
session_start(); // Démarrer la session
if (!isset($_SESSION['id'])) {
    header("Location: index.php"); // Rediriger vers la page de connexion si non connecté
    exit();
}
$idGerant = $_SESSION['id']; // Récupérer l'ID depuis la session
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Modification article</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
        <header>
            
        </header>
        
        <div class="container">
            <div class="row">
            <h1 class="text-center" style="margin-top: 2%;">Logistock - Solution pour la gestion d'inventaire</h1>
                    <h2 class="text-center">Modification caractéristiques article</h2>
                    <?php
                        require_once "./connexionBDD.php";
                        $sql = "SELECT * FROM inventaireslogistock WHERE idGerant = $idGerant;";
                        $resultat = $cnx->query($sql);
                        $ligne = $resultat->fetch();

                        $idArticle = $ligne["id"];
                        $nomArticle = $ligne["nomArticles"];
                        $stock = $ligne["stock"];
                        $prix = $ligne["prix"];
                    ?>

                    <form action="modificationArticle.php" method="POST">
                        <input type="hidden" class="form-control" name="idArticle" value="<?php echo $idArticle; ?>" /><br>
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom de l'article</label>
                            <input type="text" class="form-control" name="nomArticle" value="<?php echo $nomArticle; ?>" >
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Stock</label>
                            <input type="text" class="form-control" name="stock" value="<?php echo $stock; ?>" >
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Prix</label>
                            <input type="text" class="form-control" name="prix" value="<?php echo $prix; ?>" >
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Modifier</button>
                    </form>
            </div>
    </div>

        <footer>
            <!-- place footer here -->
        </footer>
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>

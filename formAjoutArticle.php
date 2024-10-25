<?php
require_once("connexionBDD.php");
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Accueil</title>
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
    </head>

    <body>
        <header>
            
        </header>
        
        <div class="container">
            <div class="row">
            <h1>Logistock - Solution pour la gestion d'inventaire</1>
            </div>
            <div class="row">
                    <h2 class="text-center">Création de votre inventaire</h2>
                    <form action="ajoutArticle.php" method="POST">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom de l'article</label>
                            <input type="text" class="form-control" id="nomArticle" name="nomArticle" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Stock</label>
                            <input type="text" class="form-control" id="stock" name="stock" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Prix</label>
                            <input type="text" class="form-control" id="prix" name="prix" required>
                        </div>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Ajouter</button>
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

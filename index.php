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
                    <form onsubmit="verifyPassword(event)" action="ajoutGerant.php" method="POST">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prénom</label>
                            <input type="text" class="form-control" id="nom" name="prenom" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input type="email" class="form-control" id="nom" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="nom" name="password" required minlength="6">
                        </div>
                        <div class="mb-3">
                            <label for="password2" class="form-label">Confirmer mot de passe</label>
                            <input type="password" class="form-control" id="nom" name="password2" required minlength="6">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Créer</button>
                    </form>
            </div>
            <div class="row">
                    <h2 class="text-center">Connectez-vous</h2>
                    <form onsubmit="verifyPassword(event)" action="connexionGerant.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Adresse e-mail</label>
                            <input type="email" class="form-control" id="nom" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Mot de passe</label>
                            <input type="password" class="form-control" id="nom" name="password" required minlength="6">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Créer</button>
                    </form>
            </div>
    </div>

    <script>
        function verifyPassword(e) {
            let nom = document.getElementById("nom").value.trim(); 
            let prenom = document.getElementById("prenom").value.trim(); 
            let email = document.getElementById("email").value.trim(); 
            let pseudo = document.getElementById("pseudo").value.trim(); 
            let password = document.getElementById("password").value.trim();
            let password2 = document.getElementById("password2").value.trim();

            // Vérification des champs
            if (nom !== "" && prenom !== "" && email !== "" && pseudo !== "" && password.length >= 6 && password !== "" && password2 !== "" && password === password2 && email.includes('@')) {
                return true;    
            } else {
                alert('Veuillez remplir tous les champs correctement.');
                e.preventDefault();
                return false;
            }
        }
    </script>

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

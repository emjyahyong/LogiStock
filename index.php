<?php
require_once("connexionBDD.php");

// Récupérer le message d'erreur s'il existe
$error_message = isset($_GET['error']) ? $_GET['error'] : '';
?>
<!doctype html>
<html lang="fr">
<head>
    <title>Accueil</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header></header>
    
    <div class="container">
        <h1 class="text-center" style="margin-top: 2%;">Logistock - Solution pour la gestion d'inventaire</h1>
        
        <?php if ($error_message): ?>
            <div class="alert alert-danger" role="alert">
                <?= htmlspecialchars($error_message) ?>
            </div>
        <?php endif; ?>
        
        <h2 class="text-center">Création de votre inventaire</h2>
        <form onsubmit="return verifyPassword(event)" action="ajoutGerant.php" method="POST">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" required>
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Adresse e-mail</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" required minlength="6">
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Confirmer mot de passe</label>
                <input type="password" class="form-control" id="password2" name="password2" required minlength="6">
            </div>
            <button type="submit" class="btn btn-primary w-100">Créer</button>
        </form>

        <h2 class="text-center">Connectez-vous</h2>
        <form onsubmit="return verifyLogin(event)" action="connexionGerant.php" method="POST">
            <div class="mb-3">
                <label for="login_email" class="form-label">Adresse e-mail</label>
                <input type="email" class="form-control" id="login_email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="login_password" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="login_password" name="password" required minlength="6">
            </div>
            <button type="submit" class="btn btn-primary w-100">Connexion</button>
            <p></p>
        </form>
    </div>

    <script>
        function verifyPassword(e) {
            let nom = document.getElementById("nom").value.trim(); 
            let prenom = document.getElementById("prenom").value.trim(); 
            let email = document.getElementById("email").value.trim(); 
            let password = document.getElementById("password").value.trim();
            let password2 = document.getElementById("password2").value.trim();

            // Vérification des champs
            if (nom !== "" && prenom !== "" && email !== "" && password.length >= 6 && password === password2 && email.includes('@')) {
                return true;    
            } else {
                alert('Veuillez remplir tous les champs correctement.');
                e.preventDefault();
                return false;
            }
        }

        function verifyLogin(e) {
            let email = document.getElementById("login_email").value.trim(); 
            let password = document.getElementById("login_password").value.trim();

            // Vérification des champs
            if (email !== "" && password.length >= 6 && email.includes('@')) {
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

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
</html>

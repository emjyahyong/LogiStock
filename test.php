<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion d'Inventaire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Gestion d'Inventaire</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#ajouter">Ajouter Article</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#inventaire">Inventaire</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title" id="ajouter">Ajouter un Article</h5>
            <form id="formulaireArticle">
                <div class="mb-3">
                    <label for="nomArticle" class="form-label">Nom de l'Article</label>
                    <input type="text" class="form-control" id="nomArticle" required>
                </div>
                <div class="mb-3">
                    <label for="quantite" class="form-label">Quantité</label>
                    <input type="number" class="form-control" id="quantite" required>
                </div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title" id="inventaire">Inventaire</h5>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Nom de l'Article</th>
                        <th scope="col">Quantité</th>
                    </tr>
                </thead>
                <tbody id="tableauInventaire">
                    <!-- Les articles seront ajoutés ici -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.getElementById('formulaireArticle').addEventListener('submit', function(event) {
        event.preventDefault();
        
        const nomArticle = document.getElementById('nomArticle').value;
        const quantite = document.getElementById('quantite').value;

        const tableauInventaire = document.getElementById('tableauInventaire');
        const nouvelleLigne = document.createElement('tr');
        
        nouvelleLigne.innerHTML = `
            <td>${nomArticle}</td>
            <td>${quantite}</td>
        `;
        
        tableauInventaire.appendChild(nouvelleLigne);
        
        // Réinitialiser le formulaire
        this.reset();
    });
</script>

</body>
</html>

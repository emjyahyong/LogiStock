<?php
require_once("connexionBDD.php");

$email = $_POST["email"];
$mdp = $_POST["password"];

// Préparer la requête de sélection
$sql = "SELECT mdp FROM gerants WHERE email = :email";

$requete = $cnx->prepare($sql);
$requete->bindParam(':email', $email);
$requete->execute();

// Vérifier si un gérant avec cet email existe
if ($requete->rowCount() > 0) {
    $resultat = $requete->fetch(PDO::FETCH_ASSOC);
    // Vérifier le mot de passe
    if (password_verify($mdp, $resultat['mdp'])) {
        echo "Connexion réussie. Bienvenue, $email.";
    } else {
        echo "Mot de passe incorrect.";
    }
} else {
    echo "Aucun gérant trouvé avec cet email.";
}
?>

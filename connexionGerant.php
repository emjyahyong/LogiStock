<?php
session_start(); // Démarrer la session
require_once("connexionBDD.php");

$email = $_POST["email"];
$mdp = $_POST["password"];

// Préparer la requête de sélection pour récupérer l'ID et le mot de passe
$sql = "SELECT id, mdp FROM gerants WHERE email = :email";

$requete = $cnx->prepare($sql);
$requete->bindParam(':email', $email);
$requete->execute();

// Vérifier si un gérant avec cet email existe
if ($requete->rowCount() > 0) {
    $resultat = $requete->fetch(PDO::FETCH_ASSOC);
    // Vérifier le mot de passe
    if (password_verify($mdp, $resultat['mdp'])) {
        $_SESSION['id'] = $resultat['id']; // Stocker l'ID dans la session
        echo "Connexion réussie. Bienvenue, $email.";
        header("Location: ./gestionInventaire.php"); // Rediriger vers la page d'inventaire
        exit();
    } else {
        echo "Mot de passe incorrect.";
    }
} else {
    echo "Aucun gérant trouvé avec cet email.";
}
?>

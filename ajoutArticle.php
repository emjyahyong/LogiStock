<?php
session_start(); // Démarrer la session
require_once("connexionBDD.php");

// Vérifier si l'ID du gérant est dans la session
if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si non connecté
    exit();
}

$nomArticle = $_POST["nomArticle"];
$stock = $_POST["stock"];
$prix = $_POST["prix"];
$idGerant = $_SESSION['id']; // Récupérer l'ID du gérant depuis la session

// Préparer la requête d'insertion
$sql = "INSERT INTO `inventaireslogistock` (`nomArticles`, `stock`, `prix`, `idGerant`) VALUES (:nomArticle, :stock, :prix, :idGerant)";

// Préparer l'instruction
$requete = $cnx->prepare($sql);

// Lier les paramètres
$requete->bindParam(':nomArticle', $nomArticle);
$requete->bindParam(':stock', $stock);
$requete->bindParam(':prix', $prix);
$requete->bindParam(':idGerant', $idGerant); // Lier l'ID du gérant

// Exécuter la requête
if ($requete->execute()) {
    header("Location: ./gestionInventaire.php"); // Rediriger vers la page de gestion d'inventaire
    exit();
} else {
    echo "Erreur : " . $requete->errorInfo()[2];
}
?>

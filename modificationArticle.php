<?php
session_start(); // Démarrer la session
require_once("connexionBDD.php");

// Vérifier si l'ID du gérant est dans la session
if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si non connecté
    exit();
}

// Vérifier si l'ID de l'article est passé via GET
if (isset($_POST)) {
    $idArticle = $_POST["idArticle"];
    $nomArticle = $_POST["nomArticle"];
    $stock = $_POST["stock"];
    $prix = $_POST["prix"];
    $idGerant = $_SESSION['id']; // Récupérer l'ID du gérant depuis la session

    // Préparer la requête de mise à jour
    $sql = "UPDATE `inventaireslogistock` SET `nomArticles` = :nomArticle, `stock` = :stock, `prix` = :prix WHERE `id` = :idArticle AND `idGerant` = :idGerant";

    // Préparer l'instruction
    $requete = $cnx->prepare($sql);

    // Lier les paramètres
    $requete->bindParam(':nomArticle', $nomArticle);
    $requete->bindParam(':stock', $stock);
    $requete->bindParam(':prix', $prix);
    $requete->bindParam(':idArticle', $idArticle);
    $requete->bindParam(':idGerant', $idGerant); // Lier l'ID du gérant

    // Exécuter la requête
    if ($requete->execute()) {
        header("Location: ./gestionInventaire.php"); // Rediriger vers la page de gestion d'inventaire
        exit();
    } else {
        echo "Erreur : " . $requete->errorInfo()[2];
    }
} else {
    echo "Aucun ID d'article fourni.";
}
?>

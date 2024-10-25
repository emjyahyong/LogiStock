<?php
session_start(); // Démarrer la session
require_once("connexionBDD.php");

// Vérifier si l'ID du gérant est dans la session
if (!isset($_SESSION['id'])) {
    header("Location: login.php"); // Rediriger vers la page de connexion si non connecté
    exit();
}

// Vérifier si l'ID de l'article est passé via GET
if (isset($_GET['id'])) {
    $idArticle = $_GET['id'];

    // Préparer la requête de suppression
    $sql = "DELETE FROM `inventaireslogistock` WHERE id = :idArticle";

    // Préparer l'instruction
    $requete = $cnx->prepare($sql);

    // Lier le paramètre
    $requete->bindParam(':idArticle', $idArticle);

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

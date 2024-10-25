<?php
require_once("connexionBDD.php");

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email = $_POST["email"];
$mdp = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hachage du mot de passe

// Préparer la requête d'insertion
$sql = "INSERT INTO `gerants` (`nom`, `prenom`, `email`, `mdp`) VALUES (:nom, :prenom, :email, :mdp)";

// Préparer l'instruction
$requete = $cnx->prepare($sql);

// Lier les paramètres
$requete->bindParam(':nom', $nom);
$requete->bindParam(':prenom', $prenom);
$requete->bindParam(':email', $email);
$requete->bindParam(':mdp', $mdp);

// Exécuter la requête
if ($requete->execute()) {
    // echo "Nouveau gérant ajouté avec succès.";
    header("Location: ./index.php");
} else {
    echo "Erreur : " . $requete->errorInfo()[2];
}
?>

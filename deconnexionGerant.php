<?php
session_start(); // S'assurer que la session est démarrée avant de la détruire
session_unset(); // Supprime toutes les variables de session
session_destroy(); // Détruit la session
header("Location: index.php"); // Redirige vers la page de connexion
exit(); // Stoppe l'exécution du script
?>

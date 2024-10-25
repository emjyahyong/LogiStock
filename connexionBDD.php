<?php
	$bdHote        = "localhost";
	$bdNom         = "LogiStock";
	$bdUtilisateur = "root";	
	$bdMotDePasse  = "";	
	
	// Ouverture de la connexion
    try {
        $cnx = new PDO('mysql:host='.$bdHote.';dbname='.$bdNom, $bdUtilisateur, $bdMotDePasse);
    }
 
    catch(Exception $err) {
        echo 'Erreur : '.$err->getMessage().'<br />';
		echo 'N° : '.$err->getCode();
    }
?>
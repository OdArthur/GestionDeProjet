<?php
try {
    print "Get db";
	$host = 'mysql-aodin.alwaysdata.net'; // Adresse de la base de données
	$name = 'aodin_gestionprojet'; // Nom de la base de données à utiliser
	$user = 'aodin_gpco'; // Utilisateur de la base de données
	$pass = 'Gestion2022'; // Mot de passe de la base de données
	$dbh = new PDO("mysql:host=$host;dbname=$name", $user, $pass); // Initialisation de la connexion à la base
}
catch (PDOException $e) { // En cas d'erreur récupération
	print "Erreur !: " . $e->getMessage() . "<br!/"; //Définition du message d'erreur
	die(); // Arrêt du script
}

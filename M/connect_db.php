<?php
	require("config_db.php");

	try {
		$strConnect = 'mysql:host=$host;dbname=$db';
		$pdo = new PDO($strConnect, $login, $password); // Instanciation de la connexion à la base
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // Renvoie des exceptions en cas d'echec
	}
	catch(PDOException $e) {
		$msg = 'Erreur PDO dans ' . $e.getFile() . ' Ligne ' . $e.getLine() . ' : ' . $e.getMessage();
		die($msg);
	}
?>

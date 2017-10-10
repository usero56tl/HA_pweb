<?php
	function verifIdent($login, $pwd, &$profil) {
		require("./M/connect_db.php");
		
		// Requête du login
		$queryIdent = $pdo->prepare('SELECT login_etu FROM etudiant WHERE login_etu = :logEtu AND pass_etu = :passEtu');
		$queryIdent->execute(['logEtu' => $login, 'passEtu' => $pwd]);
		
		// Si l'étudiant existe renvoie true
		return $queryIdent->rowCount();
	}
?>

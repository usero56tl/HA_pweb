<?php
	function verifIdent($login, $pwd, &$profil) {
		require("./M/connect_db.php");
		
		// Requête du login
		$queryIdent = $pdo->prepare('SELECT login_etu, nom, prenom, email, num_grpe,  
		FROM etudiant 
		WHERE login_etu = :logEtu AND pass_etu = :passEtu');
		
		$queryIdent->execute(['logEtu' => $login, 'passEtu' => $pwd]);
		
		// Si l'étudiant existe renvoie true
		if($queryIdent->rowCount()) {
			$retourQuery = $queryIdent->fetchAll(PDO::FETCH_BOTH);
			$profil['user'] = $retourQuery[0]['login_etu'];
			$profil['nom'] = $retourQuery[0]['nom'];
			$profil['prenom'] = $retourQuery[0]['prenom'];
			$profil['email'] = $retourQuery[0]['email'];
			$profil['num_grpe'] = $retourQuery[0]['num_grpe'];
			$queryIdent->closeCursor();
			return true;
		}
		
		$queryIdent->closeCursor();
		return false;
	}
?>

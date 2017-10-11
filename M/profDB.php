<?php
	function verifIdent($login, $pwd, &$profil) {
		require("./M/connect_db.php");
		
		// Requête du login
		$queryIdent = $pdo->prepare('SELECT login_prof, nom, prenom, email,  
		FROM professeur 
		WHERE login_prof = :logProf AND pass_prof = :passProf');
		
		$queryIdent->execute(['logProf' => $login, 'passProf' => $pwd]);
		
		// Si le professeur existe renvoie true
		if($queryIdent->rowCount()) {
			$retourQuery = $queryIdent->fetchAll(PDO::FETCH_BOTH);
			$profil['user'] = $retourQuery[0]['login_prof'];
			$profil['nom'] = $retourQuery[0]['nom'];
			$profil['prenom'] = $retourQuery[0]['prenom'];
			$profil['email'] = $retourQuery[0]['email'];
			$queryIdent->closeCursor();
			return true;
		}
		
		$queryIdent->closeCursor();
		return false;
	}
?>

<?php
	function verifIdent($login, $pwd, &$profil) {
		require("./M/connect_db.php");
		
		// Requête du login
		$queryIdent = "SELECT login_etu, nom, prenom, email, num_grpe  
		FROM etudiant 
		WHERE login_etu='%s' AND pass_etu='%s'";
		
		$queryFinale = sprintf($queryIdent, $login, $pwd);
		echo($queryFinale);
		
		$res = mysqli_query($link, $queryFinale)	
		or die (utf8_encode("erreur de requête : ") . $queryFinale); 
		
		// Si l'étudiant existe renvoie true
		if(mysqli_num_rows ($res) > 0) {
			$profil = mysqli_fetch_assoc($res);
			return true;
		} 
		else {
			$profil = null;
			return false;
		}
	}
?>

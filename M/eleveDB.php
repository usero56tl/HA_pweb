<?php
	function verifIdent($login, $pwd, &$profil) {
		require("./M/connect_db.php");
		
		// Requête du login
		$queryIdent = "SELECT login_etu, nom, prenom, email, num_grpe  
		FROM etudiant 
		WHERE login_etu='%s' AND pass_etu='%s'";
		
		$queryFinale = sprintf($queryIdent, $login, $pwd);
		
		$res = mysqli_query($link, $queryFinale)	
		or die (utf8_encode("erreur de requête : ") . $queryFinale); 
		
		// Si l'étudiant existe renvoie true
		if(mysqli_num_rows ($res) > 0) {
			
			// Récupère le profil de l'étudiant
			$profil = mysqli_fetch_assoc($res);
            
            // Inscris dans la base que l'étudiant est connecté
            $queryIdentOK = sprintf("UPDATE etudiant SET bConnect = 1 WHERE login_etu='%s' AND pass_etu='%s'", $login, $pwd);
            mysqli_query($link, $queryIdentOK)
                or die (utf8_encode("erreur de requête : ") . $queryIdentOK);
			return true;
		} 
		else {
			$profil = null;
			return false;
		}
	}

	function deconnectDB($login, $pwd) {
        require("./M/connect_db.php");
        
        $queryDeco = "UPDATE etudiant 
        SET bConnect = 0 
        WHERE login_etu='%s' AND pass_etu='%s'";
        
        $queryFinale = sprintf($queryDeco, $login, $pwd);
        mysqli_query($link, $queryFinale)
            or die(utf8_encode("erreur de requête : ") . $queryFinale);
    }
?>

<?php
	function verifIdent($login, $pwd, &$profil) {
		require("./M/connect_db.php");
		
		// Requête du login
		$queryIdent = "SELECT *  
		FROM professeur 
		WHERE login_prof='%s' AND pass_prof='%s'";
		
		$queryFinale = sprintf($queryIdent, $login, $pwd);
		
		$res = mysqli_query($link, $queryFinale)	
		or die (utf8_encode("erreur de requête : ") . $queryFinale); 
		
		// Si le prof existe renvoie true
		if(mysqli_num_rows ($res) > 0) {
			
			// Récupère le profil du professeur
			$profil = mysqli_fetch_assoc($res);
            
            // Inscris dans la base que le professeur est connecté
            $queryIdentOK = sprintf("UPDATE professeur SET bConnect = 1 WHERE login_prof='%s' AND pass_prof='%s'", $login, $pwd);
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
        
        $queryDeco = "UPDATE professeur 
        SET bConnect = 0 
        WHERE login_prof='%s' AND pass_prof='%s'";
        
        $queryFinale = sprintf($queryDeco, $login, $pwd);
        mysqli_query($link, $queryFinale)
            or die(utf8_encode("erreur de requête : ") . $queryFinale);
    }
?>

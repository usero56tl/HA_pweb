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

	function fetchTests($idProf) {
        require("./M/connect_db.php");
        
        $queryTests = "SELECT * FROM test WHERE id_prof=%d;";
        $queryTests = sprintf($queryTests, $idProf);
        
        $resultQueryTests = mysqli_query($link, $queryTests)
            or die (utf8_encode("Erreur de requête : ") . $queryTests);
        
        
        $listeTests = array();
        $nbLignes = 0;
        while($listeTests[$nbLignes] = mysqli_fetch_assoc($resultQueryTests)) {
            $nbLignes++;
        }
        
        return $listeTests;
    }
?>

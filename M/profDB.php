<?php
	function verifIdent($login, $pwd, &$profil) {
		require("./M/connect_db.php");
		
		// Requête du login
		$queryIdent = "SELECT *  
		FROM professeur 
		WHERE login_prof='%s' AND pass_prof='%s'";
		
		$queryFinale = sprintf($queryIdent, $login, $pwd);
		echo($queryFinale);
		
		$res = mysqli_query($link, $queryFinale)	
		or die (utf8_encode("erreur de requête : ") . $queryFinale); 
		
		// Si le prof existe renvoie true
		if(mysqli_num_rows ($res) > 0) {
			$profil = mysqli_fetch_assoc($res);
			
				echo ('<br /> dans verif_bd : <br /><pre>'); 
				print_r ($profil); 
				echo ('</pre><br />'); 
			
			return true;
		} 
		else {
			$profil = null;
			return false;
		}
	}
?>

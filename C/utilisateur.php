<?php
/*
 * Fonctions utilisées par tout les utilisateurs
 */
 
 function verifSyntaxIdent($loginIdent, $pwdIdent, &$err) {
		if(!preg_match("`^[[:alpha:][:digit:]\-]{1,30}$`", $loginIdent)) {
			$err = "Erreur de syntaxe du login";
			//return false;
		}
		if(!preg_match("`^[[:alpha:][:digit:]\-]{1,30}$`", $pwdIdent)) {
			$err = "Erreur de syntaxe du mot de passe";
			//return false;
		}
		
		return true;
	}

	function deconnect() {
		session_destroy();
		header("Location:./index.php");
	}

	function inscription() {
        if(count($_POST) == 0) {
            require("./V/accueil.tpl");
        }
        else {
            
        }
    }
?>

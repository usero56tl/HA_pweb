<?php
/*
 * Fonctions utilisées par tout les utilisateurs
 */
 
 function verifSyntaxIdent($loginIdent, $pwdIdent, &$err) {
		if(!preg_match("[[:alpha:][:digit:]]{2,30}", $loginIdent)) {
			$err = "Erreur de syntaxe du login";
			return false;
		}
		if(!preg_match("", $pwdIdent)) {
			$err = "Erreur de syntaxe du mot de passe";
			return false;
		}
		
		return true;
	}
?>

<?php
/*
 * Fonctions utilisées par tout les utilisateurs
 */
 
 function verifSyntaxIdent($loginIdent, $pwdIdent, &$err) {
		if(!preg_match("[a-zA-Z0-9]{2,30}", $loginIdent)) {
			$err = "Erreur de syntaxe du login";
			return false;
		}
		if(!preg_match("[a-zA-Z0-9]{2,30}", $pwdIdent)) {
			$err = "Erreur de syntaxe du mot de passe";
			return false;
		}
		
		return true;
	}

	function accueil() {
		require("./V/accueil.html");
	}

	function deconnect() {
		session_destroy();
		header("./index.php");
	}
?>

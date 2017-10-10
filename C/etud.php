<?php
/* etud.php
 * Controller des étudiants
 */
	function ident() {
		$loginIdent=isset($_POST['user'])?trim($_POST['user']):'';
		$pwdIdent=isset($_POST['pwd'])?trim($_POST['pwd']):'';
		$msg='';
		$profil = array();
		
		require("./M/eleveDB.php");
		
		if(count($_POST) == 0) {
			require("./V/eleve/ident.tpl");
		}
		else {
			if(verifSyntaxIdent($loginIdent, $pwdIdent, $err)) {
				if(verifIdent($user, $pwd, $profil)) {
					$_SESSION['profil'] = $profil;
					$nextURL = "index.php?controle=etudiant&action=accueil";
					header("Location:" . $nextURL);
				}
				else {
					$msg = "Erreur d'authentification";
				}
			}
			else {
				$msg = $err;
			}
			// Réaffiche la page de login en cas d'erreur
			require("./V/eleve/ident.tpl");
		}
	}

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

	function accueil() {
		require("./V/eleve/accueil.tpl");
	}
?>

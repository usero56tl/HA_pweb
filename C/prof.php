<?php
/* prof.php
 * Controller des professeurs
 */
	function ident() {
		$loginIdent=isset($_POST['user'])?trim($_POST['user']):'';
		$pwdIdent=isset($_POST['pwd'])?trim($_POST['pwd']):'';
		$msg='';
		$profil = array();
		
		require("./M/profDB.php");
		require("./C/utilisateur.php");
		
		if(count($_POST) == 0) {
			require("./V/prof/ident.tpl");
		}
		else {
			if(verifSyntaxIdent($loginIdent, $pwdIdent, $err)) {
				if(verifIdent($user, $pwd, $profil)) {
					$_SESSION['profil'] = $profil;
					$_SESSION['statut'] = "professeur";
					$nextURL = "index.php?controle=utilisateur&action=accueil";
					header("Location:" . $nextURL);
				}
				else {
					$msg = "Erreur d'authentification";
				}
			}
			else {
				$msg = $err;
				require("./V/prof/ident.tpl");
			}
		}
	}

	function creerQCM() {
		
	}

	function modifQCM() {
		
	}

	function lancerTest() {
		
	}

	function suivreTest() {
		
	}

	function consultResult() {
		
	}
?>

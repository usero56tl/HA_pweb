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
		require("./C/utilisateur.php");
		
		if(count($_POST) == 0) {
			require("./V/etudiant/ident.tpl");
		}
		else {
			// Vérifie la syntaxe des entrées
			if(verifSyntaxIdent($loginIdent, $pwdIdent, $err)) {
				
				// Vérifie si l'utilisateur est dans la base
				if(verifIdent($user, $pwd, $profil)) {
					$_SESSION['profil'] = $profil;
					$_SESSION['statut'] = "etudiant";
					$nextURL = "index.php?controle=utilisateur&action=accueil";
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
			require("./V/etudiant/ident.tpl");
		}
	}

	function startTest() {
		
	}

	function consultResult() {
		
	}

?>

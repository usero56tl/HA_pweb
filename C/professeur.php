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
				if(verifIdent($loginIdent, $pwdIdent, $profil)) {
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

	function deconnectProf() {
        require("./M/profDB.php");
        // Déconnexion de lu professeur de la base
        deconnectDB($_SESSION['profil']['login_prof'], $_SESSION['profil']['pass_prof']);
        
        // Déconnexion de l'utilisateur
        $nextURL = "index.php?controle=utilisateur&action=deconnect";
        header("Location:" . $nextURL);
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

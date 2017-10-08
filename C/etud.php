<?php
/* etud.php
 * Controller des étudiants
 */
	function ident() {
		$user=isset($_POST['user'])?trim($_POST['user']):'';
		$user=isset($_POST['pwd'])?trim($_POST['pwd']):'';
		$msg='';
		$profil = array();
		
		require("./M/eleveDB.php");
		
		if(count($_POST) == 0) {
			require("./V/eleve/ident.tpl");
		}
		else {
			if(verifSyntaxIdent($user, $pwd, $err) && verifIdent($user, $pwd, $profil)) {
				$_SESSION['profil'] = $profil;
				$nextURL = "index.php?controle=etudiant&action=accueil";
				header("Location:" . $nextURL);
			}
			else {
				$msg = $err;
				require("./V/eleve/ident.tpl");
			}
		}
	}

	function verifSyntaxIdent($user, $pwd, &$err) {
		// TODO preg_match ...
	}

	function accueil() {
		require("./V/eleve/accueil.tpl");
	}
?>

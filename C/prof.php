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
		
		if(count($_POST) == 0) {
			require("./V/prof/ident.tpl");
		}
		else {
			if(verifSyntaxIdent($loginIdent, $pwdIdent, $err) && verifIdent($user, $pwd, $profil)) {
				$_SESSION['profil'] = $profil;
				$nextURL = "index.php?controle=prof&action=accueil";
				header("Location:" . $nextURL);
			}
			else {
				$msg = $err;
				require("./V/prof/ident.tpl");
			}
		}
	}
	function verifSyntaxIdent($loginIdent, $pwdIdent, &$err) {
		// TODO preg_match ...
	}
	function accueil() {
		require("./V/eleve/accueil.tpl");
	}
?>

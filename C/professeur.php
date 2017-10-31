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
            // Charge le formulaire au début
			require("./V/accueil.tpl");
		}
		else {
            // Vérifie la syntaxe des entrées
			if(verifSyntaxIdent($loginIdent, $pwdIdent, $err)) {
                
                // Vérifie si l'utilisateur est dans la base
				if(verifIdent($loginIdent, $pwdIdent, $profil)) {
					$_SESSION['profil'] = $profil;
					$_SESSION['statut'] = "professeur";
					$nextURL = "index.php?controle=professeur&action=bienvenue";
					header("Location:" . $nextURL);
				}
				else {
					$msg = "Mot de passe ou identifiant incorrect";
					require("./V/accueil.tpl");
				}
			}
			else {
				$msg = $err;
                // Réaffiche la page de login en cas d'erreur
				require("./V/accueil.tpl");
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

    function bienvenue() {
        require("./V/accueil.tpl");
    }

	function creerQCM() {
		
	}

	function modifQCM() {
		
	}

	function lancerTest() {
		require("./M/profDB.php");
        
        $tests = fetchTests();
        
        require("./V/accueil.tpl");
	}

	function suivreTest() {
		
	}

	function consultResult() {
		
	}
?>

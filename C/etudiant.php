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
            // Charge le formulaire au début
            require("./V/accueil.tpl");
        }
		else {
			// Vérifie la syntaxe des entrées
			if(verifSyntaxIdent($loginIdent, $pwdIdent, $err)) {
				
				// Vérifie si l'utilisateur est dans la base
				if(verifIdent($loginIdent, $pwdIdent, $profil)) {
					$_SESSION['profil'] = $profil;
					$_SESSION['statut'] = "etudiant";
					$nextURL = "index.php?controle=etudiant&action=bienvenue";
					header("Location:" . $nextURL);
				}
				else {
					$msg = "Erreur d'authentification";
				}
			}
			else {
				$msg = $err;
                // Réaffiche la page de login en cas d'erreur
                require("./V/accueil.tpl");
			}
		}
	}

    function bienvenue() {
        require("./V/accueil.tpl");
    }

	function deconnectEtu() {
        require("./M/eleveDB.php");
        // Déconnexion de l'élève de la base
        deconnectDB($_SESSION['profil']['login_etu'], $_SESSION['profil']['pass_etu']);
        
        // Déconnexion de l'utilisateur
        $nextURL = "index.php?controle=utilisateur&action=deconnect";
        header("Location:" . $nextURL);
    }

	function startTest() {
		
	}

	function consultResult() {
		
	}

?>

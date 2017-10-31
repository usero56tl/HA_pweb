<?php
	session_start();
	
	if((count($_GET) != 0 && !(isset($_GET['controle']) && isset($_GET['action'])))) {
		require('./V/erreur404.tpl');
	}
	else {
		if((!isset($_SESSION['profil']))) {
			if(count($_GET) == 0) {
				// Choix controle permettra de savoir si l'utilisateur est un prof ou un eleve
				require("./V/choixControle.html");
			}
			else {
				// Opérations interdites
				if($_GET['action'] != 'ident') {
					require('./V/erreur404.tpl');
				}
			}
		}
		else {
			if(count($_GET) == 0) {
                // Si l'utilisateur connecté va sur l'index sans paramètres
                $controle = $_SESSION['profil']['statut'];
                $action = "bienvenue";
                require('./C/' . $controle . '.php');
                $action();
            }
		}
		
		$controle = $_GET['controle'];
		$action = $_GET['action'];
		
		require('./C/' . $controle . '.php');
		$action();
	}
?>

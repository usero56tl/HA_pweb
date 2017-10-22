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
				
				// Opérations autorisées sans login
				$controle = $_GET['controle'];
				$action = $_GET['action'];
			}
		}
		else {
			if(isset($_GET['controle']) && isset($_GET['action'])) {
				$controle = $_GET['controle'];
				$action = $_GET['action'];
			}
			
			// Si l'utilisateur connecté va sur l'index sans paramètres
			require('./V/accueil.html');
		}
		require('./C/' . $controle . '.php');
		$action();
	}
?>

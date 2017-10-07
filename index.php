<?php
	session_start();
	
	if((count($_GET) != 0 && !(isset($_GET['controle']) && isset($_GET['action']))) {
		require('./V/erreur404.tpl');
	}
	else {
		if((!isset($_SESSION['profil'])) || count($_GET) == 0) {
			
			// Choix controle permettra de savoir si l'utilisateur est un prof ou un eleve
			require("choixControle.html");
		}
		else {
			if(isset($_GET['controle']) && isset($_GET['action'])) {
				$controle = $_GET['controle'];
				$action = $_GET['action'];
			}
		}
		
		require('./C/' . $controle . '.php');
		$action();
	}
?>

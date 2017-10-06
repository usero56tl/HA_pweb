<?php
	session_start();
	
	if((count($_GET) != 0 && !(isset($_GET['controle']) && isset($_GET['action']))) {
		require('./V/erreur404.tpl');
	}
	else {
		if((!isset($_SESSION['profil'])) || count($_GET) == 0) {
			$controle = "";
			$action="ident";
		}
	}
?>

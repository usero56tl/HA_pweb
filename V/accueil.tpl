<!doctype html>
<?php
    global $controle;
    global $action;
?>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="./V/css/style.css">
		<link rel="stylesheet" href="./V/css/bootstrap.min.css">
		<title>Accueil</title>
		
	</head>
	<body>
		<?php
			// Chargement du menu de l'utilisateur connecté
            if($controle != "") {
                require("./V/" . $GLOBALS['controle'] . "/menu.tpl");
            }
		?>
        
        <?php
			require("./V/" . $GLOBALS['controle'] . "/" . $GLOBALS['action'] . ".tpl");
		?>
		
			
		
		<script src="js/bootstrap.min.js">
	</body>
</html>

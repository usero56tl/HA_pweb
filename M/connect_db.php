<?php
	require("./M/config_db.php");

	if (!isset($link)) {
		$link = mysqli_connect($host, $loginDB, $passwordDB) 
		or die ("erreur de connexion :" . mysql_error()); 
		mysqli_select_db($link, $db) 
		or die (htmlentities("erreur d'accès à la base :") . $db);
	}
?>

	<!doctype html>
	<html lang="fr">
		<head>
		  <meta charset="utf-8">
		  <title>Connexion</title>
		  <link rel="stylesheet" href="../css/style.css">
		  <script src="script.js"></script>
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
		  <script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		  <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
		</head>
		
		 <center>
		  <h1>QCM en Ligne</h1>
		<img src="../img/iut-paris.jpg" alt="iut paris descartes" >
		
		<body>
			<form action="index.php?controle=prof&action=ident" method="post">
				<center>
					<div>
						<label for="id"> Identifiant : </label>
						<input name="user" type="text" id="id"/> 
					</div>
			
					<div>
						<label for="pwd"> Password : </label>
						<input name="pwd" type="password" id="pwd"/> 
					</div>
					<div class="button"> 
						<input type="submit" button type="button" class="btn btn-outline-danger" value="Connexion"/>
						<input type="reset" button type="button" class="btn btn-outline-danger" value="Annuler"/>
					</div>
				</center>
			</form>
		
		
		</body>

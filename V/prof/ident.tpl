<!doctype html>
<html lang="fr">
	<head>
	  <meta charset="utf-8">
	  <title>Connexion</title>
	  <link rel="stylesheet" href="../css/bootstrap.min.css">
	  <link rel="stylesheet" href="../css/style.css">
	</head>
	
	 <center>
	  <h1>QCM en Ligne</h1>
	<img src="img/iut-paris.jpg" alt="iut paris descartes" >
	
  //page de connexion 
	<body>
		<form action="index.php?controle=utilisateur&action=ident" method="post">
			<center>
				<div>
					<label for="user"> Identifiant : </label>
					<input  type="text" id="user"/> 
				</div>
		
				<div>
					<label for="pwd"> Password : </label>
					<input  type="password" id="pwd"/> 
				</div>
				<div class="button"> 
					<input type="submit" button type="button" class="btn btn-outline-danger" value="Connexion"/>
					<input type="reset" button type="button" class="btn btn-outline-danger" value="Annuler"/>
				</div>
			</center>
		</form>
	
		<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
		<script src="../js/bootstrap.min.js">
	</body>
<!-- </html> -->

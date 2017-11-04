//marche pas encore...
<?php function consultResultats(){ 
	require("./M/connect_db.php"); ?>
			
	<table class="form">
			<h1>Résultats</h1>
			<tr>
				<th>Résultat</th>
				<th>Test</th>
				<th>Etudiant</th>
				<th>Question</th>
				<th>Date</th>
			</tr>
			
		<?php
			$queryIdent= mysql_query("select * from resultat");		
			$res = mysqli_query($link, $queryIdent)	
			or die (utf8_encode("erreur de requête : ") . $queryIdent); 
			
			if(mysqli_num_rows ($res) > 0) {
			
				while($donnee = mysql_fetch_array($resultat) { //On affiche les lignes du tableau une à une ?>
					<tr>
						
						<td><?php echo $donnee['id_res']; ?></td>
						<td><?php echo $donnee['id_test']; ?></td>
				 
						<td><?php echo $donnee['id_etu']; ?></td>
						<td><?php echo $donnee['id_quest']; ?></td>
						<td><?php echo $donnee['date_res']; ?></td>
					
					</tr>
					
				<?php
					} //while
				} //if 
				?>
	</table>

<?php } ?>

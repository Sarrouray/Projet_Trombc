<?php
		session_start();
		include("Outils/base.php");
	
		
?>

<?php
			include ("./entete.php");
			
?>

       <?php
			include ("./editerprof.php");	
		?>
	
	<main>
			<!-- Titre de la page NE PAS MODIFIER-->
			
			<?php
			echo "<article class='titlee'>";
				echo "<div class= 'titredepaaa'>";
				echo "ERREUR !!";
				echo "</div>";		
						
				if ($_GET['msg']=="errpseudo"){
							
							echo "<div class='conte'> Ce pseudo n'est pas disponible veuillez en choisir un autre !</div>";
						}
				if ($_GET['msg']=="errlog"){
							
							echo "<div class='conte'> Mauvais pseudo actuel ! Veuillez recommencer !</div>";
						}
				if ($_GET['msg']=="errnom"){
							
							echo "<div class='conte'> Mauvais nom actuel ! Veuillez recommencer !</div>";
						}
				if ($_GET['msg']=="errprenom"){
							
							echo "<div class='conte'> Mauvais prÃ©nom actuel ! Veuillez recommencer !</div>";
						}
				if ($_GET['msg']=="errmdp"){
							
							echo "<div class='conte'> Mauvais mot de passe actuel ! Veuillez recommencer !</div>";
						}
				if ($_GET['msg']=="errmaiil"){
							
							echo "<div class='conte'> Mauvaise adresse e-mail actuelle ! Veuillez recommencer !</div>";
						}	
				
			
			
			echo "</article>";
			?>
<?php
			include ("./bas.php");
			
?>

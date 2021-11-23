<?php
		session_start();
		include("Outils/base.php");
		if (!isset($_SESSION['id'])){
			header('Location:index.php');
		  	exit();
		}
?>
<?php
			include ("./entete.php");
			
?>


       <?php
			include ("./editerprof.php");	
		?>

<main>
		
			<!-- Titre de la page NE PAS MODIFIER-->
			<article class="title">
				<div class= "titredepage">
					<p>Informations personnelles</p>
				</div>
			</article>
			
			<?php 
			$sql = "SELECT * FROM UTILISATEURS WHERE id=:id";
			$req = $bd->prepare($sql);
			$req->execute(array('id'=>$_SESSION['id']));
			$lo=$req->fetch();
			$req->closeCursor();
			?>
		<div class="publ">
			<div class=modif>
				<label for="titreinfo">Pseudo</label>
				</div>
				<div class="zouzou">
					<div class="bloccc">
					<?php
						echo "{$lo['pseudo']}";
					?>	 
					</div>
				</div>
				<div class=modif>
				<label for="titreinfo">Nom</label>
				</div>
				<div class="zouzou">
					<div class="bloccc">
					<?php
						echo "{$lo['nom']}";
					?>	 
					</div>
				</div>
				
				
				
				<div class=modif>
				<label for="titreinfo">Prenom</label>
				</div>
				<div class="zouzou">
					<div class="bloccc">
					<?php
						echo "{$lo['prenom']}";
					?>	 
					</div>
				</div>
				
				
				<!-- Date de naissance -->
				<div class=modif>
					
					<label for="titreinfo">Date de naissance</label> 
				</div>	                   
					<div class="zouzou">
						<div class="bloccc">
							       
								<?php
									echo "{$lo['jour']}";
									echo " {$lo['mois']}";
									echo " {$lo['annee']}";
								
								?>	   
						</div>
					</div>
				<!-- Genre -->
				<div class=modif>
					<label for="titreinfo">Genre</label>
				</div>
				<div class="zouzou">
					
					<div class="bloccc">
						<?php
					echo "{$lo['genre']}";
						?>
					</div>
				</div>
				<!-- Relation -->
				<div class=modif>
					<label for="titreinfo">Relation</label>
				</div>
				
				<div class="zouzou">
					
					<div class="bloccc">
						<?php
					echo "{$lo['relation']}";
						?>
					</div>
				</div>
				
				<!-- Mail -->
				<div class=modif>
					<label for="titreinfo">Adresse e-mail</label>
				</div>
				
				<div class="zouzou">
					
					<div class="bloccc">
						<?php
					echo "{$lo['mail']}";
						?>
					</div>
				</div>
			
</div>
		<?php
			include ("./bas.php");
			
?>

	

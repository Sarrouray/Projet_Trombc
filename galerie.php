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
					<p>Galerie</p>
				</div>
			</article>
			<div class="publ">
				
				<div class="img">  
				<?php
					$sql = "SELECT * FROM UTILISATEURS WHERE id=:id";
					$req = $bd->prepare($sql);
					$req->execute(array('id'=>$_SESSION['id']));
					$img=$req->fetch();
					$req->closeCursor();
					
				
				echo "<img alt='home' src={$img['profil']} class='imggp' >";
				echo "<img alt='home' src={$img['couverture']} class='imgggp' >";
				
				?>
				</div>
				</div>

		<?php
			include ("./bas.php");
			
?>


	

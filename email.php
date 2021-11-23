
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
	
		<article class="title">
				<div class= "titredepage">
					<p>Envoyer un e‑mail</p>
				</div>
			</article>
		
		 <article class="publ">
		<?php
	
$sql = "SELECT * FROM UTILISATEURS WHERE id=:id";
					$req = $bd->prepare($sql);
					$req->execute(array('id'=>$_GET['amis']));
					$login=$req->fetch();
					$req->closeCursor();

					
		if ($_GET['mail']=="reussi"){
							
							echo "<div class='conte'> Votre mail a été envoyé avec succès! </div><br>";
							
		}
		
		echo "<form method='POST' action='./mmail.php'>";
				
		echo "<div class='commm'>";
			echo "<textarea class='emm' name='dest' type='text' placeholder='Destinataire' >";
			
				 echo"{$login['mail']}";
			
			 
			 echo"</textarea>";
		echo "</div>";
	
		echo "<div class='commm'>";
			echo "<input class='emm' name='suj' type='text' placeholder='Objet' />";
		echo "</div>";
		echo "<div class='commm'>";
			echo "<textarea class='emm3' name='texte' type='text' placeholder='Contenu du mail...'></textarea> ";
		echo "</div>";
		echo "<button id='envoimail'  name='anvrs' type='submit' >Publier</button>";
		echo "</form>";
	
		
		?>

</article>


<?php
			include ("./bas.php");
			
?>

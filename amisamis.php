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
			include ("./profamis.php");
			
			$sql = "SELECT * FROM UTILISATEURS WHERE id=:id";
			$req = $bd->prepare($sql);
			$req->execute(array('id'=>$_GET['amis']));
			$login=$req->fetch();
			$req->closeCursor();
				
			$sql = "SELECT * FROM AMIS INNER JOIN UTILISATEURS ON id_ami2=id WHERE id_U=:user AND status=1 ";
			$req = $bd->prepare($sql);
			$req->execute(array('user'=>$_GET['amis']));
			$amis=$req->fetchall();
			$req->closeCursor();
			
	?>
       
<main>
		
			<!-- Titre de la page NE PAS MODIFIER-->
			<article class="title">
				<div class= "titredepage">
					<p>Amis -  <?php $count=count($amis);echo"{$count}"; ?></p>
				</div>
			</article>
			
			<!-- la liste des amis-->
				<?php
					
					for($i=0;$i<count($amis);$i++){
						echo "<form method='POST' action='./ajouter.php'>";
								echo "<div class='pub'>";
									echo "<div class='pb'>";
										echo "<article class=wsh23>";
												
												echo "<img alt='photos de profil' src='{$amis[$i]['profil']}'  class='arrondie23'>";
												
										echo "</article >";	
									echo "<div class='ND'>";
											echo "<div class='nom'>{$amis[$i]['nom']} {$amis[$i]['prenom']}</div>";
											echo "<div class='daate'>Né(e) le {$amis[$i]['jour']} {$amis[$i]['mois']} {$amis[$i]['annee']} </div>";
									echo "</div>";
							
							
							echo "<a href='./email.php?amis={$amis[$i]['id']}'";
							echo "<button id='maill' name='email' type='submit' value='{$amis[$i]['id']}'><img class='sz' alt='email' src='./email.png' ></button>";
							echo"</a>";

							
							echo "</div>";
						echo "</div>";
						echo "</form>";
						
					}
				?>

		<?php
			include ("./bas.php");
			
?>

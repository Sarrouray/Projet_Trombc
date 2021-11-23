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
				
			$sql = "SELECT * FROM AMIS INNER JOIN UTILISATEURS ON id_ami2=id WHERE id_U=:user AND status=1";
			$req = $bd->prepare($sql);
			$req->execute(array('user'=>$_SESSION['id']));
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
		
		<!--les demandes pour etre amis-->	
				<?php
					$sql = "SELECT * FROM AMIS INNER JOIN UTILISATEURS ON id_U=id WHERE id_ami2=:user AND status=0";
					$req = $bd->prepare($sql);
					$req->execute(array('user'=>$_SESSION['id']));
					$demander=$req->fetchall();
					$req->closeCursor();
					
					for($i=0;$i<count($demander);$i++){
						echo "<form method='POST' action='./ajouter.php'>";
						echo "<div class='pub'>";
						echo "<div class='pb'>";
								echo "<article class=wsh23>";
										echo"<a href='./muramis.php?amis={$demander[$i]['id']}'>";
										echo "<img alt='photos de profil' src='{$demander[$i]['profil']}'  class='arrondie23'>";
										echo"</a>";
								echo "</article >";	
								echo "<div class='ND'>";
											echo "<div class='nom'><a href='./muramis.php?amis={$demander[$i]['id']}'>{$demander[$i]['nom']} {$demander[$i]['prenom']}</a></div>";
											echo "<div class='daate'>Né le {$demander[$i]['jour']} {$demander[$i]['mois']} {$demander[$i]['annee']} </div>";
								echo "</div>";
							
							echo "<button id='demander'  name='accepter' type='submit' value='{$demander[$i]['id']}'>Accepter</button>";
							echo "<button id='bloquer'  name='supprimer' type='submit' value='{$demander[$i]['id']}'>Supprimer</button>";
							echo "</div>";
						echo "</div>";
						echo "</form>";
						
					}
				?>
			
			<!-- la liste des amis-->
				<?php
					
					for($i=0;$i<count($amis);$i++){
						echo "<form method='POST' action='./ajouter.php'>";
								echo "<div class='pub'>";
									echo "<div class='pb'>";
										echo "<article class=wsh23>";
												echo"<a href='./muramis.php?amis={$amis[$i]['id']}'>";
												echo "<img alt='photos de profil' src='{$amis[$i]['profil']}'  class='arrondie23'>";
												echo"</a>";
										echo "</article >";	
									echo "<div class='ND'>";
											echo "<div class='nom'><a href='./muramis.php?amis={$amis[$i]['id']}'>{$amis[$i]['nom']} {$amis[$i]['prenom']}</a></div>";
											echo "<div class='daate'>Né(e) le {$amis[$i]['jour']} {$amis[$i]['mois']} {$amis[$i]['annee']} </div>";
									echo "</div>";
							
							echo "<button id='demander'  name='amis' type='submit' value='{$amis[$i]['id']}'>Amis</button>";
							

							echo "<button id='bloquer'  name='id_bloqamis' type='submit' value='{$amis[$i]['id']}'>Bloquer</button>";
							
							
							echo "<a href='./email.php?amis={$amis[$i]['id']}'";
							echo "<button id='mail2' name='email' type='submit' value='{$amis[$i]['id']}'><img class='sz' alt='email' src='./email.png' ></button>";
							echo"</a>";
							
							

							
							echo "</div>";
						echo "</div>";
						echo "</form>";
						
					}
				?>

		<?php
			include ("./bas.php");
			
?>

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
				<div id="cher" class= "titredepage">
					<p>Voilà!</p>
				
			
			<!-- la liste de recherche trouver-->
				<?php
					$sql = "SELECT * FROM UTILISATEURS WHERE id!=:user AND (nom LIKE :cherche1 OR prenom LIKE :cherche1 OR nom LIKE :cherche2 OR prenom LIKE :cherche2 OR nom LIKE :cherche3 OR prenom LIKE :cherche3)";
					$req = $bd->prepare($sql);
					$req->execute(array('user'=>$_SESSION['id'],'cherche1'=>'%'.$_POST['saisie'].'%','cherche2'=>$_POST['saisie'].'%','cherche3'=>'%'.$_POST['saisie']));
					$chercher=$req->fetchall();
					$req->closeCursor();

					$sql = "SELECT * FROM AMIS INNER JOIN UTILISATEURS ON id=id_ami2 WHERE id_U=:user";
					$req = $bd->prepare($sql);
					$req->execute(array('user'=>$_SESSION['id']));
					$amis=$req->fetchall();
					$req->closeCursor();
					
				echo"</div>";
				echo"</article>";
		
				//s'il n'y a pas l'utilisateur avec le nom cheché
				if(count($chercher)==0){
					echo"<div class='publ'>";
					echo"<div class='visite'>";		
					echo "Aucun utilisateur trouvé !";
					echo"</div>";	
					echo"</div>";
				}
				
					for($i=0;$i<count($chercher);$i++){
						echo "<form method='POST' action='./ajouter.php'>";
						echo "<div class='pub'>";
						echo "<div class='pb'>";
								echo "<article class=wsh23>";
										echo "<img alt='photos de profil' src='{$chercher[$i]['profil']}'  class='arrondie23'>";
								echo "</article >";	
								echo "<div class='ND'>";
									echo "<div class='nom'><a href='./muramis.php?amis={$chercher[$i]['id']}'>{$chercher[$i]['nom']} {$chercher[$i]['prenom']}</a></div>";
									echo "<div class='daate'>Né le {$chercher[$i]['jour']} {$chercher[$i]['mois']} {$chercher[$i]['annee']} </div>";	
								echo "</div>";
							
							for($j=0;$j<count($amis);$j++){
								if($chercher[$i]['id']==$amis[$j]['id_ami2']){
									if($amis[$j]['status']==2){
										echo "<button id='debloquer'  name='debloquer' type='submit' value='{$chercher[$i]['id']}'>Débloquer</button>";
										goto terminer;
									}
									
									if($amis[$j]['status']==1){
										echo "<button id='demander'  name='amisdeja' type='submit' value='{$chercher[$i]['id']}'>Amis</button>";
										echo "<button id='bloquer'  name='bloquer2' type='submit' value='{$chercher[$i]['id']}'>Bloquer</button>";
										goto terminer;
									}
								
									if($amis[$j]['status']==0){
										echo "<button id='demander'  name='id_amis' type='submit' value='{$chercher[$i]['id']}'>Demandé</button>";
										echo "<button id='bloquer'  name='supprimer2' type='submit' value='{$chercher[$i]['id']}'>Supprimer</button>";
										goto terminer;
									}
								}
							}
							
									echo "<button id='demander'  name='demander' type='submit' value='{$chercher[$i]['id']}'>Demander</button>";
									echo "<button id='bloquer'  name='bloquer' type='submit' value='{$chercher[$i]['id']}'>Bloquer</button>";
							
						terminer:
						echo "</div>";
						echo "</div>";
						echo "</form>";
						
						
					}
					
				
				?>
				
					
				<!--les suggestions--> 
				<?php
					$sql = "SELECT * FROM UTILISATEURS WHERE id!=:user";
					$req = $bd->prepare($sql);
					$req->execute(array('user'=>$_SESSION['id']));
					$suggestion=$req->fetchall();
					$req->closeCursor();
					
					if(count($suggestion)!=0){
						echo"<article class='title'>";
						echo"<div class= 'titredepage'>";
						echo"<p>Connaissez-vous?</p>";
						echo"</div>";
						echo"</article>";
						
					}
					
					for($i=0;$i<count($suggestion);$i++){
						
						for($j=0;$j<count($amis);$j++){
							if($suggestion[$i]['id']==$amis[$j]['id_ami2'] && $_SESSION['id']==$amis[$j]['id_U']){goto terminatesug;}
						}
						
						
						echo "<form method='POST' action='./ajouter.php'>";
						echo "<div class='pub'>";
						echo "<div class='pb'>";
								echo "<article class=wsh23>";
										echo "<img alt='photos de profil' src='{$suggestion[$i]['profil']}'  class='arrondie23'>";
								echo "</article >";	
								echo "<div class='ND'>";
									echo "<div class='nom'><a href='./muramis.php?amis={$suggestion[$i]['id']}'>{$suggestion[$i]['nom']} {$suggestion[$i]['prenom']}</a></div>";
									echo "<div class='daate'>Né le {$suggestion[$i]['jour']} {$suggestion[$i]['mois']} {$suggestion[$i]['annee']} </div>";	
								echo "</div>";
								echo "<button id='demander'  name='demander' type='submit' value='{$suggestion[$i]['id']}'>Demander</button>";
								echo "<button id='bloquer'  name='bloquer' type='submit' value='{$suggestion[$i]['id']}'>Bloquer</button>";
							echo "</div>";
						echo "</div>";
						echo "</form>";	
						terminatesug:
					
					}
					
					
				?>
<?php
			include ("./bas.php");
			
?>

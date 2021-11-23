<!-- Entête NE PAS MODIFIER !!! -->
		<div class="bloc">
			
            <div class= "header">

				<div class="sss">
					<div class="logo">   
						<img alt="logo" src="Galerie/logo3.png" class=arrondie2>
					</div> 
				</div>

				<form id="recherche" method="post" action="./cherche.php">
 					
					<input class="loupe" type="submit" value="" />
					<input name="saisie" type="text" placeholder="Rechercher sur Trombinouc" required />
 
				</form>
 
				<div class="brr">
					<a class="ppp" href="./trombinouc.php">	
						<img class="aa" alt="logout" src="Galerie/retour.png" width="25px" height="auto" >
					</a>
						
				</div>
				
                <div class="br">
					<a class="ppp" href="./deconnex.php">	
						<img class="aa" alt="logout" src="Galerie/logout.png" >
					</a>
						
				</div>
				
            </div>
                
        </div>
	<!-- Sous-Entête NE PAS MODIFIER !!! Avec photos de profil et couverture + le menu-->
			<section>
			<div class="nom_d_utilisateur">
				
				<?php
					$sql = "SELECT * FROM UTILISATEURS WHERE id=:id";
					$req = $bd->prepare($sql);
					$req->execute(array('id'=>$_GET['amis']));
					$login=$req->fetch();
					$req->closeCursor();
					
					$sql = "SELECT * FROM AMIS WHERE id_U=:user AND id_ami2=:amis";
					$req = $bd->prepare($sql);
					$req->execute(array('user'=>$_SESSION['id'],'amis'=>$_GET['amis']));
					$amis=$req->fetch();
					$req->closeCursor();
				
				echo "<p>{$login['nom']} {$login['prenom']} </p>";
				
				echo "</div>";
				echo "<div class='stat'>";
				echo "<form method='POST' action='./status.php?amis={$login['id']}'>";
					//status amis
					
					$sql = "SELECT * FROM AMIS WHERE id_U=:amis AND id_ami2=:user AND status=0";
					$req = $bd->prepare($sql);
					$req->execute(array('user'=>$_SESSION['id'],'amis'=>$_GET['amis']));
					$acc=$req->fetch();
					$req->closeCursor();
					
					if($_GET['amis']==$acc['id_U']){
						
							echo "<button id='demander'  name='accepter' type='submit' value='{$_GET['amis']}'>Accepter</button>";
							echo "<button id='bloquer'  name='supprimer' type='submit' value='{$_GET['amis']}'>Supprimer</button>";
							goto supprimerm;
					}
					
							if($_GET['amis']==$amis['id_ami2']){
								if($amis['status']==2){
									echo "<button id='debloquer'  name='debloquer' type='submit' value='{$amis['id_ami2']}'>Débloquer</button>";
									echo"</div>";
									echo"<article class=blocpc>";
									echo "<img alt='photos de couverture' src='{$login['couverture']}'  class='blocpc'>" ;
									echo"</article>"; 
									echo"<article class=blocp>";
									echo "<img alt='photos de profil' src='{$login['profil']}'  class='arrondie'>";
									echo"</article >";
									
									echo "<ul >";
									echo"<div class='visite'>";		
									echo "<li >Debloquer pour voir les infos</li>";
									echo"</div>";
									echo "</ul>";	
					
									exit();
								}
								if($amis['status']==1){
									echo "<button id='demander'  name='amis' type='submit' value='{$amis['id_ami2']}'>Amis</button>";
									echo "<button id='bloquer'  name='id_bloqamis' type='submit' value='{$amis['id_ami2']}'>Bloquer</button>";
									echo "<a href='./email.php?amis={$amis['id_ami2']}'";
									echo "<button id='mail' name='email' type='submit' value='{$amis['id_ami2']}'><img class='sz' alt='email' src='./email.png' ></button>";
									echo"</a>";
								}
								if($amis['status']==0){
									echo "<button id='demander'  name='demander' type='submit' value='{$amis['id_ami2']}'>Demandé</button>";
									echo "<button id='bloquer'  name='supprimer' type='submit' value='{$amis['id_ami2']}'>Supprimer</button>";
									echo "<a href='./email.php?amis={$amis['id_amis']}'";
									echo "<button id='mail' name='email' type='submit' value='{$amis['id_ami2']}'><img class='sz' alt='email' src='./email.png' ></button>";
									echo"</a>";
								}
							}
							else{
								echo "<button id='demander'  name='demander' type='submit' value='{$_GET['amis']}'>Demander</button>";
								echo "<button id='bloquer'  name='bloquer' type='submit' value='{$_GET['amis']}'>Bloquer</button>";
								echo "<a href='./email.php?amis={$_GET['amis']}'";
								echo "<button id='mail' name='email' type='submit' value='{$_GET['amis']}'><img class='sz' alt='email' src='./email.png' ></button>";
								echo"</a>";
							}
							supprimerm:
					echo"</form>";
					echo "</div>";
					
					?>
				
			
			<article class=blocpc>
				<?php 
					echo "<img alt='photos de couverture' src='{$login['couverture']}'  class='blocpc'>" ;
			?>
			</article> 
			<article class=blocp>
				<?php
					echo "<img alt='photos de profil' src='{$login['profil']}'  class='arrondie'>";
							
				?>
			</article >
			
			<div class="trait"></div>
		<?php
			echo "<ul >";
				echo "<li ><a class='c1' href='./muramis.php?amis={$login['id']}'>Publications</a></li>";
				echo "<li ><a class='c2' href='./amisamis.php?amis={$login['id']}'>Amis</a></li>";
				echo "<li ><a class='c2' href='./infosamis.php?amis={$login['id']}'>Infos</a></li>";
				echo "<li ><a class='c2' href='./galerieamis.php?amis={$login['id']}'>Galerie</a></li>";
				
			echo "</ul>";
		?>
		</section>

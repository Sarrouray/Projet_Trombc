<?php
		session_start();
		include("Outils/base.php");
		if (!isset($_SESSION['id'])){
			header('Location:index.php');
		  	exit();
		}
		
			$sql = "SELECT * FROM UTILISATEURS WHERE id=:id";
					$req = $bd->prepare($sql);
					$req->execute(array('id'=>$_SESSION['id']));
					$log=$req->fetch();
					$req->closeCursor();
					
						if($_SESSION['id']==$_GET['amis']){
			header('Location:trombinouc.php');
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
		?>
<main>

			<!-- Titre de la page NE PAS MODIFIER-->
			<article class="title">
				<div class= "titredepage">
					<p>Publications</p>
				</div>
			</article>
			
					
			
				<!-- CREER UNE PUBLICATION-->
				<div class="publ">
					<?php
					echo "<form method='POST' action='./publicationamis.php?amis={$login['id']}'>";
					?>
						<div class="cont1" id="pub">
						Créer une publication 
						</div>
						 
						<div class="pb">
							<article class=blocpp>
								<?php
									echo "<img alt='photos de profil' src='{$log['profil']}'  class='arrondie23'>";
								?>
							</article >	
							
							<div class="commm">
								<input id="comment" name="comment" type="text" placeholder="Quoi de neuf?" />
							</div>
							
							<button id="publier"  name="publier" type="submit" value="publier">Publier</button>
						</div>
					</form>
				</div>
				
				<!-- Nouvelle publication -->
				<?php
					$sql = "SELECT * FROM PUBLICATIONS INNER JOIN UTILISATEURS ON U_id=id ";
					$req = $bd->prepare($sql);
					$req->execute();
					$pub=$req->fetchall();
					$req->closeCursor();
					
					$sql = "SELECT id_ami2 FROM AMIS INNER JOIN UTILISATEURS ON id=id_U WHERE id_U=:user AND status=1";
					$req = $bd->prepare($sql);
					$req->execute(array('user'=>$_GET['amis']));
					$amis=$req->fetchall();
					$req->closeCursor();

					for($i=count($pub)-1;$i>=0;$i--){
						$sql = "SELECT * FROM REPONSES INNER JOIN UTILISATEURS ON id_amis=id INNER JOIN PUBLICATIONS ON id_pub=id_pub2  WHERE id_pub2=:public";
						$req = $bd->prepare($sql);
						$req->execute(array('public'=>$pub[$i]['id_pub']));
						$reponse=$req->fetchall();
						$req->closeCursor();
						
						if($pub[$i]['id']==$_GET['amis']){
							include("./pub3.php");
						}
						else{
							for($k=0;$k<count($amis);$k++){
								if($pub[$i]['id']==$amis[$k]['id_ami2']){
									include("./pub3.php");
								}
							}
						}
					}
				?>		

		
<?php
			include ("./bas.php");
			
?>

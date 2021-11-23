<?php
		session_start();
		include("Outils/base.php");
		
		if (isset($_POST['login'])){
			for($i=0;$i<count($users);$i++){
				if ($_POST['login']==$users[$i]['pseudo']){
					if($_POST['mdp']==$users[$i]['mdp']){
						$_SESSION['id']=$users[$i]['id'];
						if(!isset($_COOKIE["id{$users[$i]['id']}"]) && !isset($_COOKIE["heure{$users[$i]['id']}"])){
							$premiere=true;
							
						}
						else{
							$premiere=false;
						}
						$lastday=date("j/n/Y");
						$lasttime=date("H:i:s");
						setcookie("id{$users[$i]['id']}",$lastday,time()+365*24*3600);
						setcookie("heure{$users[$i]['id']}", $lasttime,time()+365*24*3600);	
						goto terminateLoop;
					}
					else{
						// Authentification KO ou tentative de fraude
						header('Location:index.php?msg=err');
						exit();
					}			
				}
				else{
					$_SESSION['id']=false;
				}
			}
			
			terminateLoop:
			if($_SESSION['id']==false){
				header('Location:index.php?msg=compte');
				exit();	
			}
		}
		else{
			if (!isset($_SESSION['id'])){
				header('Location:index.php');
				exit();
			}
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
					<p>Publications</p>
				</div>
				<!-- CREER UNE PUBLICATION-->
				<div class="publ">
					<form method="POST" action="./publication.php">
						<div class="cont1" id="pub">
						Créer une publication 
						</div>
						 
						<div class="pb">
							<article class=blocpp>
								<?php
									echo "<img alt='photos de profil' src='{$login['profil']}'  class='arrondie23'>";
								?>
							</article >	
							
							<div class="commm">
								<input id="comment" name="comment" type="text" placeholder="Quoi de neuf?" autocomplete="off"/>
							</div>
							
							<button id="publier"  name="publier" type="submit" value="publier">Publier</button>
						</div>
					</form>
				</div>
				
				<?php
				
					$sql = "SELECT * FROM UTILISATEURS INNER JOIN AMIS ON id_ami2=id WHERE id_U=:id AND status=1";
					$req = $bd->prepare($sql);
					$marq=array('id'=>$_SESSION['id']);
					$req->execute($marq);
					$cc=$req->fetchall();
					$req->closeCursor();
					
					$day=date("d");
					$mois=date("M");
					
						for($j=0;$j<count($cc);$j++){
							if($day==$cc[$j]['jour'] && $mois==$cc[$j]['mois'] ){
								echo "<article class='ani'>";

								echo " <form method='POST' action='./anniv.php'>";
								echo " <div class='anv1'>";
								echo "<img alt='logo' src='./Galerie/cadeau.png' class='annv'>";
								echo "Anniversaires ";
								echo "</div>";
								echo "<div class='anv2'>";
								echo "C'est l'anniversaire de {$cc[$j]['prenom']} {$cc[$j]['nom']} aujourd'hui !!<br>";
								echo "Souhaitez-lui un joyeux anniversaire : <br>";
								echo "<textarea id='souhait' name='SJA' type='text'>Joyeux Anniversaire {$cc[$j]['prenom']} {$cc[$j]['nom']} !! </textarea> <br>";
								echo "<button id='envoieanniv'  name='anvrs' type='submit' >Publier</button>";
								echo "</div>";
								echo " </form>";
								echo "</article>";
			
						}}
	
					$sql = "SELECT * FROM PUBLICATIONS INNER JOIN UTILISATEURS ON U_id=id ";
					$req = $bd->prepare($sql);
					$req->execute();
					$pub=$req->fetchall();
					$req->closeCursor();
					
					$sql = "SELECT id_ami2 FROM AMIS INNER JOIN UTILISATEURS ON id=id_U WHERE id=:user AND status=1";
					$req = $bd->prepare($sql);
					$req->execute(array('user'=>$_SESSION['id']));
					$amis=$req->fetchall();
					$req->closeCursor();

					for($i=count($pub)-1;$i>=0;$i--){
						//les reponses de publication
						$sql = "SELECT * FROM REPONSES INNER JOIN UTILISATEURS ON id_amis=id INNER JOIN PUBLICATIONS ON id_pub=id_pub2  WHERE id_pub2=:public";
						$req = $bd->prepare($sql);
						$req->execute(array('public'=>$pub[$i]['id_pub']));
						$reponse=$req->fetchall();
						$req->closeCursor();
					
						if($pub[$i]['id']==$_SESSION['id']){
							include("./pub.php");	
						}
							//les publication d'amis		
						else{
							for($k=0;$k<count($amis);$k++){
								if($pub[$i]['id']==$amis[$k]['id_ami2']){
									include("./pub2.php");	
								}
							}
						}				
					}
					
				?>			

		<?php
			include ("./bas.php");
			
?>

<!-- Entête NE PAS MODIFIER !!! -->
		<div class="bloc">
			
            <div class= "header">

				<div class="soushead">
					<div class="logo">   
						<img alt="logo" src="Galerie/logo3.png" class=arrondie2>
					</div> 
				</div>

				<form id="recherche" method="post" action="./cherche.php">
 					
					<input class="loupe" type="submit" value="" />
					<input name="saisie" type="text" placeholder="Rechercher sur Trombinouc" required />
 
				</form>


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
					$req->execute(array('id'=>$_SESSION['id']));
					$login=$req->fetch();
					$req->closeCursor();
				?>
				<p><?php echo "{$login['nom']} {$login['prenom']} "; ?></p>
				<!--pour la première visite-->
			<?php
					echo"<div class='visite'>";	
					if($premiere==true){	
						echo "C'est ta première visite sur Trombinouc, bienvenue à toi !";
					}
					else{
						echo "Ta dernière visite sur cette page date du ".$_COOKIE["id{$login['id']}"]." à ".$_COOKIE["heure{$_SESSION['id']}"];
					}
					echo"</div>";	
			?>
			</div>
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

			<ul >
				<li ><a class="c1" href="./trombinouc.php">Publications</a></li>
				<li ><a class="c2" href="./amis.php">Amis
				
				<?php
					$sql = "SELECT COUNT(id_U) FROM AMIS INNER JOIN UTILISATEURS ON id_ami2=id WHERE id_ami2=:user AND status=0";
					$req = $bd->prepare($sql);
					$req->execute(array('user'=>$_SESSION['id']));
					$calcul=$req->fetch();
					$req->closeCursor();
				
					if($calcul['COUNT(id_U)']!=0){
						echo " <img alt='logo' src='Galerie/noti.png' class=arrondiee>";
					
					}
				?>
				</a></li>
				
				<li ><a class="c2" href="./infos.php">Infos</a></li>
				<li ><a class="c2" href="./galerie.php">Galerie</a></li>
				
				<li>
					<a> <button  onclick="ouvrirlapopup()" id="creer" name="envoi" type="submit" value="envoi">Modifier</button>  	</a>	
				</li>
			</ul>
		</section>
        <!--Bloc Editer le profil -->
		<div id="inscrp">
			<!-- Entete -->
			<div class="sousinscrp">
				<div class="zz">Modifier le profil</div> 
				<button id="fermer" onclick="fermerlapopup()"> X </button>
				
			</div>
<?php
			echo"<form method='POST' action='./modif.php'>";

				echo"<div class='modif'>";
				echo"<label for='un'>Pseudo</label>";
				echo"</div>";
				echo"<div class='trois'><label for='deux'>Actuel</label><input class='mdp' name='login1' type='text' placeholder='{$login['pseudo']}' /></div>";
				
				echo"<div class='trois'>	<label for='deux'>Nouveau</label><input class='mdp' name='login' type='text'/></div>";
				
				echo"<div class='modif'>";
				echo"<label for='un'>Nom</label>";
				echo"</div>";
				echo"<div class='trois'><label for='deux'>Actuel</label><input class='mdp' name='nom1' type='text'  placeholder='{$login['nom']}'/></div>";
				
				echo"<div class='trois'>	<label for='deux'>Nouveau</label><input class='mdp' name='nom' type='text'/></div>";
				
				echo"<div class='modif'>";
				echo"<label for='un'>Prenom</label>";
				echo"</div>";
				echo"<div class='trois'><label for='deux'>Actuel</label><input class='mdp' name='prenom1' type='text' placeholder='{$login['prenom']}' /></div>";
				
				echo"<div class='trois'>	<label for='deux'>Nouveau</label><input class='mdp' name='prenom' type='text'/></div>";
				
				
				echo"<div class='modif'>";
				echo"<label for='un'>Adresse e-mail</label>";
				echo"</div>";
				echo"<div class='trois'><label for='deux'>Actuelle</label><input class='mdp' name='maiil1' type='text' placeholder='{$login['mail']}' /></div>";
				
				echo"<div class='trois'>	<label for='deux'>Nouveau</label><input class='mdp' name='maiil' type='text'/></div>";
				
				?>
				
				<!-- Date de naissance -->
				<div class=modif>
					
					<label for="un">Date de naissance</label> 
				</div>	                   
					<div class="zouzou">
						<div class="dd">
							<select name="jour" id="jour" placeholder="jour">        
								<?php
									
									$sql = "SELECT * FROM UTILISATEURS WHERE id=:id";
									$req = $bd->prepare($sql);
									$req->execute(array('id'=>$_SESSION['id']));
									$lo=$req->fetch();
									$req->closeCursor();
				 
									$jourmin = 1;
									$jourmax = 31;
									
									echo "<option selected disabled>{$lo['jour']}</option>";
									for($i = $jourmin; $i <= $jourmax; $i++){
										
										echo "<option value='$i'> $i </option>";
									} 
								?>	   
							</select>
						</div>
						<div class="dd1">
							<select name="mois" id="mois" >        
								
								<?php
									$mois=array('jan','fév','mar','avr','mai','jun','juil','aoû','sep','oct','nov','déc');		
							
									echo "<option selected disabled>{$lo['mois']}</option>";
									for($i = 0; $i <= 11; $i++){
									
									echo("<option value=\"$mois[$i]\" '>$mois[$i]</option>'");
										
									} 
					
								?>	   
							</select>
						</div>
						<div class="dd2">
							<select name="annee" id="année" >        
								<?php
								$anneemax = date("Y");
								$anneemin =  1905;
								echo "<option selected disabled>{$lo['annee']}</option>";
								for($i = $anneemax; $i >= $anneemin; $i--){
									
									echo "<option value='$i'>$i</option>";
								} 
								?>	   
							</select>
						</div>
					</div>
				<!-- Genre -->
				<div class=modif>
					<label for="un">Genre</label>
				</div>
				<div class="zouzou">
					
					<div class="qq">
					<label for="genre"></label>Femme<input type= "radio" name= "genre" class= "genre" value="Femme" /> 
					</div>
					<div class="qq">
						<label for="genre"></label>Homme<input type= "radio" name= "genre" class= "genre" value="Homme" />
					</div>
				</div>
				<!-- Relation -->
				<div class=modif>
					<label for="un">Relation</label>
				</div>
				
				<div class="zouzou">
					
					<div class="qqq">
						<label for="relation"></label>
						Célibataire<input type= "radio" name= "relation" class= "celib" value="Célibataire" /> 
					</div>
					<div class="qqq">
						<label for="relation1"></label>
						En couple<input type= "radio" name= "relation" class= "couple" value="En couple" />
					</div>
					<div class="qqq">
						<label for="relation"></label>
						Autre<input type= "radio" name= "relation" class= "autre" value="Autre"/>
					</div>
				</div>
				<!-- Mot de Passe -->
				<div class=modif>
				<label for="un">Changer le mot de passe</label>
				</div>

				
				<div class="trois"><label for="six">Actuel</label> <input class="mdp" name="mdp1" type="password"   ></div>
				<div class="trois"><label for="six">Nouveau</label> <input class="mdp" name="mdp" type="password"   ></div>
				<div class="trois"><label for="six">Confirmer</label> <input class="mdp" name="mdp" type="password"  ></div>

				<!-- Photo de profil -->
				<div class=modif>
					<label for="un">Photo de profil</label>
					<a><button  onclick="ouvrirladeuxpopup()" class="ajouter" name="aj" type="button" value="aj">Ajouter</button></a>
				</div>
					
				
				
				<div class="trucla">
				<article class=wsh22>
				
					<?php
					echo "<img alt='photos de profil' src='{$login['profil']}'  class='arrondie'>";
					?>
				</article >
				</div>

				<!-- Photo de Couverture -->
				<div class=modif>
					<label for="un">Photo de couverture</label>
					<a><button  onclick="ouvrirlatroispopup()" class="ajouter" name="aj" type="button" value="aj">Ajouter</button></a>
				</div>
				
				
				
				<div class="trucla">
				<article class=blocc>
					<?php
					echo "<img alt='photos de couverture' src='{$login['couverture']}'  class='blocc'>";
					?>
				</article> 
				</div>
					
				<button id="modifier"  name="modifier" type="submit" value="modifier"> Valider les modifications </button>	
			
			</form>
			<form method="POST" action="./supp.php">
			<button id="supprim"  name="supprim" type="submit" value="supprimer"> Supprimer définitivement le compte ! </button>
			</form>
					
		</div>
		<!-- Bloc Ajouter la photos de profil -->		
		<div id="inscrp1">
			<div class="sousinscrp">
				<div class="zz">Sélectionner une photo</div> 
				<button id="fermer" onclick="fermerladeuxpopup()"> X </button>
			</div>
			
			<form method="POST" action="./modif.php">
			<div class="img">
				<?php
					$img=listeRep("./Galerie/profil");

				
				foreach($img as $val){
					if($val!="." &&	$val!=".."){
						echo "<input type= 'radio' name= 'elpp' class= 'photosp' value='./Galerie/profil/{$val}' >"; 
						echo "<img alt='home' src='./Galerie/profil/{$val}' class='imgg' >";
					}
				}
			
				
			?>
			</div>
			<button id="modifier"  name="modifier" type="submit" value="modifier"> Valider les modifications </button>	
			</form>
			
			
		</div>
		<!-- Bloc Ajouter la photo de couverture -->
		<div id="inscrp2">
			<form method="POST" action="./modif.php">
			<div class="sousinscrp">
				<div class="zz">Sélectionner une photo</div> 
				<button  name="modifier" type="submit" value="modifier" id="fermer" onclick="fermerlatroispopup()"> X </button>	
			</div>
			
			<div class="img">   
				<?php
					$img=listeRep("./Galerie/couverture"); 

				
				foreach($img as $val){
					if($val!="." &&	$val!=".."){
						echo "<input type= 'radio' name= 'elpc' class= 'photosc' value='./Galerie/couverture/{$val}' >"; 
						echo "<img alt='home' src='./Galerie/couverture/{$val}' class='imggg' >";
					}
					
				}
			?>
			</div>
			<button id="modifier"  name="modifier" type="submit" value="modifier"> Enregistrer les modifications </button>
			</form>
			
			
		</div>
		

		<!-- Rend le  Fond plus foncé quand on appuie sur Editer le profil ou Ajouter -->			
		<div id="opac"></div>
		<div id="opac1"></div>

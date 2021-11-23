<div class= "lm">
                <form method="POST" action="./trombinouc.php">
					
                    <label for="login"></label><input id="login" name="login" type="text" placeholder="Login" required />
                    <label for="mdp"></label><input id="mdp" name="mdp" type="password"  placeholder="Mot de passe" required />
                    <button id="sub"  name="envoi" type="submit" value="envoi">Connnexion</button>
                </form>
                
                    <div class="trait"></div>
                    <div id="boutonpopup">
                        <button onclick="ouvrirlapopup()" id="creer"  name="envoi" type="submit" value="envoi">Créer un compte</button>
                        <!-- Bloc s'inscrire -->
                        
                            <div id="inscrp">
                               <div class="sousinscrp">
                                    <div class="zz">S'inscrire</div> 
                                    <button id="fermer" onclick="fermerlapopup()"> X </button>
                                    <div class="st">C'est rapide et facile.</div>
                                </div>
                                <form method="POST" action="./inscription.php">
									<label for="nom"></label><input class="log" name="nom" type="text" placeholder="Nom" />
									<label for="prenom"></label><input class="log" name="prenom" type="text" placeholder="Prénom" autocomplete="off" required />
									<!-- Pseudo -->
									<label for="login"></label><input class="log" name="login" type="text" placeholder="Pseudo" autocomplete="off" required />
									<!-- Mdp -->
									<label for="mdp"></label><input class="log" name="mdp" type="password"  placeholder="Nouveau mot de passe" autocomplete="off" required />
									<!--mail-->
									 
									<label for="mail"></label><input class="log" name="mail" type="email" placeholder="Mail" />
									<!-- Date de naissance -->
									<div class="vache">
										<label for="date">Date de naissance</label> 
									</div>                      
									<div class="zouzou">
										<div class="dd">
										<select name="jour" id="jour" placeholder="jour">        
											<?php
												$jourmin = 1;
												$jourmax = 31;
												for($i = $jourmin; $i <= $jourmax; $i++){
													
													echo '<option value="'.$i.'">'.$i.'</option>';
												 } 
											 ?>	   
										</select>
									   </div>
									   <div class="dd1">
											<select name="mois" id="mois" >        
												
												<?php
													$mois=array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec');		
											
											
													for($i = 0; $i <= 11; $i++){
													
													echo("<option value=\"$mois[$i]\" '>$mois[$i]</option>'");
														
													} 
									
												?>	   
											</select>
										</div>
										<div class="dd2">
											<select name="année" id="année" >        
												<?php
												$anneemax = date("Y");
												$anneemin =  1905;
												for($i = $anneemax; $i >= $anneemin; $i--){
													
													echo '<option value="'.$i.'">'.$i.'</option>';
												} 
												?>	   
											</select>
										</div>
									</div>
									<!--Genre -->
									<div class="vache">
										<label for="genre">Genre</label>
									</div>
									<div class="zouzou">
										
										<div class="qq">
											<label for="genre"></label>Femme<input type= "radio" name= "genre" value="Femme" class= "genre" /> 
										</div>
										<div class="qq">
											<label for="genre"></label>Homme<input type= "radio" name= "genre" value="Homme"  class= "genre" />
										</div>
									</div>
									<!-- Relation -->
									<div class="vache">
										<label for="relation">Relation</label>
									</div>
									<div class="zouzou">
										
										<div class="qqq">
											<label for="relation"></label>Célibataire<input type= "radio" value="Celibataire"  name= "relation" class= "celib" /> 
										</div>
										<div class="qqq">
											<label for="relation1"></label>En couple<input type= "radio" value="En couple" name= "relation" class= "couple" />
										</div>
										<div class="qqq">
											<label for="relation"></label>Autre<input type= "radio" value="Autre" name= "relation" class= "autre" />
										</div>
									</div>
									<!-- Bouton s'inscrire -->
									<button id="sinsc"  name="envoi" type="submit" value="envoi">S'inscrire</button>

                                </form>
                            </div>  
                    </div> 
                
            </div>

	<?php						if($pub[$i]['stat']==0){
								echo "<div id='pub{$pub[$i]['id_pub']}' class='pub'>";
								echo "<div class='pb'>";
										echo "<article class= blocpp>";
												echo "<img alt='photos de profil' src='{$pub[$i]['profil']}'  class='arrondie23'>";
										echo "</article >";	
										echo "<div class='ND'>";
													echo "<div class='nom'><a href='./muramis.php?amis={$pub[$i]['id']}'>{$pub[$i]['nom']} {$pub[$i]['prenom']}</a></div>";
													echo "<div class='daate'>{$pub[$i]['date_pub']} {$pub[$i]['heure']} </div>";	
										echo "</div>";
									echo "</div>";
									echo "<div class='cont'>";
											echo "{$pub[$i]['contenu']} ";
									echo "</div>";

									echo "<div class='traitt'></div>";
									echo "<div class='commenter'>";
									echo"<img alt='comm' src='./Galerie/commentaire.png'  class='comt'>";
									echo " Commenter";
									echo "</div>";
									
									echo "<div class='traitt'></div>";	
						
									for($m=0;$m<count($reponse);$m++){
										echo "<div class='commpublier'>";
											 echo "<article class=' blocpp'>";
												echo "<img alt='photos de profil' src='{$reponse[$m]['profil']}'  class='arrondie23'>";
											echo "</article >";
											echo "<div class='com'>";
											if($reponse[$m]['id']==$_SESSION['id']){
												echo "<div class='group'>";
												echo "<div class='ND'>";
											}
												echo "<div class='nom'><a href='./muramis.php?amis={$reponse[$m]['id']}'>{$reponse[$m]['nom']} {$reponse[$m]['prenom']}</a></div>";
												echo "<div class='daate'>{$reponse[$m]['date2']} {$reponse[$m]['heure2']} </div><br>";
												if($reponse[$m]['id']==$_SESSION['id']){	
													echo "</div>";
													echo " <form method='POST' action='./effac.php' style='margin-left: auto;margin-right:2%;'>";
													echo "<button alt='effacer' name='comm' value='{$reponse[$m]['id_com']}/{$pub[$m]['id_pub']}' class='effacerp'><img class='effacerpou' alt='poubelle' src='./Galerie/effacer.png' ></button>";
													echo "</form>";
													echo "</div>";
												}
												echo "<div class='publication'>{$reponse[$m]['contenuc']}</div>";
											echo "</div>";
										echo "</div>";
									}
						
									echo "<form method='POST' action='./commenter.php'>";
									echo "<div class='comm'>";
										echo "<article class=' blocpp'>";
										echo "<img alt='photos de profil' src='{$login['profil']}' class=arrondie23> ";
										echo "</article >";
										echo "<div class='commm'>";
											echo "<input id='comment' name='comment' type='text' placeholder='Écrivez un commentaire...' autocomplete='off'/>";
										echo "</div>";
										echo "<button id='publier'  name='commenter' type='submit' value='{$pub[$i]['id_pub']}/{$login['id']}'>Publier</button>";
									echo "</div>";
									echo "</div>";
									echo "</form>";
							}
							//les publications d'anniversaire
							else{
									echo "<div id='pub{$pub[$i]['id_pub']}' class='pubannv'>";
									echo "<div class='pb'>";
									echo "<article class= blocpp>";
											echo "<img alt='photos de profil' src='{$pub[$i]['profil']}'  class='arrondie23'>";
									echo "</article >";	
									echo "<div class='ND'>";
												echo "<div class='nom'><a href='./muramis.php?amis={$pub[$i]['id']}'>{$pub[$i]['nom']} {$pub[$i]['prenom']}</a></div>";
												echo "<div class='daate'>{$pub[$i]['date_pub']} {$pub[$i]['heure']} </div>";	
									echo "</div>";
									echo " <form method='POST' action='./effac.php' style='margin-left: auto;margin-right:2%;'>";
									echo "<button alt='effacer'  name='pub' value='{$pub[$i]['id_pub']}' class='effacer'><img class='effacerpou' alt='poubelle' src='./Galerie/effacer.png' ></button>";
									echo "</form>";
									echo "</div>";
									echo "<div class='contanniv'>";
											echo "{$pub[$i]['contenu']} ";
									echo "</div>";

									echo "<div class='traitannv'></div>";
									echo "<div class='commenter'>";
									echo"<img alt='comm' src='./Galerie/commentaire.png'  class='comt'>";
									echo " Commenter";
									echo "</div>";
						
									echo "<div class='traitannv'></div>";	
									
									for($j=0;$j<count($reponse);$j++){
										echo "<div class='commpublier'>";
											 echo "<article class=' blocpp'>";
												echo "<img alt='photos de profil' src='{$reponse[$j]['profil']}'  class='arrondie23'>";
											echo "</article >";
											echo "<div class='comannv'>";
											if($reponse[$j]['id']==$_SESSION['id']){
											echo "<div class='group'>";
											echo "<div class='ND'>";
										}
												echo "<div class='nom'><a href='./muramis.php?amis={$reponse[$j]['id']}'>{$reponse[$j]['nom']} {$reponse[$j]['prenom']}</a></div>";
												echo "<div class='daate'>{$reponse[$j]['date2']} {$reponse[$j]['heure2']} </div><br>";
												if($reponse[$j]['id']==$_SESSION['id']){
												echo "</div>";
												echo " <form method='POST' action='./effac.php' style='margin-left: auto;margin-right:2%;'>";
											echo "<button alt='effacer' name='comm' value='{$reponse[$j]['id_com']}' class='effacerp'><img class='effacerpou' alt='poubelle' src='./Galerie/effacer.png' ></button>";
											echo "</form>";
											echo "</div>";
										}
												echo "<div class='publication'>{$reponse[$j]['contenuc']}</div>";
											echo "</div>";
										echo "</div>";
									}
									echo "<form method='POST' action='./commenteranniv.php'>";
									echo "<div class='comm'>";
										echo "<article class='blocpp'>";
										echo "<img alt='photos de profil' src='{$login['profil']}' class=arrondie23> ";
										echo "</article >";
										echo "<div class='commm'>";
											echo "<input id='commenta' name='comment' type='text' placeholder='Écrivez un commentaire...' autocomplete='off'/>";
										echo "</div>";
										echo "<button id='publiera'  name='commenter' type='submit' value='{$pub[$i]['id_pub']}/{$login['id']}'>Publier</button>";
									echo "</div>";
									echo "</div>";
									echo "</form>";	
								}
				
				?>	

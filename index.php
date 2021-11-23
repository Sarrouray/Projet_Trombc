<!DOCTYPE html>
<html lang="fr">
	<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="./pda.css" />
	<link rel="preconnect" href="https://fonts.gstatic.com"/>
	<link href="https://fonts.googleapis.com/css2?family=RocknRoll+One&display=swap" rel="stylesheet"/>
	<link href="https://fonts.googleapis.com/css2?family=Neucha&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet"/>
	
	<title>Trombinouc</title>
	</head>
	<body>


        <section>
			<!-- php le mdp incorrect -->
					<?php
						if ($_GET['msg']=="err"){
							echo "</br>";
							echo "<div class='rectf'>Login ou mot de passe incorrect. Veuillez recommencer.</div>";
						}
						
						if ($_GET['msg']=="compte"){
							echo "</br>";
							echo "<div class='rectf'>Vous n'avez pas de compte. Veuillez vous incrire.</div>";
						}
						
						if ($_GET['msg']=="creer"){
							echo "</br>";
							echo "<div class='rectf'>Votre compte a été crée. Veuillez vous connecter.</div>";
						}
						
						if ($_GET['msg']=="deconnex"){
							echo "</br>";
							echo "<div class='rectf'>Vous avez été déconnecté. Veuillez vous identifier.</div> ";
						}
						if ($_GET['msg']=="comptesup"){
							echo "</br>";
							echo "<div class='rectf'>Votre compte a été définitivement supprimé !</div> ";
						}
						
						  if ($_GET['msg']=="mail"){
                            echo "</br>";
                            echo "<div class='rectf'>Ce mail n'est pas disponible veuillez en choisir un autre !</div> ";
                        }
                        if ($_GET['msg']=="pseudo"){
                            echo "</br>";
                            echo "<div class='rectf'>Ce pseudo n'est pas disponible veuillez en choisir un autre !</div> ";
                        }
                        if ($_GET['msg']=="nom"){
                            echo "</br>";
                            echo "<div class='rectf'>Ce nom n'est pas disponible veuillez en choisir un autre !</div> ";
                        }
                        if ($_GET['msg']=="prenom"){
                            echo "</br>";
                            echo "<div class='rectf'>Ce prenom n'est pas disponible veuillez en choisir un autre !</div> ";
                        }
						
					?>
			<!-- end php -->
            <!-- Bloc ce connecter -->
            <?php include("./inscrire.php") ?>
            
		</section>
        <div id="opac"></div>
       
        <!-- Titre -->
        <div class=titreee>
            <p>trombinouc</p>
        </div>
        <!-- Sous-titre -->
        <div class=sous_titre>
            <p>Avec Trombinouc, partagez et restez en <br>contact avec votre entourage.</p>
        </div>

        <!-- Ajoute le code php ici -->


        <!-- bloc du bas  -->
        <div id=le_bas>
            <p>Mini-facebook réalisé par: Nurdini Binti Mohamad & Sarah Ben Rhouma</p>
        </div>
        <script src="./inscription.js" type="text/javascript"></script>
    </body>
</html>

<?php 
	try {
		$bd = new PDO("mysql:host=localhost;dbname=bn016167","bn016167","bn016167126b");
		$bd ->exec('SET NAMES utf8');
	}
	catch( Exception $e) {
		die("Erreur: Connexion impossible");
	}
	
	$sql = "SELECT * FROM UTILISATEURS";
	$req = $bd->prepare($sql);
	$req->execute();
	$users=$req->fetchall();
	$req->closeCursor();
	
			function listeRep($unRep) {
				$allFic=array();
				if (is_dir($unRep) == FALSE) {
					echo "{$unRep} n'est pas un répertoire !";
				}
				else {
					$rep = opendir($unRep);
					if ($rep == FALSE) {
						echo "Impossible d'ouvrir le répertoire {$unRep}";
					}
					else {
						while (($fic = readdir($rep)) == TRUE) {
							$allFic[]=$fic;
						}
					closedir($rep);
					sort($allFic);
					}
				}
				return $allFic;
			}
			
		
?>
	

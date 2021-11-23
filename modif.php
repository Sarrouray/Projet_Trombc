<?php
		session_start();
		include("Outils/base.php");
		
		if (!isset($_SESSION['id'])){
			header('Location:index.php');
		  	exit();
		}
		
		$sql = " UPDATE UTILISATEURS SET genre=:genre WHERE id=:id  ";
		$req = $bd->prepare($sql);
		$marq=array('id'=>$_SESSION['id'],'genre'=>$_POST['genre']);
		$req->execute($marq);
		$req->closeCursor();
	
		
								
		$sql = " UPDATE UTILISATEURS SET relation=:relation WHERE id=:id  ";
		$req = $bd->prepare($sql);
		$marq=array('id'=>$_SESSION['id'],'relation'=>$_POST['relation']);
		$req->execute($marq);
		$req->closeCursor();
	
				
		$sql = "UPDATE UTILISATEURS SET profil=:profil WHERE id=:id  ";
		$req = $bd->prepare($sql);
		$marq=array('id'=>$_SESSION['id'],'profil'=>$_POST['elpp']);
		$req->execute($marq);
		$photos=$req->fetch();
		$req->closeCursor();


		
		$sql = "UPDATE UTILISATEURS SET couverture=:couverture WHERE id=:id  ";
		$req = $bd->prepare($sql);
		$marq=array('id'=>$_SESSION['id'],'couverture'=>$_POST['elpc']);
		$req->execute($marq);
		$photos=$req->fetch();
		$req->closeCursor();
	
	if (empty($_POST['login1']) AND empty($_POST['nom1']) AND empty($_POST['mdp1']) AND empty($_POST['prenom1']) AND empty($_POST['maiil1']) AND empty($_POST['login']) AND empty($_POST['nom']) AND empty($_POST['maiil']) AND empty($_POST['prenom']) AND empty($_POST['mdp']) AND empty($_POST['genre']) AND empty($_POST['relation'])){
			header('Location:trombinouc.php');
					exit();
		}

	
	
	if (!empty($_POST['login'])){
			for($i=0;$i<count($users);$i++){
				if ($_POST['login']==$users[$i]['pseudo']){
					header('Location:erreur.php?msg=errpseudo');
					exit();
				}			
			}
		}
	
			$sql = "SELECT * FROM UTILISATEURS WHERE id=:id";
			$req = $bd->prepare($sql);
			$marq=array('id'=>$_SESSION['id']);
			$req->execute($marq);
			$us=$req->fetch();
			$req->closeCursor();
		

	if (!empty($_POST['login1'])){
		if($_POST['login1']!=$us['pseudo']){
			header('Location:erreur.php?msg=errlog');
					exit();
		}
	}
	
	if (!empty($_POST['nom1'])){
		if($_POST['nom1']!=$us['nom']){
			header('Location:erreur.php?msg=errnom');
					exit();
		}
	}
	
	if (!empty($_POST['prenom1'])){
		if($_POST['prenom1']!=$us['prenom']){
			header('Location:erreur.php?msg=errprenom');
					exit();
		}
	}
	
	if (!empty($_POST['mdp1'])){
		if($_POST['mdp1']!=$us['mdp']){
			header('Location:erreur.php?msg=errmdp');
					exit();
		}
	}
	if (!empty($_POST['maiil1'])){
		if($_POST['maiil1']!=$us['mail']){
			header('Location:erreur.php?msg=errmaiil');
					exit();
		}
	}

		if (!empty($_POST['login'])){				
		$sql = "UPDATE UTILISATEURS SET pseudo=:login WHERE id=:id ";
		$req = $bd->prepare($sql);
		$marq=array('id'=>$_SESSION['id'],'login'=>$_POST['login']);
		$req->execute($marq);
		$req->closeCursor();
	}
		if (!empty($_POST['nom'])){
		$sql = "UPDATE UTILISATEURS SET nom=:nom WHERE id=:id  ";
		$req = $bd->prepare($sql);
		$marq=array('id'=>$_SESSION['id'],'nom'=>$_POST['nom']);
		$req->execute($marq);
		$req->closeCursor();
	}
		if (!empty($_POST['prenom'])){		
		$sql = "UPDATE UTILISATEURS SET prenom=:prenom WHERE id=:id  ";
		$req = $bd->prepare($sql);
		$marq=array('id'=>$_SESSION['id'],'prenom'=>$_POST['prenom']);
		$req->execute($marq);
		$req->closeCursor();
	}
	
		if (!empty($_POST['maiil'])){					
		$sql = "UPDATE UTILISATEURS SET  mail=:mail WHERE id=:id  ";
		$req = $bd->prepare($sql);
		$marq=array('id'=>$_SESSION['id'],'mail'=>$_POST['maiil']);
		$req->execute($marq);
		$req->closeCursor();
	}						
		$sql = "UPDATE UTILISATEURS SET jour=:jour, mois=:mois, annee=:annee WHERE id=:id  ";
		$req = $bd->prepare($sql);
		$marq=array('id'=>$_SESSION['id'],'jour'=>$_POST['jour'],'mois'=>$_POST['mois'],'annee'=>$_POST['annee']);
		$req->execute($marq);
		$req->closeCursor();
	
		if (!empty($_POST['mdp'])){					
		$sql = "UPDATE UTILISATEURS SET  mdp=:mdp WHERE id=:id  ";
		$req = $bd->prepare($sql);
		$marq=array('id'=>$_SESSION['id'],'mdp'=>$_POST['mdp']);
		$req->execute($marq);
		$req->closeCursor();
}
					
		
	


		
				header('Location:trombinouc.php');
	
				
?>	


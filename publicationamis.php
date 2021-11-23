<?php	
		session_start();
		include("Outils/base.php");
		if (!isset($_SESSION['id'])){
			header('Location:index.php');
		  	exit();
		}
	
		$sql = "SELECT * FROM UTILISATEURS WHERE id=:id";
		$req = $bd->prepare($sql);
		$req->execute(array('id'=>$_GET['amis']));
		$login=$req->fetch();
		$req->closeCursor();
		
		$date=date("Y-m-d");
		$heure=date("H:i:s");
		$sql = "INSERT INTO `PUBLICATIONS` (`id_pub`, `U_id`, `contenu`,`date_pub`, `heure`,`stat`) VALUES (NULL,:utilisateur,:contenu, :date, :heure,0)";
		$req = $bd->prepare($sql);
		$marq=array('utilisateur'=>$_SESSION['id'],'contenu'=>$_POST['comment'],'date'=>$date,'heure'=>$heure);
		$req->execute($marq);
		$pub=$req->fetch();
		$req->closeCursor();
	
		
		header("Location:muramis.php?amis={$login['id']}#pub");
		
?> 

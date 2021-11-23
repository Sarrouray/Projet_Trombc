<?php	
		session_start();
		include("Outils/base.php");
		if (!isset($_SESSION['id'])){
			header('Location:index.php');
		  	exit();
		}
		$date=date("Y-m-d");
		$heure=date("H:i:s");
		$sql = "INSERT INTO `PUBLICATIONS` (`id_pub`, `U_id`, `contenu`,`date_pub`, `heure`,`stat`) VALUES (NULL,:utilisateur,:contenu, :date, :heure,1)";
		$req = $bd->prepare($sql);
		$marq=array('utilisateur'=>$_SESSION['id'],'contenu'=>$_POST['SJA'],'date'=>$date,'heure'=>$heure);
		$req->execute($marq);
		$pub=$req->fetch();
		$req->closeCursor();
		
		header('Location:trombinouc.php#pub');
		
		
		
?> 

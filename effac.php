<?php
		session_start();
		include("Outils/base.php");
		
		if (!isset($_SESSION['id'])){
			header('Location:index.php');
		  	exit();
		}
		
		if(isset($_POST['comm'])){
		$var=explode("/",$_POST['comm']);}
		
		$sql = "DELETE FROM REPONSES  WHERE id_pub2=:publ ";
		$req = $bd->prepare($sql);
		$marq=array('publ'=>$_POST['pub']);
		$req->execute($marq);
		$req->closeCursor();
		
		$sql = "DELETE FROM PUBLICATIONS  WHERE id_pub=:publ ";
		$req = $bd->prepare($sql);
		$marq=array('publ'=>$_POST['pub']);
		$req->execute($marq);
		$req->closeCursor();
		
		$sql = "DELETE FROM REPONSES WHERE id_com=:comm ";
		$req = $bd->prepare($sql);
		$marq=array('comm'=>$_POST['comm']);
		$req->execute($marq);
		$req->closeCursor();
		
	if(isset($_POST['comm'])){	
	header("Location:trombinouc.php#pub{$var[1]}");
	exit();
	}
		
header("Location:trombinouc.php");
		
		?>

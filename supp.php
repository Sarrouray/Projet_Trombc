<?php
		session_start();
		include("Outils/base.php");
		
		if (!isset($_SESSION['id'])){
			header('Location:index.php');
		  	exit();
		}
	
		
		$sql = "DELETE FROM AMIS  WHERE id_U=:id OR id_ami2=:id ";
		$req = $bd->prepare($sql);
		$marq=array('id'=>$_SESSION['id']);
		$req->execute($marq);
		$req->closeCursor();
		
		$sql = "DELETE FROM REPONSES  WHERE id_amis=:id ";
		$req = $bd->prepare($sql);
		$marq=array('id'=>$_SESSION['id']);
		$req->execute($marq);
		$req->closeCursor();
		
		$sql = "DELETE FROM PUBLICATIONS  WHERE U_id=:id ";
		$req = $bd->prepare($sql);
		$marq=array('id'=>$_SESSION['id']);
		$req->execute($marq);
		$req->closeCursor();
		
		$sql = "DELETE FROM UTILISATEURS  WHERE id=:id  ";
		$req = $bd->prepare($sql);
		$marq=array('id'=>$_SESSION['id']);
		$req->execute($marq);
		$req->closeCursor();
		
	header('Location:index.php?msg==comptesup');
		

		
		?>

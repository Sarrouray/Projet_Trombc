<?php
		session_start();
		include("Outils/base.php");
		if (!isset($_SESSION['id'])){
			header('Location:index.php');
		  	exit();
		}
		
		$date=date("Y-m-d");
		$heure=date("H:i:s");
		
		//ajouter de reponse
		$var = explode("/",$_POST['commenter']);
		
		$sql = "INSERT INTO `REPONSES`(`id_com`, `id_pub2`,`id_amis`,`date2`, `heure2`,`contenuc`,`statu`) VALUES (NULL,:pub,:amis,:date,:heure,:cont,1)";
		$req = $bd->prepare($sql);
		$marq=array('pub'=>$var[0],'amis'=>$var[1],'date'=>$date,'heure'=>$heure,'cont'=>$_POST['comment']);
		$req->execute($marq);
		$req->closeCursor();
		
		header('Location:trombinouc.php#pub'.$var[0]);

?>

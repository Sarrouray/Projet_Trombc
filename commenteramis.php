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
		
		//ajouter de reponse
		$var = explode("/",$_POST['commenter']);
		
		$sql = "INSERT INTO `REPONSES`(`id_com`, `id_pub2`,`id_amis`,`date2`, `heure2`,`contenuc`,`statu`) VALUES (NULL,:pub,:amis,:date,:heure,:cont,0)";
		$req = $bd->prepare($sql);
		$marq=array('pub'=>$var[0],'amis'=>$var[1],'date'=>$date,'heure'=>$heure,'cont'=>$_POST['comment']);
		$req->execute($marq);
		$req->closeCursor();
		
		header("Location:muramis.php?amis={$login['id']}#pub{$var[0]}");

?>

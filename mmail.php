<?php

		session_start();
		include("Outils/base.php");
		if (!isset($_SESSION['id'])){
			header('Location:index.php');
		  	exit();
		}

$sql = "SELECT * FROM UTILISATEURS WHERE id=:id";
		$req = $bd->prepare($sql);
		$req->execute(array('id'=>$_SESSION['id']));
		$login=$req->fetch();
		$req->closeCursor();
		
$to = $_POST['dest'];
$subject = $_POST['suj'];
$message = $_POST['texte']; 
$headers = "From: {$login['mail']}" ;


if(mail($to, $subject, $message,$headers)){
    header('Location:email.php?mail=reussi');
} else{
    header('Location:erreur.php?mail=err');
}



?>


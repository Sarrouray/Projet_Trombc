<?php
		session_start();
		include("Outils/base.php");
		if (!isset($_SESSION['id'])){
			header('Location:index.php');
		  	exit();
		}
		
		$date=date("Y-m-d");
		$heure=date("H:i:s");
		
		//demander à un amis
		if(isset($_POST['demander'])){
			
					$sql = "INSERT INTO `AMIS`(`id_U`, `id_ami2`, `Damis`, `Hamis`,`status`) VALUES (:user,:ami,:date,:heure,0)";
					$req = $bd->prepare($sql);
					$marq=array('user'=>$_SESSION['id'],'ami'=>$_POST['demander'],'date'=>$date,'heure'=>$heure);
					$req->execute($marq);
					$req->closeCursor();
					
					header("Location:muramis.php?amis={$_POST['demander']}");
					exit();
		}
		
		//accepter la demande
		if(isset($_POST['accepter'])){
			$sql = "DELETE FROM `AMIS` WHERE id_ami2=:user1 AND id_U=:ami";
					$req = $bd->prepare($sql);
					$marq2=array('user1'=>$_SESSION['id'],'ami'=>$_POST['accepter']);
					$req->execute($marq2);
					$req->closeCursor();
					
					$sql = "INSERT INTO `AMIS`(`id_U`, `id_ami2`, `Damis`, `Hamis`,`status`) VALUES (:user,:ami,:date,:heure,1),(:ami,:user,:date,:heure,1)";
					$req = $bd->prepare($sql);
					$marq=array('user'=>$_SESSION['id'],'ami'=>$_POST['accepter'],'date'=>$date,'heure'=>$heure);
					$req->execute($marq);
					$req->closeCursor();
					header("Location:muramis.php?amis={$_POST['accepter']}");
					exit();
		}
		
		if(isset($_POST['supprimer'])){		
					$sql = "DELETE FROM `AMIS` WHERE id_U=:user1 AND id_ami2=:ami AND status=0";
					$req = $bd->prepare($sql);
					$marq2=array('user1'=>$_SESSION['id'],'ami'=>$_POST['supprimer']);
					$req->execute($marq2);
					$req->closeCursor();
					header("Location:muramis.php?amis={$_POST['supprimer']}");
					exit();
		}
		
		if(isset($_POST['amis'])){		
					header("Location:muramis.php?amis={$_POST['amis']}");
					exit();
		}
		
		//bloquer un amis 
		if(isset($_POST['id_bloqamis'])){
					$sql = "DELETE FROM `AMIS` WHERE (id_U=:user1 AND id_ami2=:ami) OR (id_U=:ami AND id_ami2=:user1)";
					$req = $bd->prepare($sql);
					$marq2=array('user1'=>$_SESSION['id'],'ami'=>$_POST['id_bloqamis']);
					$req->execute($marq2);
					$req->closeCursor();
					
					$sql = "INSERT INTO `AMIS`(`id_U`, `id_ami2`, `Damis`, `Hamis`,`status`) VALUES (:user,:ami,:date,:heure,2)";
					$req = $bd->prepare($sql);
					$marq=array('user'=>$_SESSION['id'],'ami'=>$_POST['id_bloqamis'],'date'=>$date,'heure'=>$heure);
					$req->execute($marq);
					$req->closeCursor();
					
					header("Location:muramis.php?amis={$_POST['id_bloqamis']}");
					exit();
		}
		
		//debloquer 
		if(isset($_POST['debloquer'])){
			
					$sql = "DELETE FROM `AMIS` WHERE id_U=:user1 AND id_ami2=:ami";
					$req = $bd->prepare($sql);
					$marq2=array('user1'=>$_SESSION['id'],'ami'=>$_POST['debloquer']);
					$req->execute($marq2);
					$req->closeCursor();
					
					header("Location:muramis.php?amis={$_POST['debloquer']}");
					exit();
		}
		
		//bloquer
		if(isset($_POST['bloquer'])){
			
					$sql = "DELETE FROM `AMIS` WHERE id_U=:user1 AND id_ami2=:ami";
					$req = $bd->prepare($sql);
					$marq2=array('user1'=>$_SESSION['id'],'ami'=>$_POST['bloquer']);
					$req->execute($marq2);
					$req->closeCursor();
					
					$sql = "INSERT INTO `AMIS`(`id_U`, `id_ami2`, `Damis`, `Hamis`,`status`) VALUES (:user,:ami,:date,:heure,2)";
					$req = $bd->prepare($sql);
					$marq=array('user'=>$_SESSION['id'],'ami'=>$_POST['bloquer'],'date'=>$date,'heure'=>$heure);
					$req->execute($marq);
					$req->closeCursor();
					header("Location:muramis.php?amis={$_POST['bloquer']}");
					exit();
		}
?>

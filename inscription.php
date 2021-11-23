<?php	
	include("Outils/base.php");
		
		
		
		 $sql = "SELECT * FROM UTILISATEURS ";
        $req = $bd->prepare($sql);
        $req->execute();
        $account=$req->fetchall();
        $req->closeCursor();

        for($k=0;$k<count($account);$k++){
            if($account[$k]['nom']==$_POST['nom']){
                header('Location:index.php?msg=nom');
                exit();
            }
            if($account[$k]['prenom']==$_POST['prenom']){
                 header('Location:index.php?msg=prenom');
                 exit();
            }
            if($account[$k]['mail']==$_POST['mail']){
                 header('Location:index.php?msg=mail');
                 exit();
            }
             if($account[$k]['pseudo']==$_POST['login']){
                 header('Location:index.php?msg=pseudo');
                 exit();
             }

        }

		
		
		
		$sql = "INSERT INTO `UTILISATEURS` (`id`, `nom`, `prenom`,`pseudo`, `mdp`,`mail`, `jour`,  `mois`, `annee`,`genre`, `relation`, `profil`, `couverture`) VALUES (NULL,:nom,:prenom, :pseudo, :mdp, :mail, :jour,:mois,:annee, :genre, :relation, './Galerie/profildefaut.jpg', './Galerie/couverturedefaut.jpg')";
		$req = $bd->prepare($sql);
		$marq=array('nom'=>$_POST['nom'],'prenom'=>$_POST['prenom'],'pseudo'=>$_POST['login'],'mdp'=>$_POST['mdp'],'mail'=>$_POST['mail'],'jour'=>$_POST['jour'],'mois'=>$_POST['mois'],'annee'=>$_POST['année'],'genre'=>$_POST['genre'],'relation'=>$_POST['relation']);
		$req->execute($marq);
		$euro=$req->fetchall();
		$req->closeCursor();
		
		header('Location:index.php?msg=creer');
		
		
		
?>  

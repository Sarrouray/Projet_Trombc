<?php
	session_start();
	// Ici le code PHP qui détruit la session ...
	session_destroy();	
	
	header('Location:index.php?msg=deconnex');
?>


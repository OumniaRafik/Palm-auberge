<?php
	session_start();
	if (isset($_SESSION["username"])) 
	{
		 echo '<h3>Vous devez remplir tout les shamps<h3>';
		 echo '<br/><a href="index.php">Retour</a>';
	}

?>
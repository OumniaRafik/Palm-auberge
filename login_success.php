<?php
	session_start();
	if (isset($_SESSION["username"])) 
	{
		echo '<h3>Connection réussite, Bienvenue Mr/Mme '.$_SESSION["username"].' <h3>';
		echo '<br/><a href="index.php">Retour</a>';
	}

?>
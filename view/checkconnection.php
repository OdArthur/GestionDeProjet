<?php
session_start();
		
		if(!isset($_SESSION['ID']))
		{
			header('Location: ../public/connexion.php');
		}
?>
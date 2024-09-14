<?php
	session_start();
	
	if(!isset($_SESSION["username"]))
	{
		header("location: ../homepage.php");
	}
	
	if(!isset($_SESSION["cancella"]))
	{
		header("location: visualizzazione_merce.php");
	}
	
	include "../../connessione_DB.php";
	
	$qry = "DELETE FROM mezzi
			WHERE targa = '" . $_SESSION["targa"] . "';";
	
	if(!$conn->query($qry))
	{
		die("Errore: " . $qry . "<br>" . $conn->error);
	}
	
	$_SESSION["mezzo_cancellato"] = 1;
	header("location: visualizzazione_mezzi.php");
?>
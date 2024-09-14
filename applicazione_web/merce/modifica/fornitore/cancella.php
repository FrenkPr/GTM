<?php
	session_start();
	
	if(!isset($_SESSION["username"]))
	{
		header("location: ../../../homepage.php");
	}
	
	if(!isset($_SESSION["cancella"]))
	{
		header("location: visualizzazione_merce.php");
	}
	
	include "../../../connessione_DB.php";
	
	$qry = "DELETE FROM merce
			WHERE id_merce = '" . $_SESSION["id_merce"] . "';";
	
	if(!$conn->query($qry))
	{
		die("Errore: " . $qry . "<br>" . $conn->error);
	}
	
	$_SESSION["merce_cancellata"] = 1;
	header("location: visualizzazione_merce.php");
?>
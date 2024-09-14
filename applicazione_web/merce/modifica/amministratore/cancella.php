<?php
	session_start();
	
	if(!isset($_SESSION["username"]))
	{
		header("location: ../../../homepage.php");
	}
	
	if(!isset($_POST["cancella"]))
	{
		header("location: visualizzazione_merce.php");
	}
	
	include "../../../connessione_DB.php";
	
	$qry = "DELETE FROM merce
			WHERE id_merce = '" . $_POST["id_merce"] . "';";
	
	if(!$conn->query($qry))
	{
		die("Errore: " . $qry . "<br>" . $conn->error);
	}
	
	$_SESSION["merce_cancellata"] = 1;
	header("location: visualizzazione_merce.php");
?>
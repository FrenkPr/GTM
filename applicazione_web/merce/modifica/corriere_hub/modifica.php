<?php
	session_start();
	
	if(!isset($_SESSION["username"]))
	{
		header("location: ../../../homepage.php");
	}
	
	if(!isset($_POST["modifica"]))
	{
		header("location: visualizzazione_merce.php");
	}
	
	include "../../../connessione_DB.php";
	
	$qry = "";
	
	if($_POST["stato"] != '')
	{
		$qry .= "UPDATE merce
				SET stato = '".$_POST["stato"]."'
				WHERE id_merce = '".$_POST["id_merce"]."';";
	}
	
	if($_POST["note_stato"] != '')
	{
		$qry .= "UPDATE merce
				SET note_stato = '".$_POST["note_stato"]."'
				WHERE id_merce = '".$_POST["id_merce"]."';";
	}
	
	if(!$conn->multi_query($qry))
	{
		die("Errore: " . $qry . "<br>" . $conn->error);
	}
	
	$_SESSION["dati_modificati"] = 1;
	header("location: visualizzazione_merce.php");
?>
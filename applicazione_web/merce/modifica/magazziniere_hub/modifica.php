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
	
	if($_POST["lunghezza_collo"] != '')
	{
		$qry .= "UPDATE merce
				SET lunghezza_collo = '".$_POST["lunghezza_collo"]."'
				WHERE id_merce = '".$_POST["id_merce"]."';";
	}
	
	if($_POST["larghezza_collo"] != '')
	{
		$qry .= "UPDATE merce
				SET larghezza_collo = '".$_POST["larghezza_collo"]."'
				WHERE id_merce = '".$_POST["id_merce"]."';";
	}
	
	if($_POST["altezza_collo"] != '')
	{
		$qry .= "UPDATE merce
				SET altezza_collo = '".$_POST["altezza_collo"]."'
				WHERE id_merce = '".$_POST["id_merce"]."';";
	}
	
	if($_POST["peso_collo"] != '')
	{
		$qry .= "UPDATE merce
				SET peso_collo = '".$_POST["peso_collo"]."'
				WHERE id_merce = '".$_POST["id_merce"]."';";
	}
	
	if($_POST["num_scaffale"] != '')
	{
		$qry .= "UPDATE merce
				SET num_scaffale = '".$_POST["num_scaffale"]."'
				WHERE id_merce = '".$_POST["id_merce"]."';";
	}
	
	if($_POST["consegna_es_comm"] != '')
	{
		$qry .= "UPDATE merce
				SET data_consegna_es_comm = '".$_POST["consegna_es_comm"]."'
				WHERE id_merce = '".$_POST["id_merce"]."';";
	}
	
	if($_POST["stato"] != '')
	{
		$qry .= "UPDATE merce
				SET stato = '".$conn->real_escape_string($_POST["stato"])."'
				WHERE id_merce = '".$_POST["id_merce"]."';";
	}
	
	if($_POST["note_stato"] != '')
	{
		$qry .= "UPDATE merce
				SET note_stato = '".$conn->real_escape_string($_POST["note_stato"])."'
				WHERE id_merce = '".$_POST["id_merce"]."';";
	}
	
	if(!$conn->multi_query($qry))
	{
		die("Errore: " . $qry . "<br>" . $conn->error);
	}
	
	$_SESSION["dati_modificati"] = 1;
	header("location: visualizzazione_merce.php");
?>
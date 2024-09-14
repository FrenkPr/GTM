<?php
	session_start();
	
	if(!isset($_SESSION["username"]))
	{
		header("location: ../homepage.php");
	}
	
	if(!isset($_POST["modifica"]))
	{
		header("location: visualizzazione_mezzi.php");
	}
	
	include "../../connessione_DB.php";
	
	$qry = "";
	
	if($_POST["targa_modificata"] != '')
	{
		$qry .= "UPDATE mezzi
				 SET targa = '".$_POST["targa_modificata"]."'
				 WHERE targa = '".$_POST["targa"]."';";
		
		$_POST["targa"] = $_POST["targa_modificata"];
	}
	
	if($_POST["volume"] != '')
	{
		$qry .= "UPDATE mezzi
				 SET volume = '".$_POST["volume"]."'
				 WHERE targa = '".$_POST["targa"]."';";
	}
	
	if($_POST["autonomia"] != '')
	{
		$qry .= "UPDATE mezzi
				 SET autonomia = '".$_POST["autonomia"]."'
				 WHERE targa = '".$_POST["targa"]."';";
	}
	
	if($_POST["lunghezza"] != '')
	{
		$qry .= "UPDATE mezzi
				 SET lunghezza = '".$_POST["lunghezza"]."'
				 WHERE targa = '".$_POST["targa"]."';";
	}
	
	if($_POST["larghezza"] != '')
	{
		$qry .= "UPDATE mezzi
				 SET larghezza = '".$_POST["larghezza"]."'
				 WHERE targa = '".$_POST["targa"]."';";
	}
	
	if($_POST["altezza"] != '')
	{
		$qry .= "UPDATE mezzi
				 SET altezza = '".$_POST["altezza"]."'
				 WHERE targa = '".$_POST["targa"]."';";
	}
	
	if($_POST["peso"] != '')
	{
		$qry .= "UPDATE mezzi
				 SET peso = '".$_POST["peso"]."'
				 WHERE targa = '".$_POST["targa"]."';";
	}
	
	if(!isset($_POST["mezzoFrigorifero"]))
	{
		$_POST["mezzoFrigorifero"] = '0';
	}
	
	else
	{
		$_POST["mezzoFrigorifero"] = '1';
	}
	
	if(!isset($_POST["mezzoFreezer"]))
	{
		$_POST["mezzoFreezer"] = '0';
	}
	
	else
	{
		$_POST["mezzoFreezer"] = '1';
	}
	
	if(!isset($_POST["mezzoGuasto"]))
	{
		$_POST["mezzoGuasto"] = '0';
		
		$qry .= "UPDATE mezzi
				 SET guasto = '".$_POST["mezzoGuasto"]."',
				 descrizione_guasto = NULL
				 WHERE targa = '".$_POST["targa"]."';";
	}
	
	else
	{
		$_POST["mezzoGuasto"] = '1';
		
		$qry .= "UPDATE mezzi
				 SET guasto = '".$_POST["mezzoGuasto"]."',
				 descrizione_guasto = '".$_POST["descrizioneGuasto"]."'
				 WHERE targa = '".$_POST["targa"]."';";
	}
	
	$qry .= "UPDATE mezzi
			 SET mezzo_frigorifero = '".$_POST["mezzoFrigorifero"]."',
			 mezzo_freezer = '".$_POST["mezzoFreezer"]."'
			 WHERE targa = '".$_POST["targa"]."';";
	
	if(!$conn->multi_query($qry))
	{
		die("Errore: " . $qry . "<br>" . $conn->error);
	}
	
	$_SESSION["dati_modificati"] = 1;
	header("location: visualizzazione_mezzi.php");
?>
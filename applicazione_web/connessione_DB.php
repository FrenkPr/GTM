<?php
	//creazione connessione
	$conn = new mysqli("localhost", "root", "", "gtm");
	
	//controllo connessione
	if ($conn->connect_error){
		
		die("Connessione fallita: " . $conn->connect_error);
	}
?>
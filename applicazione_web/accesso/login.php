<?php
	if(isset($_POST["accedi"]))
	{	
		include "../connessione_DB.php";

		session_start();
		
		$username = $conn->real_escape_string($_POST["username"]);
		$password = md5($_POST["pass"]);
		
		$qry = "SELECT ruolo, fk_id_azienda
				FROM utenti
				WHERE username = '$username' AND password = '$password';";
		
		$ris = $conn->query($qry);
		
		if($ris)
		{	
			//il programma entrerà in quest'if, se le credenziali sono corrette
			if($ris->num_rows)
			{
				$riga = $ris->fetch_row();
				
				$_SESSION["username"] = $_POST["username"];
				$_SESSION["ruolo"] = $riga[0];
				$_SESSION["id_azienda"] = $riga[1];
				header("location: ../homepage.php");
			}
			
			//il programma entrerà in quest'else, se l'username e/o la password sono errati
			else
			{	
				$_SESSION["errore"] = 1;
				
				//ricerca se trova almeno l'username.
				//In tal caso, più avanti visualizzerà solamente l'errore di password errata
				$qry = "SELECT *
						FROM utenti
						WHERE username = '$username';";
				
				$ris = $conn->query($qry);
				
				if($ris)
				{	
					//il programma entrerà in quest'if, se ha trovato l'username.
					//Successivamente, il programma segnalerà l'errore di password errata
					if($ris->num_rows)
					{
						$_SESSION["errore"] = 2;
					}
				}
				
				else
				{	
					die("Errore query: " . $qry . "<br>" . $conn->error);
				}
				
				header("location: accedi.php");
			}
		}
		
		else
		{	
			die("Errore query: " . $qry . "<br>" . $conn->error);
		}
		
		$conn->close();
	}
	
	else
	{	
		header("location: accedi.php");
	}
?>
<?php
	if(isset($_POST["sigla"]))
	{
		include "../connessione_DB.php";
		
		if($_POST["sigla"] != "")
		{
			$qry = "SELECT id_comune, nome
					FROM comuni
					WHERE fk_sigla = '".$_POST["sigla"]."';";
				   
			$ris = $conn->query($qry);
			
			if($ris)
			{
				while($riga = $ris->fetch_row())
				{
					$comuni .= "<option class='comune' value='$riga[0]'>$riga[1]</option>";
				}
				
				echo $comuni;
			}
			
			else
			{
				die("Errore query: " . $qry . "<br>" . $conn->error);
			}
		}
		
		else
		{
			echo "nessunaProvincia";
		}
	}
	
	else
	{
		header("location: ../homepage.php");
	}
?>
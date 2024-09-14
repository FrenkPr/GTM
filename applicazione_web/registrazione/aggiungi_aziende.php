<?php
	if(isset($_POST["ruolo"]))
	{
		include "../connessione_DB.php";
		
		if($_POST["ruolo"] != "")
		{
			if($_POST["ruolo"] == "Corriere HUB" || $_POST["ruolo"] == "Magazziniere HUB")
			{
				$_POST["ruolo"] = "HUB";
			}
			
			$qry = "SELECT id_azienda, aziende.nome
					FROM aziende
					WHERE ruolo = '".$_POST["ruolo"]."';";
				   
			$ris = $conn->query($qry);
			
			if($ris)
			{
				$aziende = "";
				
				while($riga = $ris->fetch_row())
				{
					$aziende .= "<option class='azienda' value='$riga[0]'>$riga[1]</option>";
				}
				
				echo $aziende;
			}
			
			else
			{
				die("Errore query: " . $qry . "<br>" . $conn->error);
			}
		}
		
		else
		{
			echo "nessunRuolo";
		}
	}
	
	else
	{
		header("location: ../homepage.php");
	}
?>
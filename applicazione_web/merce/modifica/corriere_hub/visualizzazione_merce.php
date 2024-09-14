<?php
	session_start();
	
	if(!isset($_SESSION["username"]))
	{
		header("location: ../../../homepage.php");
	}
	
	if($_SESSION["ruolo"] != "Corriere HUB")
	{
		header("location: ../../../homepage.php");
	}
?>
<!DOCTYPE html>
<html lang = "it" >
	<head>
		<title>GTM.it</title>
		<meta charset="UTF-8" />
		<meta name="keywords" content="Trasporto merci, Trasporto, Consegna" />
		<meta name="description" content="Sito web che gestisce le consegne da effettuare a esercizi commerciali." />
		<meta name="author" content="Francesco Mochi" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="../../../stile.css" rel="stylesheet" type="text/css" />
		<link href="../../../immagini/mezzo.png" rel="shortcut icon" />
		
		<script src="https://kit.fontawesome.com/af5365d2d5.js"></script>
		<script>
			
			// Setta l'altezza del sottomenu a 200px o 0px
			var flag = 0;
			
			// Setta la larghezza della navigazione laterale e il margine sinistro del contenuto della pagina a 300px
			function apriBarra()
			{
				document.getElementById("myBarraLaterale").style.width = "550px";
				document.getElementById("main").style.marginLeft = "300px";
				
				document.getElementById("aperturaMenu").removeAttribute("class");
			}

			// Setta la larghezza della navigazione laterale, il margine sinistro del contenuto della pagina e l'altezza del sottomenu a 0px
			function chiudiBarra()
			{
				document.getElementById("myBarraLaterale").style.width = "0px";
				document.getElementById("main").style.marginLeft = "0px";
				
				if(document.getElementById("mySottomenu") != null)
				{
					document.getElementById("mySottomenu").style.height = "0px";
				}
				
				document.getElementById("aperturaMenu").setAttribute("class", "fas fa-shipping-fast");
				flag = 0;
			}
			
			function sottomenu()
			{
				if(flag == 0)
				{
					document.getElementById("mySottomenu").style.height = "90px";
					document.getElementById("mySottomenu").style.width = "300px";
					flag = 1;
				}
				
				else
				{
					document.getElementById("mySottomenu").style.height = "0px";
					flag = 0;
				}
			}
			
			function datiModificati()
			{
				<?php
					if(isset($_SESSION["dati_modificati"]))
					{
						$_SESSION["refreshato"] = 1;
						header("Refresh:0");
						unset($_SESSION["dati_modificati"]);
					}
					
					else if(isset($_SESSION["refreshato"]))
					{
						echo "alert('I dati sono stati modificati con successo');";
						unset($_SESSION["refreshato"]);
					}
				?>
			}
		</script>
	</head>
	
	<body onload="datiModificati()">
		
		<!-- Barra di navigazione -->
		<div id="myBarraLaterale" class="barraLaterale" >
			<a href="javascript:void(0)" class="chiusuraBarra" onclick="chiudiBarra()" >&times;</a>
			<?php
				echo "<a href='javascript:void(0)' onclick='sottomenu()' ><i class='fas fa-user' ></i> " . $_SESSION["username"] ."</a>
					  <div id='mySottomenu' class='sottomenu' >
					  	  <a href='../../../accesso/logout.php' ><i class='fas fa-sign-out-alt' ></i> Esci</a>
					  	  <a href='../../../profilo/modifica_dati/index_modifica.php' >Modifica dati personali <i class='far fa-clipboard'></i></a>
					  </div>
					  
					  <a href='visualizzazione_merce.php' >Visualizza/modifica consegne <i class='far fa-clipboard'></i></a>";
			?>
			<a href="../../../info_sito/contatti.php" >Contatti <i class="far fa-address-book" ></i></a>
			<a href="../../../info_sito/chi_siamo.php" >Chi siamo <i class="fas fa-question" ></i></a>
		</div>
		
	
		<div class="barra" id="main">
			<a href="javascript:void(0)" ><i id="aperturaMenu" class="fas fa-shipping-fast" onclick="apriBarra()" ></i></a>
			<a href="../../../homepage.php" style="width: 8%; margin-left: 42%;" >GTM.it</a>
		</div>
		<!-- Fine barra di navigazione -->
		
		<br><br><br><br><br><br><br>
		<div id='listaConsegne'>
			<br><h1>Visualizzazione consegne</h1>
			
			<?php
				include "../../../connessione_DB.php";
				
				$qry = "SELECT merce.*, aziende.nome
						FROM merce
						JOIN aziende ON id_azienda = fk_destinatario
						WHERE fk_username_corriere = '" . $_SESSION["username"] . "';";
				
				$qry2 = "SELECT aziende.nome, anagrafica.telefono
						 FROM aziende
						 JOIN utenti ON id_azienda = fk_id_azienda
						 JOIN anagrafica ON cod_fiscale = fk_cod_fiscale
						 JOIN merce ON username = fk_merce_inserita_da;";
				
				$ris2 = $conn->query($qry2);
				
				if(!$ris2)
				{
					die("Errore: " . $qry . "<br>" . $conn->error);
				}
				
				$ris = $conn->query($qry);
				
				if($ris)
				{
					if($ris->num_rows)
					{
						while($riga = $ris->fetch_row())
						{
							$riga2 = $ris2->fetch_row();
							
							if($riga[5] == '')
							{
								$riga[5] = 'Valore non inserito';
							}
							
							if($riga[6] == '')
							{
								$riga[6] = 'Valore non inserito';
							}
							
							if($riga[7] == '')
							{
								$riga[7] = 'Valore non inserito';
							}
							
							if($riga[8] == '')
							{
								$riga[8] = 'Valore non inserito';
							}
							
							if($riga[14] == '')
							{
								$riga[14] = 'Valore non inserito';
							}
							
							$data_hub_italiana = explode('-', $riga[11]);
							
							if($riga[12] == '')
							{
								$data_es_comm = 'Valore non inserito';
							}
							
							else
							{
								$data_es_comm_italiana = explode('-', $riga[12]);
								$data_es_comm = $data_es_comm_italiana[2] . '/' . $data_es_comm_italiana[1] . '/' . $data_es_comm_italiana[0];
							}
								
							
							echo "<form action='index_modifica.php' method='post'>
									  <label>ID merce</label>
									  <input value='$riga[0]' disabled>
									  <input type='hidden' value='$riga[0]' name='id_merce' ><br><br>
									  
									  <label>Nome merce</label>
									  <input value='$riga[1]' disabled>
									  <input type='hidden' value='$riga[1]' name='nome' ><br><br>
									  
									  <label>Tipo di merce</label>
									  <input value='$riga[2]' disabled>
									  <input type='hidden' value='$riga[2]' name='tipo' ><br><br>
									  
									  <label>Quantità di merce</label>
									  <input value='$riga[3]' disabled>
									  <input type='hidden' value='$riga[3]' name='qta' ><br><br>
									  
									  <label>Numero colli merce</label>
									  <input value='$riga[4]' disabled>
									  <input type='hidden' value='$riga[4]' name='num_colli' ><br><br>
									  
									  <label>Lunghezza di un collo</label>
									  <input value='$riga[5]' disabled>
									  <input type='hidden' value='$riga[5]' name='lunghezza_collo' ><br><br>
									  
									  <label>Larghezza di un collo</label>
									  <input value='$riga[6]' disabled>
									  <input type='hidden' value='$riga[6]' name='larghezza_collo' ><br><br>
									  
									  <label>Altezza di un collo</label>
									  <input value='$riga[7]' disabled>
									  <input type='hidden' value='$riga[7]' name='altezza_collo' ><br><br>
									  
									  <label>Peso di un collo</label>
									  <input value='$riga[8]' disabled>
									  <input type='hidden' value='$riga[8]' name='peso_collo' ><br><br>
									  
									  <label>Numero ordine</label>
									  <input value='$riga[9]' disabled>
									  <input type='hidden' value='$riga[9]' name='num_ordine' ><br><br>
									  
									  <label>Data di consegna all'HUB</label>
									  <input value='$data_hub_italiana[2]/$data_hub_italiana[1]/$data_hub_italiana[0]' disabled>
									  <input type='hidden' value='$riga[11]' name='consegna_hub' ><br><br>
									  
									  <label>Data di consegna all'esercizio commerciale</label>
									  <input value='$data_es_comm' disabled>
									  <input type='hidden' value='$data_es_comm' name='consegna_es_comm' ><br><br>
									  
									  <label>Stato</label>
									  <input value='$riga[13]' disabled>
									  <input type='hidden' value='$riga[13]' name='stato' ><br><br>
									  
									  <label>Note stato</label>
									  <input value='$riga[14]' disabled>
									  <input type='hidden' value='$riga[14]' name='note_stato' ><br><br>
									  
									  <label>Merce inserita dall'azienda</label>
									  <input value='$riga2[0]' disabled>
									  <input type='hidden' value='$riga2[0]' name='nome_azienda_merce_inserita' ><br><br>
									  
									  <label>Esercizio commerciale (destinatario)</label>
									  <input value='$riga[19]' disabled>
									  <input type='hidden' value='$riga[19]' name='es_comm' ><br><br>
									  
									  <label>Targa</label>
									  <input value='$riga[18]' disabled>
									  <input type='hidden' value='$riga[18]' name='targa' ><br><br>
									  
									  <input type='submit' name='modifica' value='Modifica'><br><br><br>
								  </form>";
						}
					}
					
					else
					{
						echo "<p>Non è stata inserita ancora alcuna consegna</p>";
					}
				}
				
				else
				{
					die("Errore: " . $qry . "<br>" . $conn->error);
				}
			?>
		</div>
	</body>
</html>
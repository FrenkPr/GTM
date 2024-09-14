<?php
	session_start();
	
	if(!isset($_SESSION["username"]))
	{
		header("location: ../../homepage.php");
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
		<link href="../../stile.css" rel="stylesheet" type="text/css" />
		<link href="../../immagini/mezzo.png" rel="shortcut icon" />
		
		<script src="https://kit.fontawesome.com/af5365d2d5.js"></script>
		<script src="controllo_dati.js"></script>
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
			
			function merceInserita()
			{
				<?php
					if(isset($_SESSION["merce_inserita"]))
					{
						unset($_SESSION["merce_inserita"]);
					}
				?>
			}
		</script>
	</head>
	
	<body onload="merceInserita()">
		
		<!-- Barra di navigazione -->
		<div id="myBarraLaterale" class="barraLaterale" >
			<a href="javascript:void(0)" class="chiusuraBarra" onclick="chiudiBarra()" >&times;</a>
			<?php
				echo "<a href='javascript:void(0)' onclick='sottomenu()' ><i class='fas fa-user-cog'></i> " . $_SESSION["username"] ."</a>
					  <div id='mySottomenu' class='sottomenu' >
					  	  <a href='../../accesso/logout.php' ><i class='fas fa-sign-out-alt' ></i> Esci</a>
					  	  <a href='../../profilo/modifica_dati/index_modifica.php' >Modifica dati personali <i class='far fa-clipboard'></i></a>
					  </div>
					  
					  <a href='index_inserimento.php' >Inserisci una consegna <i class='fas fa-dolly-flatbed'></i></a>
					  <a href='../modifica/fornitore/visualizzazione_merce.php' >Visualizza/modifica/cancella le mie consegne <i class='far fa-clipboard'></i></a>";
			?>
			<a href="../../info_sito/contatti.php" >Contatti <i class="far fa-address-book" ></i></a>
			<a href="../../info_sito/chisiamo.php" >Chi siamo <i class="fas fa-question" ></i></a>
		</div>
		
	
		<div class="barra" id="main">
			<a href="javascript:void(0)" ><i id="aperturaMenu" class="fas fa-shipping-fast" onclick="apriBarra()" ></i></a>
			<a href="../../homepage.php" style="width: 8%; margin-left: 42%;" >GTM.it</a>
		</div>
		<!-- Fine barra di navigazione -->
		
		<br><br><br><br><br><br><br>
		<div id='consegna'>
			<br><h1>Inserimento dati per la merce da consegnare</h1>
			<p>I campi contrassegnati da * sono obbligatori</p><br>
			
			<form action='inserimento.php' method='post'>
				<label>Nome della merce*</label>
				<input id='nome' name='nome'>
				<label style='color:red' id='errNome'></label><br><br>
				
				<label>Tipo di merce*</label>
				<input id='tipo' name='tipo'>
				<label style='color:red' id='errTipo'></label><br><br>
				
				<label>Quantità di merce*</label>
				<input id='qta' name='qta'>
				<label style='color:red' id='errQta'></label><br><br>
				
				<label>Numero di colli*</label>
				<input id='numColli' name='numColli'>
				<label style='color:red' id='errNumColli'></label><br><br>
				
				<label>Lunghezza di un collo</label>
				<input id='lunghezzaCollo' name='lunghezzaCollo'>
				<label style='color:red' id='errLunghezzaCollo'></label><br><br>
				
				<label>Larghezza di un collo</label>
				<input id='larghezzaCollo' name='larghezzaCollo'>
				<label style='color:red' id='errLarghezzaCollo'></label><br><br>
				
				<label>Altezza di un collo</label>
				<input id='altezzaCollo' name='altezzaCollo'>
				<label style='color:red' id='errAltezzaCollo'></label><br><br>
				
				<label>Peso di un collo</label>
				<input id='pesoCollo' name='pesoCollo'>
				<label style='color:red' id='errPesoCollo'></label><br><br>
				
				<label>Numero ordine*</label>
				<input id='numOrdine' name='numOrdine'>
				<label style='color:red' id='errNumOrdine'></label><br><br>
				
				<label>Data di consegna all'HUB*</label>
				<input type='date' id='consegnaHub' name='consegnaHub'>
				<label style='color:red' id='errConsegnaHub'></label><br><br>
				
				<label>Stato della merce*</label>
				<input name='stato' value="Da consegnare in HUB" disabled><br><br>
				
				<label>Destinatario*</label>
				<select id='destinatario' name='id_destinatario'>
					<option value="">Selezionare l'azienda dell'esercizio commerciale</option>
					
					<?php
						include "../../connessione_DB.php";
						
						$qry = "SELECT id_azienda, nome
								FROM aziende
								WHERE ruolo = 'Esercizio commerciale'";
						
						$ris = $conn->query($qry);
						
						if($ris)
						{
							while($riga = $ris->fetch_row())
							{
								echo "<option value='$riga[0]'>$riga[1]</option>";
							}
						}
						
						else
						{
							die("Errore: " . $qry . "<br>" . $conn->error);
						}
					?>
				</select>
				<label style='color:red' id='errDestinatario'></label><br><br>
				
				<input type='submit' onclick='return controlli()' name='inserisci_merce' value='Inserisci merce'><br><br><br>
			</form>
		</div>
		
	</body>
</html>
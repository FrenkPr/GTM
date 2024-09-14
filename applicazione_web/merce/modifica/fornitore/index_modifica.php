<?php
	session_start();
	
	if(!isset($_SESSION["username"]))
	{
		header("location: ../../../homepage.php");
	}
	
	if($_SESSION["ruolo"] != "Fornitore")
	{
		header("location: ../../../homepage.php");
	}
	
	if(isset($_POST["cancella"]))
	{
		$_SESSION["id_merce"] = $_POST["id_merce"];
		$_SESSION["cancella"] = 1;
		header("location: cancella.php");
	}
	
	else if(!isset($_POST["modifica"]))
	{
		header("location: visualizzazione_merce.php");
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
		</script>
	</head>
	
	<body>
		
		<!-- Barra di navigazione -->
		<div id="myBarraLaterale" class="barraLaterale" >
			<a href="javascript:void(0)" class="chiusuraBarra" onclick="chiudiBarra()" >&times;</a>
			<?php
				echo "<a href='javascript:void(0)' onclick='sottomenu()' ><i class='fas fa-user-cog'></i> " . $_SESSION["username"] ."</a>
					  <div id='mySottomenu' class='sottomenu' >
					  	  <a href='../../../accesso/logout.php' ><i class='fas fa-sign-out-alt' ></i> Esci</a>
					  	  <a href='../../../profilo/modifica_dati/index_modifica.php' >Modifica dati personali <i class='far fa-clipboard'></i></a>
					  </div>
					  
					  <a href='../../inserimento/index_inserimento.php' >Inserisci una consegna <i class='fas fa-dolly-flatbed'></i></a>
					  <a href='visualizzazione_merce.php' >Visualizza/modifica/cancella le mie consegne <i class='far fa-clipboard'></i></a>";
			?>
			<a href="../../../info_sito/contatti.php" >Contatti <i class="far fa-address-book" ></i></a>
			<a href="../../../info_sito/chisiamo.php" >Chi siamo <i class="fas fa-question" ></i></a>
		</div>
		
	
		<div class="barra" id="main">
			<a href="javascript:void(0)" ><i id="aperturaMenu" class="fas fa-shipping-fast" onclick="apriBarra()" ></i></a>
			<a href="../../../homepage.php" style="width: 8%; margin-left: 42%;" >GTM.it</a>
		</div>
		<!-- Fine barra di navigazione -->
		
		<br><br><br><br><br><br><br>
		<div id='consegna'>
			<br><h1>Modifica consegna</h1>
			
			<?php
				$data_italiana = explode('-', $_POST["consegna_hub"]);
				
				echo "<form action='modifica.php' method='post'>
						  <label>ID merce</label>
						  <input value='".$_POST["id_merce"]."' disabled>
						  <input type='hidden' value='".$_POST["id_merce"]."' name='id_merce'><br><br>
						  
						  <label>Nome merce</label>
						  <input value='".$_POST["nome"]."' disabled>
						  &nbsp;<input class='dati' placeholder='Modifica dato' id='nome' name='nome'>
						  <label id='errNome' style='color:red'></label><br><br>
						  
						  <label>Tipo di merce</label>
						  <input value='".$_POST["tipo"]."' disabled>
						  &nbsp;<input class='dati' placeholder='Modifica dato' id='tipo' name='tipo'>
						  <label id='errTipo' style='color:red'></label><br><br>
						  
						  <label>Quantità di merce</label>
						  <input value='".$_POST["qta"]."' disabled>
						  &nbsp;<input class='dati' placeholder='Modifica dato' id='qta' name='qta'>
						  <label id='errQta' style='color:red'></label><br><br>
						  
						  <label>Numero colli merce</label>
						  <input value='".$_POST["num_colli"]."' disabled>
						  &nbsp;<input class='dati' placeholder='Modifica dato' id='numColli' name='num_colli'>
						  <label id='errNumColli' style='color:red'></label><br><br>
						  
						  <label>Lunghezza di un collo</label>
						  <input value='".$_POST["lunghezza_collo"]."' disabled>
						  &nbsp;<input class='dati' placeholder='Modifica dato' id='lunghezzaCollo' name='lunghezza_collo'>
						  <label id='errLunghezzaCollo' style='color:red'></label><br><br>
						  
						  <label>Larghezza di un collo</label>
						  <input value='".$_POST["larghezza_collo"]."' disabled>
						  &nbsp;<input class='dati' placeholder='Modifica dato' id='larghezzaCollo' name='larghezza_collo'>
						  <label id='errLarghezzaCollo' style='color:red'></label><br><br>
						  
						  <label>Altezza di un collo</label>
						  <input value='".$_POST["altezza_collo"]."' disabled>
						  &nbsp;<input class='dati' placeholder='Modifica dato' id='altezzaCollo' name='altezza_collo'>
						  <label id='errAltezzaCollo' style='color:red'></label><br><br>
						  
						  <label>Peso di un collo</label>
						  <input value='".$_POST["peso_collo"]."' disabled>
						  &nbsp;<input class='dati' placeholder='Modifica dato' id='pesoCollo' name='peso_collo'>
						  <label id='errPesoCollo' style='color:red'></label><br><br>
						  
						  <label>Numero ordine</label>
						  <input value='".$_POST["num_ordine"]."' disabled>
						  &nbsp;<input class='dati' placeholder='Modifica dato' id='numOrdine' name='num_ordine'>
						  <label id='errNumOrdine' style='color:red'></label><br><br>
						  
						  <label>Data di consegna all'HUB</label>
						  <input value='$data_italiana[2]/$data_italiana[1]/$data_italiana[0]' disabled>
						  &nbsp;<input type='date' class='dati' id='consegnaHub' name='consegna_hub'>
						  <label id='errConsegnaHub' style='color:red'></label><br><br>
						  
						  <label>Stato</label>
						  <input value='".$_POST["stato"]."' disabled><br><br>
						  
						  <label>Esercizio commerciale (destinatario)</label>
						  <input value='".$_POST["es_comm"]."' disabled>
						  &nbsp;
						  <select class='dati' name='id_es_comm'>
							  <option value=''>Modifica dato</option>";
						  
						  include "../../../connessione_DB.php";
						  
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
						  
						  echo "</select><br><br>
								
								<input type='submit' onclick='return controlli()' name='modifica' value='Modifica'><br><br>
								
								</form>";
			?>
		</div>
		
	</body>
</html>
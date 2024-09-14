<?php
	session_start();
	
	if(!isset($_SESSION["username"]))
	{
		header("location: ../../homepage.php");
	}
	
	if(isset($_POST["cancella"]))
	{
		$_SESSION["targa"] = $_POST["targa"];
		$_SESSION["cancella"] = 1;
		header("location: cancella.php");
	}
	
	else if(!isset($_POST["visualizza_mezzo"]))
	{
		header("location: visualizzazione_mezzi.php");
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
			
			function abilitaDisabilitaDescrizioneGuasto()
			{
				if(document.getElementById('mezzoGuasto').checked)
				{
					document.getElementById('descrizioneGuasto').disabled = false;
				}
				
				else
				{
					document.getElementById('descrizioneGuasto').disabled = true;
					document.getElementById('descrizioneGuasto').value = "";
				}
			}
		</script>
	</head>
	
	<body onload='abilitaDisabilitaDescrizioneGuasto()'>
		
		<!-- Barra di navigazione -->
		<div id="myBarraLaterale" class="barraLaterale" >
			<a href="javascript:void(0)" class="chiusuraBarra" onclick="chiudiBarra()" >&times;</a>
			<?php
				echo "<a href='javascript:void(0)' onclick='sottomenu()' ><i class='fas fa-user-cog'></i> " . $_SESSION["username"] ."</a>
					  <div id='mySottomenu' class='sottomenu' >
					  	  <a href='../../accesso/logout.php' ><i class='fas fa-sign-out-alt' ></i> Esci</a>
					  	  <a href='../../profilo/modifica_dati/index_modifica.php' >Modifica dati personali <i class='far fa-clipboard'></i></a>
					  </div>
					  
					  <a href='../../mezzi/inserimento/index_inserimento.php' >Inserisci un mezzo <i class='fas fa-shipping-fast'></i></a>
					  <a href='visualizzazione_mezzi.php' >Visualizza/modifica/cancella mezzi <i class='fas fa-shipping-fast'></i></a>
					  <a href='../../merce/modifica/amministratore/visualizzazione_merce.php' >Cancella consegne <i class='far fa-clipboard'></i></a>";
			?>
			<a href="../../info_sito/contatti.php" >Contatti <i class="far fa-address-book" ></i></a>
			<a href="../../info_sito/chi_siamo.php" >Chi siamo <i class="fas fa-question" ></i></a>
		</div>
		
	
		<div class="barra" id="main">
			<a href="javascript:void(0)" ><i id="aperturaMenu" class="fas fa-shipping-fast" onclick="apriBarra()" ></i></a>
			<a href="../../homepage.php" style="width: 8%; margin-left: 42%;" >GTM.it</a>
		</div>
		<!-- Fine barra di navigazione -->
		
		<br><br><br><br><br><br><br>
		<div id='consegna'>
			<br><h1>Modifica mezzo</h1>
			
			<?php
				echo "<form action='modifica.php' method='post'>
						  <label>Targa</label>
						  <input value='" . $_POST["targa"] . "' disabled>
						  <input type='hidden' name ='targa' value='" . $_POST["targa"] . "'>
						  <input class='dati' placeholder='Modifica dato' onkeyup='targaUpperCase()' maxlength='7' id='targa' name='targa_modificata'>
						  <label style='color:red' id='errTarga'></label><br><br>
						  
						  <label>Volume</label>
						  <input value='" . $_POST["volume"] . "' disabled>
						  <input class='dati' placeholder='Modifica dato' id='volume' name='volume'>
						  <label style='color:red' id='errVolume'></label><br><br>
						  
						  <label>Autonomia</label>
						  <input value='" . $_POST["autonomia"] . "' disabled>
						  <input class='dati' placeholder='Modifica dato' maxlength='3' id='autonomia' name='autonomia'>
						  <label style='color:red' id='errAutonomia'></label><br><br>
						  
						  <label>Lunghezza</label>
						  <input value='" . $_POST["lunghezza"] . "' disabled>
						  <input class='dati' placeholder='Modifica dato' id='lunghezza' name='lunghezza'>
						  <label style='color:red' id='errLunghezza'></label><br><br>
						  
						  <label>Larghezza</label>
						  <input value='" . $_POST["larghezza"] . "' disabled>
						  <input class='dati' placeholder='Modifica dato' id='larghezza' name='larghezza'>
						  <label style='color:red' id='errLarghezza'></label><br><br>
						  
						  <label>Altezza</label>
						  <input value='" . $_POST["altezza"] . "' disabled>
						  <input class='dati' placeholder='Modifica dato' id='altezza' name='altezza'>
						  <label style='color:red' id='errAltezza'></label><br><br>
						  
						  <label>Peso</label>
						  <input value='" . $_POST["peso"] . "' disabled>
						  <input class='dati' placeholder='Modifica dato' id='peso' name='peso'>
						  <label style='color:red' id='errPeso'></label><br><br>
						  
						  <label>Mezzo frigorifero</label>
						  <input type='checkbox' id='mezzoFrigorifero' name='mezzoFrigorifero'>
						  <label style='color:red' id='errMezzoFrigoriferoEFreezer'></label><br><br>
						  
						  <label>Mezzo freezer</label>
						  <input type='checkbox' id='mezzoFreezer' name='mezzoFreezer'><br><br>
						  
						  <label>Mezzo guasto</label>
						  <input type='checkbox' onclick='abilitaDisabilitaDescrizioneGuasto()' id='mezzoGuasto' name='mezzoGuasto'><br><br>
						  
						  <label>Descrizione guasto</label>
						  <input value='" . $_POST["descrizioneGuasto"] . "' disabled>
						  <input class='dati' placeholder='Modifica dato' id='descrizioneGuasto' name='descrizioneGuasto' maxlength='200'>
						  <label style='color:red' id='errDescrizioneGuasto'></label><br><br>
						  
						  <input type='submit' onclick='return controlli()' name='modifica' value='Modifica'><br><br>	
					  </form>
					  
					  <script>";
					  
					  if($_POST["mezzoFrigorifero"] == '1')
					  {
						  echo "document.getElementById('mezzoFrigorifero').checked = true;";
					  }
					  
					  if($_POST["mezzoFreezer"] == '1')
					  {
						  echo "document.getElementById('mezzoFreezer').checked = true;";
					  }
					  
					  if($_POST["mezzoGuasto"] == '1')
					  {
						  echo "document.getElementById('mezzoGuasto').checked = true;";
					  }
					  
					  echo "</script>";
			?>
		</div>
		
	</body>
</html>
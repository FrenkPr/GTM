<?php
	session_start();
	
	if(!isset($_SESSION["username"]))
	{
		header("location: ../../homepage.php");
	}
	
	if($_SESSION["ruolo"] != "Amministratore")
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
			
			function mezzoInserito()
			{
				<?php
					if(isset($_SESSION["mezzo_inserito"]))
					{
						unset($_SESSION["mezzo_inserito"]);
					}
					
					if(isset($_SESSION["errTarga"]))
					{
						echo "document.getElementById('errTarga').innerHTML = 'La targa inserita già esiste';";
						unset($_SESSION["errTarga"]);
					}
				?>
			}
		</script>
	</head>
	
	<body onload="mezzoInserito()">
		
		<!-- Barra di navigazione -->
		<div id="myBarraLaterale" class="barraLaterale" >
			<a href="javascript:void(0)" class="chiusuraBarra" onclick="chiudiBarra()" >&times;</a>
			<?php
				echo "<a href='javascript:void(0)' onclick='sottomenu()' ><i class='fas fa-user-cog'></i> " . $_SESSION["username"] ."</a>
					  <div id='mySottomenu' class='sottomenu' >
					  	  <a href='../../accesso/logout.php' ><i class='fas fa-sign-out-alt' ></i> Esci</a>
					  	  <a href='../../profilo/modifica_dati/index_modifica.php' >Modifica dati personali <i class='far fa-clipboard'></i></a>
					  </div>
					  
					  <a href='index_inserimento.php' >Inserisci un mezzo <i class='fas fa-shipping-fast'></i></a>
					  <a href='../../mezzi/modifica/visualizzazione_mezzi.php' >Visualizza/modifica/cancella mezzi <i class='fas fa-shipping-fast'></i></a>
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
			<br><h1>Inserimento dati di un mezzo</h1>
			<p>I campi contrassegnati da * sono obbligatori</p><br>
			
			<form action='inserimento.php' method='post'>
				<label>Targa*</label>
				<input id='targa' name='targa' maxlength='7' onkeypress='targaUpperCase()' onkeyup='targaUpperCase()'>
				<label style='color:red' id='errTarga'></label><br><br>
				
				<label>Volume*</label>
				<input id='volume' name='volume'>
				<label style='color:red' id='errVolume'></label><br><br>
				
				<label>Autonomia*</label>
				<input id='autonomia' name='autonomia'>
				<label style='color:red' id='errAutonomia'></label><br><br>
				
				<label>Lunghezza*</label>
				<input id='lunghezza' name='lunghezza'>
				<label style='color:red' id='errLunghezza'></label><br><br>
				
				<label>Larghezza*</label>
				<input id='larghezza' name='larghezza'>
				<label style='color:red' id='errLarghezza'></label><br><br>
				
				<label>Altezza*</label>
				<input id='altezza' name='altezza'>
				<label style='color:red' id='errAltezza'></label><br><br>
				
				<label>Peso*</label>
				<input id='peso' name='peso'>
				<label style='color:red' id='errPeso'></label><br><br>
				
				<label>Mezzo frigorifero</label>
				<input type="checkbox" id='mezzoFrigorifero' name='mezzoFrigorifero'>
				<label style='color:red' id='errMezzoFrigoriferoEFreezer'></label><br><br>
				
				<label>Mezzo freezer</label>
				<input type="checkbox" id='mezzoFreezer' name='mezzoFreezer'><br><br>
				
				<input type='submit' onclick='return controlli()' name='inserisci_mezzo' value='Inserisci merce'><br><br><br>
			</form>
		</div>
	</body>
</html>
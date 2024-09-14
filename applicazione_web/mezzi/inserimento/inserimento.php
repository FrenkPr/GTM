<?php
	session_start();
	
	if(!isset($_SESSION["username"]))
	{
		header("location: ../../homepage.php");
	}
	
	if(!isset($_POST["inserisci_mezzo"]))
	{
		header("location: index_inserimento.php");
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
		<?php
			include "../../connessione_DB.php";
			
			if(!isset($_SESSION["mezzo_inserito"]))
			{
				$qry = "SELECT targa
						FROM mezzi
						WHERE targa = '" . $_POST["targa"] . "';";
				
				$ris = $conn->query($qry);
				
				if($ris)
				{
					if($ris->num_rows)
					{
						$_SESSION["errTarga"] = 1;
						header("location: index_inserimento.php");
					}
				}
				
				else
				{
					die("Errore: " . $qry . "<br>" . $conn->error);
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
				
				$query = "INSERT INTO mezzi VALUES
						  (
							  '" . $_POST["targa"] . "',
							  '" . $_POST["volume"] . "',
							  '" . $_POST["autonomia"] . "',
							  '" . $_POST["lunghezza"] . "',
							  '" . $_POST["larghezza"] . "',
							  '" . $_POST["altezza"] . "',
							  '" . $_POST["peso"] . "',
							  '" . $_POST["mezzoFrigorifero"] . "',
							  '" . $_POST["mezzoFreezer"] . "',
							  '0',
							  NULL
						  );";
				
				if(!$conn->query($query))
				{
					die("Errore: " . $query . "<br>" . $conn->error);
				}
				
				$_SESSION["mezzo_inserito"] = 1;
			}
		?>
		
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
		
		<div class="box">
			<h1 style="margin-top: 170px;">Mezzo inserito con successo</h1>
		</div>
	</body>
</html>
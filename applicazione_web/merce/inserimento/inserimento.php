<?php
	session_start();
	
	if(!isset($_POST["inserisci_merce"]))
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
			
			if(!isset($_SESSION["merce_inserita"]))
			{
				$_POST["stato"] = "Da consegnare in HUB";
				
				$query = "INSERT INTO merce VALUES
						  (
						  	  NULL,
						  	  '".$_POST["nome"]."',
						  	  '".$_POST["tipo"]."',
						  	  '".$_POST["qta"]."',
						  	  '".$_POST["numColli"]."',
						  	  '".$_POST["lunghezzaCollo"]."',
						  	  '".$_POST["larghezzaCollo"]."',
						  	  '".$_POST["altezzaCollo"]."',
						  	  '".$_POST["pesoCollo"]."',
						  	  '".$_POST["numOrdine"]."',
						  	  NULL,
						  	  '".$_POST["consegnaHub"]."',
						  	  NULL,
						  	  '".$_POST["stato"]."',
						  	  NULL,
						  	  '".$_SESSION["username"]."',
						  	  NULL,
						  	  '".$_POST["id_destinatario"]."',
						  	  NULL
						  );";
				
				$id_merce = $conn->insert_id;
				
				if($_POST["lunghezzaCollo"] == "")
				{
					$query .= "UPDATE merce
							  SET lunghezza_collo = NULL
							  WHERE id_merce = '$id_merce';";
				}
				
				if($_POST["larghezzaCollo"] == "")
				{
					$query .= "UPDATE merce
							   SET larghezza_collo = NULL
							   WHERE id_merce = '$id_merce';";
				}
				
				if($_POST["altezzaCollo"] == "")
				{
					$query .= "UPDATE merce
							   SET altezza_collo = NULL
							   WHERE id_merce = '$id_merce';";
				}
				
				if($_POST["pesoCollo"] == "")
				{
					$query .= "UPDATE merce
							   SET peso_collo = NULL
							   WHERE id_merce = '$id_merce';";
				}
				
				if(!$conn->multi_query($query))
				{
					die("Errore: " . $query . "<br>" . $conn->error);
				}
				
				$_SESSION["merce_inserita"] = 1;
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
		
		<div class="box">
			<h1 style="margin-top: 170px;">Merce aggiunta con successo</h1>
		</div>
	</body>
</html>
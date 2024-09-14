<?php
	session_start();
	
	if(!isset($_POST["registrati"]))
	{
		header("location: registrati.php");
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
		<link href="../stile.css" rel="stylesheet" type="text/css" />
		<link href="../immagini/mezzo.png" rel="shortcut icon" />
		
		<script src="https://kit.fontawesome.com/af5365d2d5.js" crossorigin="anonymous"></script>
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
			//connessione al database
			include "../connessione_DB.php";
			
			if(!isset($_SESSION["registrato"]))
			{
				$query = "SELECT username, email, fk_cod_fiscale
						  FROM utenti
						  WHERE username = '" . $conn->real_escape_string($_POST["username"]) . "'
						  OR email = '" . $_POST["email"] . "'
						  OR fk_cod_fiscale = '" . $_POST["codFiscale"] . "';";
				
				$ris = $conn->query($query);
				
				//controlla se lo username, l'email o il codice fiscale sono già presenti nel DB
				if($ris)
				{
					if($ris->num_rows)
					{
						$riga = $ris->fetch_assoc();
						
						$errore = 1;
						
						if($riga["username"] == $conn->real_escape_string($_POST["username"]))
						{
							$_SESSION["errUsername"] = 1;
						}
						
						if($riga["email"] == $_POST["email"])
						{
							$_SESSION["errEmail"] = 1;
						}
						
						if($riga["fk_cod_fiscale"] == $_POST["codFiscale"])
						{
							$_SESSION["errCodFiscale"] = 1;
						}
						
						header("location: registrati.php");
					}
				}
				
				else
				{
					
					die("Errore: " . $query . "<br>" . $conn->error);
				}
				//fine controlla se lo username, l'email o il codice fiscale sono già presenti nel DB
				
				//se lo username, l'email e il codice fiscale non sono già presenti nel DB
				if(!isset($errore))
				{
					$_SESSION["username"] = $_POST["username"];
					$_SESSION["ruolo"] = $_POST["ruolo"];
					$_SESSION["id_azienda"] = $_POST["id_azienda"];
					
					$query = "INSERT INTO anagrafica VALUES 
							  (
							  	  '".$_POST["codFiscale"]."',
							  	  '".$_POST["nome"]."',
							  	  '".$_POST["cognome"]."',
							  	  '".$_POST["indirizzo"]."',
							  	  '".$_POST["civico"]."',
							  	  '".$_POST["cap"]."',
							  	  '".$_POST["telefono"]."',
							  	  '".$_POST["id_comune"]."'
							  );";
					
					if(!$conn->query($query))
					{
						die("Errore: " . $query . "<br>" . $conn->error);
					}
					
					$query = "INSERT INTO utenti VALUES
							  (
							  	  '".$_POST["username"]."',
							  	  '".$_POST["email"]."',
							  	  '".md5($_POST["password"])."',
							  	  '".$_POST["ruolo"]."',
							  	  '".$_POST["codFiscale"]."',
							  	  '".$_POST["id_azienda"]."'
							  );";
					
					if(!$conn->query($query))
					{
						die("Errore: " . $query . "<br>" . $conn->error);
					}
					
					$_SESSION["registrato"] = 1;
				}
			}
		?>
		
		<!-- Barra di navigazione -->
		<div id="myBarraLaterale" class="barraLaterale" >
			<a href="javascript:void(0)" class="chiusuraBarra" onclick="chiudiBarra()" >&times;</a>
			<?php
				if(isset($_SESSION["username"]))
				{
					echo "<a href='javascript:void(0)' onclick='sottomenu()' ><i id='icona_user' class='fas fa-user'></i> " . $_SESSION["username"] ."</a>
						  <div id='mySottomenu' class='sottomenu' >
						  	  <a href='../accesso/logout.php' ><i class='fas fa-sign-out-alt' ></i> Esci</a>
						  	  <a href='../profilo/modifica_dati/index_modifica.php' >Modifica dati personali <i class='far fa-clipboard'></i></a>
						  </div>";
					
					if($_SESSION["ruolo"] == "Amministratore")
					{
						echo "<script>document.getElementById('icona_user').className = 'fas fa-user-cog';</script>
							  <a href='../mezzi/inserimento/index_inserimento.php' >Inserisci un mezzo <i class='fas fa-shipping-fast'></i></a>
							  <a href='../mezzi/modifica/visualizzazione_mezzi.php' >Visualizza/modifica/cancella mezzi <i class='fas fa-shipping-fast'></i></a>
							  <a href='../merce/modifica/amministratore/visualizzazione_merce.php' >Cancella consegne <i class='far fa-clipboard'></i></a>";
					}
					
					else if($_SESSION["ruolo"] == "Fornitore")
					{
						echo "<a href='../merce/inserimento/index_inserimento.php' >Inserisci una consegna <i class='fas fa-dolly-flatbed'></i></a>
							  <a href='../merce/modifica/fornitore/visualizzazione_merce.php' >Visualizza/modifica/cancella le mie consegne <i class='far fa-clipboard'></i></a>";
					}
					
					else if($_SESSION["ruolo"] == "Magazziniere HUB")
					{
						echo "<a href='../merce/modifica/magazziniere_hub/visualizzazione_merce.php' >Visualizza/modifica consegne <i class='far fa-clipboard'></i></a>";
					}
					
					else if($_SESSION["ruolo"] == "Corriere HUB")
					{
						echo "<a href='../merce/modifica/corriere_hub/visualizzazione_merce.php' >Visualizza/modifica consegne <i class='far fa-clipboard'></i></a>";
					}
					
					else if($_SESSION["ruolo"] == "Esercizio commerciale")
					{
						echo "<a href='../merce/modifica/esercizio_commerciale/visualizzazione_merce.php' >Visualizza consegne <i class='far fa-clipboard'></i></a>";
					}
				}
				
				else
				{
					echo "<a href='../accesso/accedi.php' ><i class='fas fa-users' ></i> Accedi</a>";
				}
			?>
			<a href="../info_sito/contatti.php" >Contatti <i class="far fa-address-book" ></i></a>
			<a href="../info_sito/chi_siamo.php" >Chi siamo <i class="fas fa-question" ></i></a>
		</div>
		
	
		<div class="barra" id="main">
			<a href="javascript:void(0)" ><i id="aperturaMenu" class="fas fa-shipping-fast" onclick="apriBarra()" ></i></a>
			<a href="../homepage.php" style="width: 8%; margin-left: 42%;" >GTM.it</a>
		</div>
		<!-- Fine barra di navigazione -->
		
		<div class="box">
			<br><br><br><h1 style="margin-top: 120px;">Registrato con successo</h1>
		</div>
	</body>
</html>
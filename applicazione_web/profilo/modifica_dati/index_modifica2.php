<?php
	session_start();
	
	if(!isset($_SESSION["username"]))
	{
		header("location: ../homepage.php");
	}
?>
<!DOCTYPE html>
<html lang = "it" >
	<head>
		<title>AffittoCasa.it</title>
		<meta charset="UTF-8" />
		<meta name="keywords" content="Affitto, Affittare, AffittoCasa, AffittoCasa.it, Proprietà, Casa, Case, Lista Case" />
		<meta name="description" content="Sito Web che permette agli utenti di affittare o mettere in affito una o più
										  proprietà. Il sito Web gestisce le offerte di affitto, le prenotazioni
										  e la conferma delle transizioni di appartamenti privati." />
		<meta name="author" content="Mamery Bamba, Alessandro Frassetti, Danile Capece, Francesco Mochi" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link href="../../stileAffittoCasa.css" rel="stylesheet" type="text/css" />
		<link href="../../immagini/casa.png" rel="shortcut icon" />
		
		<script src="https://kit.fontawesome.com/af5365d2d5.js" crossorigin="anonymous"></script>
		<script src="controlloDati.js"></script>
        <script type="text/javascript" language="javascript" >
			
			// Setta l'altezza del sottomenu a 200px o 0px
			var flag = 0;
			
			// Setta la larghezza della navigazione laterale e il margine sinistro del contenuto della pagina a 300px
			function apriBarra()
			{
				document.getElementById("myBarraLaterale").style.width = "305px";
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
				
				document.getElementById("aperturaMenu").setAttribute("class", "fas fa-bars");
				flag = 0;
			}
			
			function sottomenu()
			{
				if(flag == 0)
				{
					if(document.getElementById("inserimento") != null)  //se l'account è di un amministratore
					{
						document.getElementById("mySottomenu").style.height = "340px";
					}
					
					else  //se l'account è di un utente
					{
						document.getElementById("mySottomenu").style.height = "255px";
					}
					
					document.getElementById("mySottomenu").style.width = "265px";
					flag = 1;
				}
				
				else
				{
					document.getElementById("mySottomenu").style.height = "0px";
					flag = 0;
				}
			}
			
			function errEmail()
			{
				<?php
					if(isset($_SESSION["errEmail"]))
					{
						echo "document.getElementById('errProvincia').innerHTML = 'Quest\'e-mail già esiste';";
						unset($_SESSION["errEmail"]);
					}
				?>
			}
		</script>
	</head>
	
	<body onload="errEmail()">
		<!-- Barra di navigazione -->
		<div id="myBarraLaterale" class="barraLaterale" >
			<a href="javascript:void(0)" class="chiusuraBarra" onclick="chiudiBarra()" >&times;</a>
			<?php
				include "../../connessione_DB.php";
				
				if (isset($_SESSION["username"])){
					
					$username = $conn->real_escape_string($_SESSION["username"]);
					
					$query = "SELECT ruolo
							  FROM utenti
							  WHERE username = '" . $username . "';";
					
					$ris = $conn->query($query);
					
					if ($ris){
						
						if ($ris->num_rows){
							
							$riga = $ris->fetch_assoc();
							
							if ($riga["ruolo"] == "amministratore"){
								
								echo "<a href='javascript:void(0)' onclick='sottomenu()' ><i class='fas fa-user-cog'></i> " .$_SESSION["username"] ."</a>
									  <div id='mySottomenu' class='sottomenu' >
									  	  <a href='../../Accesso/logout.php' ><i class='fas fa-sign-out-alt' ></i> Esci</a>
									  	  <a href='indexModificaDati.php' >Modifica dati personali <i class='far fa-clipboard'></i></a>
									  	  <a href='../InfoPersonali/infoPersonali.php' ><i class='fas fa-info'></i> Info personali</a>
									  	  <a href='../MieiAnnunci/mieiAnnunci.php' >I miei annunci <i class='fas fa-scroll' ></i></a>
									  	  <a href='../MieRecensioni/mieRecensioni.php' >Le mie recensioni <i class='far fa-clipboard'></i></a>
									  	  <a href='../AppartamentiPrenotati/appartamentiPrenotati.php' >Appartamenti prenotati <i class='far fa-clipboard'></i></a>
									  	  <a href='../Amministratore/inserimentoQuartieri/indexInserimentoQuartieri.php' id='inserimento'>Inserimento <i class='fas fa-plus' ></i></a>
									  	  <a href='../Amministratore/Rimozione/indexRimozione.php' >Rimuovi <i class='fas fa-times'></i></a>
									  </div>
									  <a href='../../Annuncio/annuncio_fase1.php' >Pubblica annuncio <i class='fas fa-scroll' ></i></a>";
							}
							else {
								
								echo "<a href='javascript:void(0)' onclick='sottomenu()' ><i class='fas fa-user' ></i> " .$_SESSION["username"] ."</a>
									  <div id='mySottomenu' class='sottomenu' >
									  	  <a href='../../Accesso/logout.php' ><i class='fas fa-sign-out-alt' ></i> Esci</a>
									  	  <a href='indexModificaDati.php' >Modifica dati personali <i class='far fa-clipboard'></i></a>
									  	  <a href='../InfoPersonali/infoPersonali.php' ><i class='fas fa-info'></i> Info personali</a>
									  	  <a href='../MieiAnnunci/mieiAnnunci.php' >I miei annunci <i class='fas fa-scroll' ></i></a>
									  	  <a href='../MieRecensioni/mieRecensioni.php' >Le mie recensioni <i class='far fa-clipboard'></i></a>
									  	  <a href='../AppartamentiPrenotati/appartamentiPrenotati.php' >Appartamenti prenotati <i class='far fa-clipboard'></i></a>
									  </div>
									  <a href='../../Annuncio/annuncio_fase1.php' >Pubblica annuncio <i class='fas fa-scroll' ></i></a>";
							}
						}
					}
					else {
						
						die("Errore: " . $query . "<br>" . $conn->error);
					}
				}
				else {
					
					echo "<a href='../../Accesso/accedi.php' ><i class='fas fa-users' ></i> Accedi</a>";
				}
			?>
			<a href="../../Proprietà/proprieta.php" ><i class="fas fa-home" ></i> Proprietà</a>
			<a href="../../InfoSito/contatti.php" >Contatti <i class="far fa-address-book" ></i></a>
			<a href="../../InfoSito/chisiamo.php" >Chi siamo <i class="fas fa-question" ></i></a>
		</div>
		
	
		<div class="barra" id="main">
			<a href="javascript:void(0)" ><i id="aperturaMenu" class="fas fa-bars" onclick="apriBarra()" ></i></a>
			<a href="../../homepage.php" style="width: 8%; margin-left: 42%;" >AffittoCasa.it</a>
		</div>
		<!-- Fine barra di navigazione -->
		<br>
		
		<div id='modificaDati' class="box1">
			<div class = "accessoRegistrazione">
				<p>
					<h1>Informazioni Personali</h1>
					<br>
					<h2>Modifica dati personali</h2>
				</p>
				<form action = "modificaDati.php" onsubmit="return controlli();" method = "post">
					<input type="text" id="nome" name="nome"  placeholder = "Nome" maxlength="30" />
					<label id="errNome" style="color:red"></label>
					
					<input type="text" id="cognome" name="cognome"  placeholder = "Cognome" maxlength="30" />
					<label id="errCognome" style="color:red"></label><br><br>
					
					<input type="text" id="email" name="email" placeholder = "Email" maxlength="50" />
					<label id="errEmail" style="color:red"></label>
					
					<input type="password" id="password" name="password" placeholder = "Password" maxlength="30" />
					<i id="mostra" class="fas fa-eye" style="font-size: 15px; margin-left: -30px; margin-right: 10px;" onclick="mostraPassword('password')" ></i>
					<label id="errPassword" style="color:red"></label><br><br>
					
					<input type="text" id="telefono" name="telefono" placeholder = "Telefono" maxlength="15" />
					<label id="errTelefono" style="color:red"></label>
					
					<input type="text" id = "comune" name = "comune" placeholder = "Comune" maxlength="30" />
					<label id="errComune" style="color:red"></label><br><br>
					
					<input type="text" id = "provincia" name = "provincia" placeholder = "Provincia" maxlength="2" />
					<label id="errProvincia" style="color:red"></label>
					
					<input type="text" id = "via" name = "via" placeholder = "Via" maxlength="50" />
					<label id="errVia" style="color:red"></label><br><br>
					
					<input type="text" id = "civico" name = "civico" placeholder = "Civico" maxlength="5" />
					<label id="errCivico" style="color:red"></label>
					
					<input type="text" id = "cap" name = "cap" placeholder = "CAP" maxlength = "5" />
					<label id="errCap" style="color:red"></label><br><br>
					
					<input type="submit" name="modificaDati" value="SALVA I DATI" />
				</form>
			</div>
		</div>
	</body>
</html>
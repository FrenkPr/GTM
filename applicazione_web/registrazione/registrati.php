<?php
	session_start();
	
	if(isset($_SESSION["username"]))
	{
		header("location: ../homepage.php");
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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
			
			function controlliErrori()
			{
				<?php
					if(isset($_SESSION["errUsername"]))
					{
						echo "document.getElementById('errUsername').innerHTML = 'Questo username già esiste';";
						unset($_SESSION["errUsername"]);
					}
					
					if(isset($_SESSION["errEmail"]))
					{
						echo "document.getElementById('errEmail').innerHTML = 'Quest\'email già esiste';";
						unset($_SESSION["errEmail"]);
					}
					
					if(isset($_SESSION["errCodFiscale"]))
					{
						echo "document.getElementById('errCodFiscale').innerHTML = 'Questo codice fiscale già esiste';";
						unset($_SESSION["errCodFiscale"]);
					}
				?>
			}
			
			$(document).ready(function()
							  {
								  $("#ruolo").change(function()
														 {
															 var ruolo = $(this).val();
															 
															 $.ajax
															 ({
																  url:"aggiungi_aziende.php",
																  method:"POST",
																  data:{ruolo:ruolo},
																  success:function(aziende)
																		  {
																			   $(".azienda").remove();
																			   
																			   if(aziende == "nessunRuolo")
																			   {
																				   $("#azienda").attr("disabled", true);
																			   }
																			   
																			   else
																			   {
																				   $("#azienda").append(aziende);
																				   $("#azienda").attr("disabled", false);
																			   }
																		  }
															 });
														 });
									
									$("#provincia").change(function()
														 {
															 var sigla = $(this).val();
															 
															 $.ajax
															 ({
																  url:"aggiungi_comuni.php",
																  method:"POST",
																  data:{sigla:sigla},
																  success:function(comuni)
																		  {
																			   $(".comune").remove();
																			   
																			   if(comuni == "nessunaProvincia")
																			   {
																				   $("#comune").attr("disabled", true);
																			   }
																			   
																			   else
																			   {
																				   $("#comune").append(comuni);
																				   $("#comune").attr("disabled", false);
																			   }
																		  }
															 });
														 });
							  });
			
			function alertComune()
			{
				if(document.getElementById('comune').disabled)
				{
					alert('Selezionare prima la provincia');
				}
			}
			
			function alertAzienda()
			{
				if(document.getElementById('azienda').disabled)
				{
					alert('Selezionare prima il ruolo');
				}
			}
			
			function disabilitaComuneEAzienda()
			{
				document.getElementById('comune').disabled = true;
				document.getElementById('azienda').disabled = true;
			}
		</script>
	</head>
	
	<body onload="controlliErrori()">
		
		<!-- Barra di navigazione -->
		<div id="myBarraLaterale" class="barraLaterale" >
			<a href="javascript:void(0)" class="chiusuraBarra" onclick="chiudiBarra()" >&times;</a>
			<a href='../accesso/accedi.php' ><i class='fas fa-users' ></i> Accedi</a>
			<a href="../info_sito/contatti.php" >Contatti <i class="far fa-address-book" ></i></a>
			<a href="../info_sito/chi_siamo.php" >Chi siamo <i class="fas fa-question" ></i></a>
		</div>
		
	
		<div class="barra" id="main">
			<a href="javascript:void(0)" ><i id="aperturaMenu" class="fas fa-shipping-fast" onclick="apriBarra()" ></i></a>
			<a href="../homepage.php" style="width: 8%; margin-left: 42%;" >GTM.it</a>
		</div>
		<!-- Fine barra di navigazione -->
		
		<!-- Registrazione -->
		<div class = "box1" style="color:white">
			<div class = "accessoRegistrazione">
				<h2>Registrazione</h2>
				<h3>Inserisci i tuoi dati per effettuare la registrazione al sito</h3>
				
				<!-- Form di registrazione -->
				<form action="registrazione.php" method="post">
			
					<!-- Dati utente -->
					<input placeholder="Username" id="username" name="username" size="30" maxlength="30">
					<label id="errUsername" style="color:red"></label><br><br>
					
					<input placeholder="Email" id="email" name="email" size="30" maxlength="50">
					<label id="errEmail" style="color:red"></label><br><br>
					
					<input type="password" placeholder="Password" id="password" name="password" size="30" maxlength="30">
					<i id="mostra" class="fas fa-eye" style="color:black; font-size: 15px; margin-left: -30px; margin-right: 10px;" onclick="mostraPassword('password')" ></i>
					<label id="errPassword" style="color:red"></label><br><br>
					
					<input type="password" placeholder="Conferma Password" id="confPassword" name="confPassword" size="30" maxlength="30">
					<i id="mostra1" class="fas fa-eye" style="color:black; font-size: 15px; margin-left: -30px; margin-right: 10px;" onclick="mostraPassword('confPassword')" ></i>
					<label id="errConfPassword" style="color:red"></label><br><br>
					
					<input placeholder="Nome" id="nome" name="nome" size="30" maxlength="30">
					<label id="errNome" style="color:red"></label><br><br>
					
					<input placeholder="Cognome" id="cognome" name="cognome" size="30" maxlength="30">
					<label id="errCognome" style="color:red"></label><br><br>
					
					<input placeholder="Codice fiscale" onkeyup='codFiscaleUpperCase()' id="codFiscale" name="codFiscale" size="30" maxlength="16">
					<label id="errCodFiscale" style="color:red"></label><br><br>
					
					<select id="provincia" name="sigla">
						<option value="">Selezionare una provincia</option>
						
						<?php
							include "../connessione_DB.php";
							
							$query = "SELECT sigla, nome
									  FROM province";
							
							$ris = $conn->query($query);
							
							if($ris)
							{
								while($riga = $ris->fetch_row())
								{
									echo "<option value='$riga[0]'>$riga[1]</option>";
								}
							}
							
							else
							{
								die("Errore: " . $query . "<br>" . $conn->error);
							}
						?>
					</select>
					<label id="errProvincia" style="color:red"></label><br><br>
					
					<label onclick="alertComune()">
						<select id="comune" name="id_comune" disabled>
							<option value="">Selezionare un comune</option>
						</select>
					</label>
					<label id="errComune" style="color:red"></label><br><br>
					
					<input placeholder="Indirizzo" id="indirizzo" name="indirizzo" size="30" maxlength="50">
					<label id="errIndirizzo" style="color:red"></label><br><br>
					
					<input placeholder="Civico" id="civico" name="civico" size="30" maxlength="5">
					<label id="errCivico" style="color:red"></label><br><br>
					
					<input placeholder="CAP" id="cap" name="cap" size="30" maxlength="5">
					<label id="errCap" style="color:red"></label><br><br>
					
					<input placeholder="Telefono" id="telefono" name="telefono" size="30" maxlength="15">
					<label id="errTelefono" style="color:red"></label><br><br>
					
					<select id="ruolo" name="ruolo">
						<option value="">Selezionare il tipo di ruolo</option>
						<option>Corriere HUB</option>
						<option>Esercizio commerciale</option>
						<option>Fornitore</option>
						<option>Magazziniere HUB</option>
					</select>
					<label id="errRuolo" style="color:red"></label><br><br>
					
					<label onclick="alertAzienda()">
						<select id="azienda" name="id_azienda" disabled>
							<option value="">Selezionare l'azienda</option>
						</select>
					</label>
					<label id="errAzienda" style="color:red"></label><br><br>
					<!-- Fine dati utente -->
					
					<!-- Termini e condizioni -->
					<label><input type="checkbox" id="condizioni" name="condizioni">Cliccando qui e proseguendo con la registrazione, dichiari di accettare i nostri <a href = "condizioni.php" target="_blank">termini e condizioni d'uso.</a></label><br>
					<label id="errCondizioni" style="color:red"></label><br><br>
					
					<!-- Pulsanti registrazione e cancella -->
					<input type="submit" onclick="return controlli()" id="registrati" name="registrati" value="Registrati">
					<input type="reset" onclick='disabilitaComuneEAzienda()' value="Cancella Tutto"><br><br>
					
					<label>Hai già un account? <a href="../accesso/accedi.php">Accedi.</a></label>
				</form>
			</div>
		</div>
	</body>
</html>
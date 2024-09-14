<?php
	session_start();
	
	if(!isset($_SESSION["username"]))
	{
		header("location: ../../homepage.php");
	}
?>
<!DOCTYPE html>
<html lang = 'it' >
	<head>
		<title>GTM.it</title>
		<meta charset='UTF-8' />
		<meta name='keywords' content='Trasporto merci, Trasporto, Consegna' />
		<meta name='description' content='Sito web che gestisce le consegne da effettuare a esercizi commerciali.' />
		<meta name='author' content='Francesco Mochi' />
		<meta name='viewport' content='width=device-width, initial-scale=1.0' />
		<link href='../../stile.css' rel='stylesheet' type='text/css' />
		<link href='../../immagini/mezzo.png' rel='shortcut icon' />
		
		<script src='https://kit.fontawesome.com/af5365d2d5.js' crossorigin='anonymous'></script>
		<script src="controllo_dati.js"></script>
		<script>
			
			// Setta l'altezza del sottomenu a 200px o 0px
			var flag = 0;
			
			// Setta la larghezza della navigazione laterale e il margine sinistro del contenuto della pagina a 300px
			function apriBarra()
			{
				document.getElementById('myBarraLaterale').style.width = '550px';
				document.getElementById('main').style.marginLeft = '300px';
				
				document.getElementById('aperturaMenu').removeAttribute('class');
			}

			// Setta la larghezza della navigazione laterale, il margine sinistro del contenuto della pagina e l'altezza del sottomenu a 0px
			function chiudiBarra()
			{
				document.getElementById('myBarraLaterale').style.width = '0px';
				document.getElementById('main').style.marginLeft = '0px';
				
				if(document.getElementById('mySottomenu') != null)
				{
					document.getElementById('mySottomenu').style.height = '0px';
				}
				
				document.getElementById('aperturaMenu').setAttribute('class', 'fas fa-shipping-fast');
				flag = 0;
			}
			
			function sottomenu()
			{
				if(flag == 0)
				{
					document.getElementById('mySottomenu').style.height = '90px';
					document.getElementById('mySottomenu').style.width = '300px';
					flag = 1;
				}
				
				else
				{
					document.getElementById('mySottomenu').style.height = '0px';
					flag = 0;
				}
			}
		</script>
	</head>
	
	<body>
		
		<!-- Barra di navigazione -->
		<div id='myBarraLaterale' class='barraLaterale' >
			<a href='javascript:void(0)' class='chiusuraBarra' onclick='chiudiBarra()' >&times;</a>
			<?php
				echo "<a href='javascript:void(0)' onclick='sottomenu()' ><i id='icona_user' class='fas fa-user'></i> " . $_SESSION['username'] ."</a>
					  <div id='mySottomenu' class='sottomenu' >
					  	  <a href='../../accesso/logout.php' ><i class='fas fa-sign-out-alt' ></i> Esci</a>
					  	  <a href='index_modifica.php' >Modifica dati personali <i class='far fa-clipboard'></i></a>
					  </div>";
				
				if($_SESSION["ruolo"] == 'Amministratore')
				{
					echo "<script>document.getElementById('icona_user').className = 'fas fa-user-cog';</script>
						  <a href='../../mezzi/inserimento/index_inserimento.php' >Inserisci un mezzo <i class='fas fa-shipping-fast'></i></a>
						  <a href='../../mezzi/modifica/visualizzazione_mezzi.php' >Visualizza/modifica/cancella mezzi <i class='fas fa-shipping-fast'></i></a>
						  <a href='../../merce/modifica/amministratore/visualizzazione_merce.php' >Cancella consegne <i class='far fa-clipboard'></i></a>";
				}
				
				else if($_SESSION["ruolo"] == 'Fornitore')
				{
					echo "<a href='../../merce/inserimento/index_inserimento.php' >Inserisci una consegna <i class='fas fa-dolly-flatbed'></i></a>
						  <a href='../../merce/modifica/fornitore/visualizzazione_merce.php' >Visualizza/modifica/cancella le mie consegne <i class='far fa-clipboard'></i></a>";
				}
				
				else if($_SESSION["ruolo"] == 'Magazziniere HUB')
				{
					echo "<a href='../../merce/modifica/magazziniere_hub/visualizzazione_merce.php' >Visualizza/modifica consegne <i class='far fa-clipboard'></i></a>";
				}
				
				else if($_SESSION["ruolo"] == 'Corriere HUB')
				{
					echo "<a href='../../merce/modifica/corriere_hub/visualizzazione_merce.php' >Visualizza/modifica consegne <i class='far fa-clipboard'></i></a>";
				}
				
				else if($_SESSION["ruolo"] == 'Esercizio commerciale')
				{
					echo "<a href='../../merce/modifica/esercizio_commerciale/visualizzazione_merce.php' >Visualizza consegne <i class='far fa-clipboard'></i></a>";
				}
			?>
			<a href='../../info_sito/contatti.php' >Contatti <i class='far fa-address-book' ></i></a>
			<a href='../../info_sito/chi_siamo.php' >Chi siamo <i class='fas fa-question' ></i></a>
		</div>
		
	
		<div class='barra' id='main'>
			<a href='javascript:void(0)' ><i id='aperturaMenu' class='fas fa-shipping-fast' onclick='apriBarra()' ></i></a>
			<a href='../../homepage.php' style='width: 8%; margin-left: 42%;' >GTM.it</a>
		</div>
		<!-- Fine barra di navigazione -->
		
		
		
		<div id='modificaDati' class='box1'>
			<div class = 'accessoRegistrazione'>
				<h1>Modifica dati personali</h1>
				
				<?php
					include "../../connessione_DB.php";
					
					$qry = "SELECT *, comuni.nome, province.nome
							FROM utenti
							JOIN anagrafica ON cod_fiscale = fk_cod_fiscale
							JOIN comuni ON id_comune = fk_id_comune
							JOIN province ON sigla = fk_sigla
							WHERE username = '" . $_SESSION["username"] . "';";
					
					$ris = $conn->query($qry);
					
					if($ris)
					{
						$riga = $ris->fetch_row();
						// print_r($riga);
						echo "<form action='modificaDati.php' onsubmit='return controlli();' method = 'post'>
								  <label style='margin-left:-44%'>Username</label>
								  <input value='$riga[0]' disabled><br><br>
								  
								  <label>E-mail</label>
								  <input value='$riga[1]' disabled>
								  <input id='email' name='email' placeholder = 'E-mail' maxlength='50' />
								  <label id='errEmail' style='color:red'></label><br><br>
								  
								  <label>Password</label>
								  <input type='password' id='password' name='password' placeholder = 'Password' maxlength='30' />
								  <i id='mostra' class='fas fa-eye' style='font-size: 15px; margin-left: -30px; margin-right: 10px;' onclick='mostraPassword('password')' ></i>
								  <input type='password' id='confPassword' placeholder = 'Conferma password' maxlength='30' />
								  <i id='mostra' class='fas fa-eye' style='font-size: 15px; margin-left: -30px; margin-right: 10px;' onclick='mostraPassword('confPassword')' ></i>
								  <label id='errPassword' style='color:red'></label><br><br>
								  
								  <label>Codice fiscale</label>
								  <input value='$riga[4]' disabled>
								  <input id='codFiscale' name='cod_fiscale' onkeyup='codFiscaleUpperCase()' placeholder = 'Codice fiscale' maxlength='30' />
								  <label id='errNome' style='color:red'></label><br><br>
								  
								  <label>Nome</label>
								  <input value='$riga[7]' disabled>
								  <input id='nome' name='nome' placeholder = 'Nome' maxlength='30' />
								  <label id='errNome' style='color:red'></label><br><br>
								  
								  <label>Cognome</label>
								  <input value='$riga[8]' disabled>
								  <input id='cognome' name='cognome' placeholder = 'Cognome' maxlength='30' />
								  <label id='errCognome' style='color:red'></label><br><br>
								  
								  <label>Comune</label>
								  <input value='$riga[19]' disabled>
								  <input id = 'comune' name = 'comune' placeholder = 'Comune' maxlength='30' />
								  <label id='errComune' style='color:red'></label><br><br>
								  
								  <label>Provincia</label>
								  <input value='$riga[20]' disabled>
								  <input id = 'provincia' name = 'provincia' placeholder = 'Provincia' maxlength='2' />
								  <label id='errProvincia' style='color:red'></label><br><br>
								  
								  <label>Indirizzo</label>
								  <input value='$riga[9]' disabled>
								  <input id = 'indirizzo' name = 'indirizzo' placeholder = 'Indirizzo' maxlength='50' />
								  <label id='errVia' style='color:red'></label><br><br>
								  
								  <label>Numero civico</label>
								  <input value='$riga[10]' disabled>
								  <input id = 'civico' name = 'civico' placeholder = '' maxlength='5' />
								  <label id='errCivico' style='color:red'></label><br><br>
								  
								  <label>CAP</label>
								  <input value='$riga[11]' disabled>
								  <input id = 'cap' name = 'cap' placeholder = '' maxlength = '5' />
								  <label id='errCap' style='color:red'></label><br><br>
								  
								  <label>Numero di telefono</label>
								  <input value='$riga[12]' disabled>
								  <input id='telefono' name='telefono' placeholder = '' maxlength='15' />
								  <label id='errTelefono' style='color:red'></label><br><br>
								  
								  <input type='submit' name='modificaDati' value='Modifica dati' />
							  </form>";
					}
					
					else
					{
						die("Errore query: " . $qry . "<br>" . $conn -> error);
					}
				?>
			</div>
		</div>
	</body>
</html>
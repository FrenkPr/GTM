<?php
	session_start();
	
	if(!isset($_SESSION["username"]))
	{
		header("location: ../../homepage.php");
	}
	
	if(isset($_SESSION["ruolo"]))
	{
		if($_SESSION["ruolo"] != "Amministratore")
		{
			header("location: ../../homepage.php");
		}
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
			
			function datiModificatiOCancellati()
			{
				<?php
					if(isset($_SESSION["dati_modificati"]))
					{
						$_SESSION["refreshato"] = 1;
						header("Refresh:0");
						unset($_SESSION["dati_modificati"]);
					}
					
					else if(isset($_SESSION["refreshato"]))
					{
						echo "alert('I dati sono stati modificati con successo');";
						unset($_SESSION["refreshato"]);
					}
					
					if(isset($_SESSION["mezzo_cancellato"]))
					{
						echo "alert('Il mezzo è stato rimosso con successo');";
						unset($_SESSION["mezzo_cancellato"]);
						unset($_SESSION["cancella"]);
						unset($_SESSION["targa"]);
					}
				?>
			}
		</script>
	</head>
	
	<body onload="datiModificatiOCancellati()">
		
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
		<div id='listaConsegne'>
			<br><h1>Visualizzazione mezzi</h1>
			<?php
				include "../../connessione_DB.php";
				
				$qry = "SELECT *
						FROM mezzi;";
				
				$ris = $conn->query($qry);
				
				if($ris)
				{
					if($ris->num_rows)
					{
						$i = 0;
						
						while($riga = $ris->fetch_row())
						{
							if($riga[10] == '')
							{
								$riga[10] = "Valore non inserito";
							}
							
							echo "<form action='index_modifica.php' method='post'>
									  <label>Targa</label>
									  <input value='$riga[0]' disabled>
									  <input type='hidden' value='$riga[0]' name='targa'><br><br>
									  
									  <label>Volume</label>
									  <input value='$riga[1]' disabled>
									  <input type='hidden' value='$riga[1]' name='volume'><br><br>
									  
									  <label>Autonomia</label>
									  <input value='$riga[2]' disabled>
									  <input type='hidden' value='$riga[2]' name='autonomia'><br><br>
									  
									  <label>Lunghezza</label>
									  <input value='$riga[3]' disabled>
									  <input type='hidden' value='$riga[3]' name='lunghezza'><br><br>
									  
									  <label>Larghezza</label>
									  <input value='$riga[4]' disabled>
									  <input type='hidden' value='$riga[4]' name='larghezza'><br><br>
									  
									  <label>Altezza</label>
									  <input value='$riga[5]' disabled>
									  <input type='hidden' value='$riga[5]' name='altezza'><br><br>
									  
									  <label>Peso</label>
									  <input value='$riga[6]' disabled>
									  <input type='hidden' value='$riga[6]' name='peso'><br><br>
									  
									  <label>Mezzo frigorifero</label>
									  <input type='checkbox' id='mezzoFrigorifero$i' disabled>
									  <input type='hidden' value='$riga[7]' name='mezzoFrigorifero'><br><br>
									  
									  <label>Mezzo freezer</label>
									  <input type='checkbox' id='mezzoFreezer$i' disabled>
									  <input type='hidden' value='$riga[8]' name='mezzoFreezer'><br><br>
									  
									  <label>Mezzo guasto</label>
									  <input type='checkbox' id='mezzoGuasto$i' disabled>
									  <input type='hidden' value='$riga[9]' name='mezzoGuasto'><br><br>
									  
									  <label>Descrizione guasto</label>
									  <input value='$riga[10]' disabled>
									  <input type='hidden' value='$riga[10]' name='descrizioneGuasto'><br><br>
									  
									  <input type='submit' name='visualizza_mezzo' value='Modifica'>
									  <input type='submit' name='cancella' value='Cancella'><br><br><br>
								  </form>
								  
								  <script>";
							
							if($riga[7] == '1')
							{
								echo "document.getElementById('mezzoFrigorifero$i').checked = true;";
							}
							
							if($riga[8] == '1')
							{
								echo "document.getElementById('mezzoFreezer$i').checked = true;";
							}
							
							if($riga[9] == '1')
							{
								echo "document.getElementById('mezzoGuasto$i').checked = true;";
							}
							
							echo "</script>";
							
							$i++;
						}
					}
					
					else
					{
						echo "<p>Non è stato inserito ancora alcun mezzo</p>";
					}
				}
				
				else
				{
					die("Errore: " . $qry . "<br>" . $conn->error);
				}
			?>
		</div>
		
	</body>
</html>
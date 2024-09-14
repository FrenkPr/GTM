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
			<a href='accedi.php' ><i class='fas fa-users' ></i> Accedi</a>
			<a href="../info_sito/contatti.php" >Contatti <i class="far fa-address-book" ></i></a>
			<a href="../info_sito/chi_siamo.php" >Chi siamo <i class="fas fa-question" ></i></a>
		</div>
		
	
		<div class="barra" id="main">
			<a href="javascript:void(0)" ><i id="aperturaMenu" class="fas fa-shipping-fast" onclick="apriBarra()" ></i></a>
			<a href="../homepage.php" style="width: 8%; margin-left: 42%;" >GTM.it</a>
		</div>
		<!-- Fine barra di navigazione -->
		
		<!-- Accesso -->
		<div class="box" >
			<div class="accessoRegistrazione" >
				<h2>Accesso</h2>
				
				<!-- Form di accesso -->
				<form action="login.php" method="post" >
					<input maxlength=30 name="username" id="username" placeholder="Username" class="form-control">
					<label id="errNome" style="color:red"></label>
					<br><br>
					
					<input type="password" maxlength=30 name="pass" id="pass" placeholder="Password" class="form-control">
					<label id="errPass" style="color:red"></label>
					<br><br>
					
					<input type="submit" name="accedi" id="accedi" class="btn btn-info" value="Accedi">
					<br>
					
					<p>Non ti sei ancora registrato? <a href="../registrazione/registrati.php">Registrati</a></p>
				</form>
			</div>
		</div>
		<script>
			<?php
				if(isset($_SESSION["errore"]))
				{
					if($_SESSION["errore"] == 1)
					{
						echo "document.getElementById('errNome').innerHTML = ' Username errato';
							  document.getElementById('errPass').innerHTML = ' Password errata';
							  
							  document.getElementById('errNome').style.marginRight = '-110px';
							  document.getElementById('errPass').style.marginRight = '-106px';";
					}
					
					else if($_SESSION["errore"] == 2)
					{
						echo "document.getElementById('errPass').innerHTML = ' Password errata';
							  document.getElementById('errPass').style.marginRight = '-106px';";
					}
					
					unset($_SESSION["errore"]);
				}
			?>
		</script>
	</body>
</html>
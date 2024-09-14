function codFiscaleUpperCase()
{
	document.getElementById('codFiscale').value = document.getElementById('codFiscale').value.toUpperCase();
}

//mostra o nasconde la password
function mostraPassword(p)
{
	if (document.getElementById(p).type == "password")
	{
		document.getElementById(p).type = "text";
		
		if(document.getElementById(p).name == "password")
		{	
			document.getElementById("mostra").className = "fas fa-eye-slash";
		}
		
		else
		{	
			document.getElementById("mostra1").className = "fas fa-eye-slash";
		}
		
		document.getElementById(p).style.marginLeft = "2px";
	}
	
	else
	{	
		document.getElementById(p).type = "password";
		
		if (document.getElementById(p).name == "password")
		{	
			document.getElementById("mostra").className = "fas fa-eye";
		}
		
		else
		{	
			document.getElementById("mostra1").className = "fas fa-eye";
		}
		
		document.getElementById(p).style.marginLeft = "0px";
	}
}
			
function controlli()
{
	var patt = /[0-9]/g;
	var tuttoOk = true;
	var username = document.getElementById('username').value;
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	var confPassword = document.getElementById('confPassword').value;
	var nome = document.getElementById('nome').value;
	var cognome = document.getElementById('cognome').value;
	var codFiscale = document.getElementById('codFiscale').value;
	var provincia = document.getElementById('provincia').value;
	var comune = document.getElementById('comune').value;
	var indirizzo = document.getElementById('indirizzo').value;
	var civico = document.getElementById('civico').value;
	var cap = document.getElementById('cap').value;
	var telefono = document.getElementById('telefono').value;
	var ruolo = document.getElementById('ruolo').value;
	var azienda = document.getElementById('azienda').value;
	
	if(username == "")
	{
		document.getElementById("errUsername").innerHTML = "Compilare il campo";
		tuttoOk = false;
	}
	
	else if(username.length < 5)
	{
		document.getElementById("errUsername").innerHTML = "Lo username dev'essere di almeno 5 caratteri";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errUsername").innerHTML = "";
	}
	
	if(email == "")
	{
		document.getElementById("errEmail").innerHTML = "Compilare il campo";
		tuttoOk = false;
	}
	
	else if(email.includes("\\"))
	{
		document.getElementById("errEmail").innerHTML = "Rimuovere il carattere \\";
		tuttoOk = false;
	}
	
	else if(!email.includes("@"))
	{
		document.getElementById("errEmail").innerHTML = "Inserire un'email valida (inserire il carattere @)";
		tuttoOk = false;
	}
	
	//se ci sono più @
	else if(email.indexOf("@") != email.lastIndexOf("@"))
	{
		document.getElementById("errEmail").innerHTML = "Inserire solo una @";
		tuttoOk = false;
	}
	
	else if(email.endsWith("@"))
	{
		document.getElementById("errEmail").innerHTML = "Inserire un dominio valido";
		tuttoOk = false;
	}
	
	else if(email.endsWith(".") || puntiEmailErrati(email))
	{
		document.getElementById("errEmail").innerHTML = "Inserire i . del dominio in una posizione corretta";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errEmail").innerHTML = "";
	}
	
	if(password == "")
	{
		document.getElementById("errPassword").innerHTML = "Compilare il campo";
		tuttoOk = false;
	}
	
	else if(password.length < 5)
	{
		document.getElementById("errPassword").innerHTML = "La password dev'essere di almeno 5 caratteri";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errPassword").innerHTML = "";
	}
	
	if(confPassword == "")
	{
		document.getElementById("errConfPassword").innerHTML = "Compilare il campo";
		tuttoOk = false;
	}
	
	else if(confPassword != password)
	{
		document.getElementById("errConfPassword").innerHTML = "Le password non corrispondono";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errConfPassword").innerHTML = "";
	}
	
	if(nome == "")
	{
		document.getElementById("errNome").innerHTML = "Compilare il campo";
		tuttoOk = false;
	}
	
	else if(nome.match(patt) != null)
	{
		document.getElementById("errNome").innerHTML = "Inserire un nome valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errNome").innerHTML = "";
	}
	
	if(cognome == "")
	{
		document.getElementById("errCognome").innerHTML = "Compilare il campo";
		tuttoOk = false;
	}
	
	else if(cognome.match(patt) != null)
	{
		document.getElementById("errCognome").innerHTML = "Inserire un cognome valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errCognome").innerHTML = "";
	}
	
	if(codFiscale == "")
	{
		document.getElementById("errCodFiscale").innerHTML = "Compilare il campo";
		tuttoOk = false;
	}
	
	else if(codFiscale.length != 16)
	{
		document.getElementById("errCodFiscale").innerHTML = "Inserire un codice fiscale valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errCodFiscale").innerHTML = "";
	}
	
	if(provincia == "")
	{
		document.getElementById("errProvincia").innerHTML = "Selezionare una provincia";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errProvincia").innerHTML = "";
	}
	
	if(comune == "")
	{
		document.getElementById("errComune").innerHTML = "Selezionare un comune";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errComune").innerHTML = "";
	}
	
	if(indirizzo == "")
	{
		document.getElementById("errIndirizzo").innerHTML = "Compilare il campo";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errIndirizzo").innerHTML = "";
	}
	
	if(civico == "")
	{
		document.getElementById("errCivico").innerHTML = "Compilare il campo";
		tuttoOk = false;
	}
	
	else if(civico == "0")
	{
		document.getElementById("errCivico").innerHTML = "Inserire un numero civico valido";
		tuttoOk = false;
	}
	
	else if(numeroErrato(civico))
	{
		document.getElementById("errCivico").innerHTML = "Inserire un numero civico valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errCivico").innerHTML = "";
	}
	
	if(cap == "")
	{
		document.getElementById("errCap").innerHTML = "Compilare il campo";
		tuttoOk = false;
	}
	
	else if(numeroErrato(cap))
	{
		document.getElementById("errCap").innerHTML = "Inserire un CAP valido";
		tuttoOk = false;
	}
	
	else if(cap.length != 5)
	{
		document.getElementById("errCap").innerHTML = "Il CAP deve avere 5 cifre";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errCap").innerHTML = "";
	}
	
	if(telefono == "")
	{
		document.getElementById("errTelefono").innerHTML = "Compilare il campo";
		tuttoOk = false;
	}
	
	else if(numeroErrato(telefono))
	{
		document.getElementById("errTelefono").innerHTML = "Inserire un numero valido";
		tuttoOk = false;
	}
	
	else if(telefono.length < 5)
	{
		document.getElementById("errTelefono").innerHTML = "Il numero di telefono deve avere almeno 5 cifre";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errTelefono").innerHTML = "";
	}
	
	if(!document.getElementById("condizioni").checked)
	{
		document.getElementById("errCondizioni").innerHTML = "Per proseguire devi accettare i termini e condizioni d'uso";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errCondizioni").innerHTML = "";
	}
	
	if(ruolo == "")
	{
		document.getElementById("errRuolo").innerHTML = "Selezionare un ruolo";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errRuolo").innerHTML = "";
	}
	
	if(azienda == "")
	{
		document.getElementById("errAzienda").innerHTML = "Selezionare un'azienda";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errAzienda").innerHTML = "";
	}
	
	return tuttoOk;
}

function numeroErrato(n)
{
	var errore = false;
	
	for(var i = 0; i < n.length && !errore; i++)
	{
		if(isNaN(parseInt(n.charAt(i))))
		{
			errore = true;
		}
	}
	
	return errore;
}

function puntiEmailErrati(email)
{
	var errore = false;
	
	for(var i = email.indexOf("@")+1; i < email.length-1 && !errore; i++)
	{
		for(var k = i+1; k < email.length && !errore; k++)
		{
			if(email.charAt(i) == '.' && email.charAt(k) == '.')
			{
				errore = true;
			}
		}
	}
	
	return errore;
}
function codFiscaleUpperCase()
{
	document.getElementById('codFiscale').value = document.getElementById('codFiscale').value.toUpperCase();
}

//mostra o nasconde la password
function mostraPassword(p)
{
	if (document.getElementById(p).type == "password"){
		
		document.getElementById(p).type = "text";
		document.getElementById("mostra").className = "fas fa-eye-slash";
	}
	else {
		
		document.getElementById(p).type = "password";
		document.getElementById("mostra").className = "fas fa-eye";
	}
}

function controlli()
{
	var patt = /[0-9]/g;
	var tuttoOk = true;
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	var nome = document.getElementById('nome').value;
	var cognome = document.getElementById('cognome').value;
	var comune = document.getElementById('comune').value;
	var provincia = document.getElementById('provincia').value;
	var via = document.getElementById('via').value;
	var civico = document.getElementById('civico').value;
	var cap = document.getElementById('cap').value;
	var telefono = document.getElementById('telefono').value;
	
	if(nome == "" && cognome == "" && email == "" && password == "" && telefono == "" && comune == "" && provincia == "" && via == "" && civico == "" && cap == "")
	{
		alert("Compilare almeno un campo");
		document.getElementById("errEmail").innerHTML = "";
		document.getElementById("errPassword").innerHTML = "";
		document.getElementById("errNome").innerHTML = "";
		document.getElementById("errCognome").innerHTML = "";
		document.getElementById("errComune").innerHTML = "";
		document.getElementById("errProvincia").innerHTML = "";
		document.getElementById("errVia").innerHTML = "";
		document.getElementById("errCivico").innerHTML = "";
		document.getElementById("errCap").innerHTML = "";
		document.getElementById("errTelefono").innerHTML = "";
		tuttoOk = false;
	}
	
	else
	{
		if(email != '')
		{
			if(email.includes("\\"))
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
		}
		
		else
		{
			document.getElementById("errEmail").innerHTML = "";
		}
		
		if(password != '' && password.length < 5)
		{
			document.getElementById("errPassword").innerHTML = "La password dev'essere di almeno 5 caratteri";
			tuttoOk = false;
		}
		
		else
		{
			document.getElementById("errPassword").innerHTML = "";
		}
		
		if(nome.match(patt) != null)
		{
			document.getElementById("errNome").innerHTML = "Inserire un nome valido";
			tuttoOk = false;
		}
		
		else
		{
			document.getElementById("errNome").innerHTML = "";
		}
		
		if(cognome.match(patt) != null)
		{
			document.getElementById("errCognome").innerHTML = "Inserire un cognome valido";
			tuttoOk = false;
		}
		
		else
		{
			document.getElementById("errCognome").innerHTML = "";
		}
		
		if(comune.match(patt) != null)
		{
			document.getElementById("errComune").innerHTML = "Inserire un comune valido";
			tuttoOk = false;
		}
		
		else
		{
			document.getElementById("errComune").innerHTML = "";
		}
		
		if(provincia.match(patt) != null)
		{
			document.getElementById("errProvincia").innerHTML = "Inserire una provincia valida";
			tuttoOk = false;
		}
		
		else if(provincia != '' && provincia.length != 2)
		{
			document.getElementById("errProvincia").innerHTML = "La provincia deve avere 2 caratteri";
			tuttoOk = false;
		}
		
		else
		{
			document.getElementById("errProvincia").innerHTML = "";
		}
		
		if(via.match(patt) != null)
		{
			document.getElementById("errVia").innerHTML = "Inserire una via valida";
			tuttoOk = false;
		}
		
		else
		{
			document.getElementById("errVia").innerHTML = "";
		}
		
		if(numeroErrato(civico))
		{
			document.getElementById("errCivico").innerHTML = "Inserire un numero civico valido";
			tuttoOk = false;
		}
		
		else
		{
			document.getElementById("errCivico").innerHTML = "";
		}
		
		if(numeroErrato(cap))
		{
			document.getElementById("errCap").innerHTML = "Inserire un CAP valido";
			tuttoOk = false;
		}
		
		else if(cap != '' && cap.length != 5)
		{
			document.getElementById("errCap").innerHTML = "Il CAP deve avere 5 cifre";
			tuttoOk = false;
		}
		
		else
		{
			document.getElementById("errCap").innerHTML = "";
		}
		
		if(numeroErrato(telefono))
		{
			document.getElementById("errTelefono").innerHTML = "Inserire un numero valido";
			tuttoOk = false;
		}
		
		else if(telefono != '' && telefono.length < 5)
		{
			document.getElementById("errTelefono").innerHTML = "Il numero di telefono deve avere almeno 5 cifre";
			tuttoOk = false;
		}
		
		else
		{
			document.getElementById("errTelefono").innerHTML = "";
		}
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
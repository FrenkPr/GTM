function controlli()
{
	var patt = /[0-9]/g;
	var tuttoOk = true;
	var nessunCampoCompilato = true;
	var nome = document.getElementById('nome').value;
	var tipo = document.getElementById('tipo').value;
	var qta = document.getElementById('qta').value;
	var numColli = document.getElementById('numColli').value;
	var lunghezzaCollo = document.getElementById('lunghezzaCollo').value;
	var larghezzaCollo = document.getElementById('larghezzaCollo').value;
	var altezzaCollo = document.getElementById('altezzaCollo').value;
	var pesoCollo = document.getElementById('pesoCollo').value;
	var numOrdine = document.getElementById('numOrdine').value;
	var consegnaHub = document.getElementById('consegnaHub').value;
	var dataConsegnaHub = new Date(consegnaHub);
	
	//controlla se nessun campo ? stato compilato
	for(var i = 0; i < document.getElementsByClassName('dati').length && nessunCampoCompilato; i++)
	{
		if(document.getElementsByClassName('dati')[i].value != '')
		{
			nessunCampoCompilato = false;
		}
	}
	
	if(nessunCampoCompilato)
	{
		alert('Compilare almeno un campo');
		tuttoOk = false;
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
	
	if(tipo.match(patt) != null)
	{
		document.getElementById("errTipo").innerHTML = "Inserire un valore valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errTipo").innerHTML = "";
	}
	
	if(intErrato(qta))
	{
		document.getElementById("errQta").innerHTML = "Inserire un numero valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errQta").innerHTML = "";
	}
	
	if(intErrato(numColli))
	{
		document.getElementById("errNumColli").innerHTML = "Inserire un numero valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errNumColli").innerHTML = "";
	}
	
	if(doubleErrato(lunghezzaCollo))
	{
		document.getElementById("errLunghezzaCollo").innerHTML = "Inserire un numero valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errLunghezzaCollo").innerHTML = "";
	}
	
	if(doubleErrato(larghezzaCollo))
	{
		document.getElementById("errLarghezzaCollo").innerHTML = "Inserire un numero valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errLarghezzaCollo").innerHTML = "";
	}
	
	if(doubleErrato(altezzaCollo))
	{
		document.getElementById("errAltezzaCollo").innerHTML = "Inserire un numero valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errAltezzaCollo").innerHTML = "";
	}
	
	if(doubleErrato(pesoCollo))
	{
		document.getElementById("errPesoCollo").innerHTML = "Inserire un numero valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errPesoCollo").innerHTML = "";
	}
	
	if(intErrato(numOrdine))
	{
		document.getElementById("errNumOrdine").innerHTML = "Inserire un numero valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errNumOrdine").innerHTML = "";
	}
	
	if(dataConsegnaHub < new Date())
	{
		document.getElementById("errConsegnaHub").innerHTML = "La consegna dev'essere maggiore o uguale alla data attuale";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errConsegnaHub").innerHTML = "";
	}
	
	return tuttoOk;
}

//controlla se un int contiene caratteri o no
function intErrato(num)
{
	var errore = false;
	
	for(var i = 0; i < num.length && !errore; i++)
	{
		if(isNaN(num.charAt(i)))
		{
			errore = true;
		}
	}
	
	return errore;
}

//controlla se un double contiene caratteri o no
function doubleErrato(num)
{
	var errore = false;
	
	if(num.charAt(0) == '.')
	{
		errore = true;
	}
	
	else if(num.indexOf('.') != num.lastIndexOf('.'))
	{
		errore = true;
	}
	
	for(var i = 0; i < num.length && !errore; i++)
	{
		if(isNaN(num.charAt(i)) && num.charAt(i) != '.')
		{
			errore = true;
		}
	}
	
	return errore;
}
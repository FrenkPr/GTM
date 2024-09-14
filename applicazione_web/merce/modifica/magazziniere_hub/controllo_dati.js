function controlli()
{
	var patt = /[0-9]/g;
	var tuttoOk = true;
	var nessunCampoCompilato = true;
	var lunghezzaCollo = document.getElementById('lunghezzaCollo').value;
	var larghezzaCollo = document.getElementById('larghezzaCollo').value;
	var altezzaCollo = document.getElementById('altezzaCollo').value;
	var pesoCollo = document.getElementById('pesoCollo').value;
	var consegnaHub = document.getElementById('consegnaHub').value;
	var dataConsegnaHub = new Date(consegnaHub);
	var consegnaEsComm = document.getElementById('consegnaEsComm').value;
	var dataConsegnaEsComm = new Date(consegnaEsComm);
	
	//controlla se nessun campo è stato compilato
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
	
	if(dataConsegnaEsComm < new Date())
	{
		document.getElementById("errConsegnaEsComm").innerHTML = "La consegna dev'essere maggiore o uguale alla data attuale";
		tuttoOk = false;
	}
	
	else if(dataConsegnaEsComm <= dataConsegnaHub)
	{
		document.getElementById("errConsegnaEsComm").innerHTML = "La consegna dev'essere maggiore della data di consegna all'HUB";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errConsegnaEsComm").innerHTML = "";
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
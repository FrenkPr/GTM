function targaUpperCase()
{
	document.getElementById('targa').value = document.getElementById('targa').value.toUpperCase();
}

function controlli()
{
	var patt = /[0-9]/g;
	var tuttoOk = true;
	var targa = document.getElementById('targa').value;
	var volume = document.getElementById('volume').value;
	var autonomia = document.getElementById('autonomia').value;
	var lunghezza = document.getElementById('lunghezza').value;
	var larghezza = document.getElementById('larghezza').value;
	var altezza = document.getElementById('altezza').value;
	var peso = document.getElementById('peso').value;
	var mezzoFrigorifero = document.getElementById('mezzoFrigorifero').checked;
	var mezzoFreezer = document.getElementById('mezzoFreezer').checked;
	var mezzoGuasto = document.getElementById('mezzoGuasto').checked;
	var descrizioneGuasto = document.getElementById('descrizioneGuasto').value;
	
	if(targa.length != 7 && targa != '')
	{
		document.getElementById("errTarga").innerHTML = "Inserire una targa valida";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errTarga").innerHTML = "";
	}
	
	if(doubleErrato(volume))
	{
		document.getElementById("errVolume").innerHTML = "Inserire un valore valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errVolume").innerHTML = "";
	}
	
	if(intErrato(autonomia))
	{
		document.getElementById("errAutonomia").innerHTML = "Inserire un numero valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errAutonomia").innerHTML = "";
	}
	
	if(doubleErrato(lunghezza))
	{
		document.getElementById("errLunghezza").innerHTML = "Inserire un numero valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errLunghezza").innerHTML = "";
	}
	
	if(doubleErrato(larghezza))
	{
		document.getElementById("errLarghezza").innerHTML = "Inserire un numero valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errLarghezza").innerHTML = "";
	}
	
	if(doubleErrato(altezza))
	{
		document.getElementById("errAltezza").innerHTML = "Inserire un numero valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errAltezza").innerHTML = "";
	}
	
	if(doubleErrato(peso))
	{
		document.getElementById("errPeso").innerHTML = "Inserire un numero valido";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById("errPeso").innerHTML = "";
	}
	
	if(mezzoFrigorifero && mezzoFreezer)
	{
		document.getElementById('errMezzoFrigoriferoEFreezer').innerHTML = "Selezionare solo frigorifero o freezer";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById('errMezzoFrigoriferoEFreezer').innerHTML = "";
	}
	
	if(mezzoGuasto && descrizioneGuasto == '')
	{
		document.getElementById('errDescrizioneGuasto').innerHTML = "Compilare il campo";
		tuttoOk = false;
	}
	
	else
	{
		document.getElementById('errDescrizioneGuasto').innerHTML = "";
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
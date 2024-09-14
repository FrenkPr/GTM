function controlli()
{
	var tuttoOk = true;
	var nessunCampoCompilato = true;
	
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
	
	return tuttoOk;
}
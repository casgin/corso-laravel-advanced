/**
 * Application Logic and Behavioral Logic
 */

/**
 * Applico i ragionamenti di setup e di environment
 * del mio applicativo
 */
function entryPoint()
{
	txt = "Gianfranco";
}

function manageSommaDueNumeri()
{
	var fldNumero1 = document
					.getElementById('fldNumero1').value;
	var fldNumero2 = document
				.getElementById('fldNumero2').value;

			console.log('Numero 1=' + fldNumero1);
			console.log(typeof fldNumero1);    			
			console.log('Numero 2=' + fldNumero2);    			

		    var risultato = sommaNumeri(
		    	parseInt(fldNumero1),
		    	parseInt(fldNumero2)
		    	);

		    if(!risultato) { alert('ERRORE NELLA FUNZIONE sommaNumeri'); }
		    else {
		    	alert(risultato);
		    }

}

function manageSommaListaNumeri()
{
	var elencoNumeri = document.getElementById('fldListaNumeri').value;
	var arStrElencoNumeri = elencoNumeri.split(',');
	var arElencoNumeri = [];
	for(var i in arStrElencoNumeri)
	{
		arElencoNumeri.push(arStrElencoNumeri[i] + 0);
	}
	var risultato = sommaListaNumeri_by_Array(arElencoNumeri);

	// --- inseriamo il risultato nella pagina
}

window.addEventListener('load', function () {

    // === Inizializzazione applicativo
    // === Richiamo Entry Point
    entryPoint();


    document.getElementById('btnSommaNumeri')
    		.addEventListener('click', manageSommaDueNumeri);

    document.getElementById('btnSommaListaNumeri')
    		.addEventListener('click', manageSommaListaNumeri);


    		


});
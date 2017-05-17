/**
 * Business Logic
 */

function intval (mixedVar, base) {
  //  discuss at: http://locutus.io/php/intval/
  // original by: Kevin van Zonneveld (http://kvz.io)
  // improved by: stensi
  // bugfixed by: Kevin van Zonneveld (http://kvz.io)
  // bugfixed by: Brett Zamir (http://brett-zamir.me)
  // bugfixed by: Rafał Kukawski (http://blog.kukawski.pl)
  //    input by: Matteo
  //   example 1: intval('Kevin van Zonneveld')
  //   returns 1: 0
  //   example 2: intval(4.2)
  //   returns 2: 4
  //   example 3: intval(42, 8)
  //   returns 3: 42
  //   example 4: intval('09')
  //   returns 4: 9
  //   example 5: intval('1e', 16)
  //   returns 5: 30
  var tmp
  var type = typeof mixedVar
  if (type === 'boolean') {
    return +mixedVar
  } else if (type === 'string') {
    tmp = parseInt(mixedVar, base || 10)
    return (isNaN(tmp) || !isFinite(tmp)) ? 0 : tmp
  } else if (type === 'number' && isFinite(mixedVar)) {
    return mixedVar | 0
  } else {
    return 0
  }
}

/**
 * Effettua la somma di due numeri
 * 
 * @param  number numero1 "primo numero da sommare"
 * @param  number numero2 "secondo numero da sommare"
 * @return number         "risultato"
 */
function sommaNumeri(numero1, numero2)
{
	// === Validazione dei parametri in ingresso
	if(typeof numero1 !== "number" && typeof numero2!=="number")
	{
		return false;
	}

	return numero1 + numero2
}

function sommaListaNumeri()
{
	var totale = 0;

	// --- Per ogni valore passato alla funzione
    for (var i in arguments) {
        
        // --- viene sommato in modo incrementale al totale
        totale += parseInt(arguments[i]);
    }

    return totale;
}

function sommaListaNumeri_by_Array(arLista)
{
	var totale=0;
	for(var i in arLista)
	{
		if(typeof arLista[i] !== 'number') continue;
		totale += parseInt(arLista[i]);
	}
	return totale;
}

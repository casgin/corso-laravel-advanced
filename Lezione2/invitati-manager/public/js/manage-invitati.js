window.addEventListener('load', function () {

    document.getElementById('fldNominativo')
        .addEventListener('keypress', function(ev){

            console.log(ev.keyCode);
            if(ev.keyCode==13)
            {
                // --- vado ad effettuare una chiamata AJAX
                // --- per inserire il nominativo
                var xhr = new XMLHttpRequest();

                xhr.open('POST', '/nominativo/add', true);

                // --- Imposto Header HTTP per trasmettere
                // --- al nostro applicativo laravel il token
                xhr.setRequestHeader('X-CSRF-TOKEN', window.csrfToken);
                xhr.overrideMimeType('text/plain; charset=x-user-defined-binary');



                var jsonData = {
                    'nominativo' : document.getElementById('fldNominativo').value
                };

                // --- CREO una IIFE per estendere l'oggetto xhr e specificare
                // --- il comportamento nel caso dell'evento ReadyStateChange
                // --- dell'oggetto xhr
                xhr.onreadystatechange = (function(req){

                    return function(evt)
                    {
                        // --- verifico che la ma chiamata asincrona sia arrivata ...
                        if(req.readyState == 4)
                        {
                            // --- ... e che il webserver mi abbia risposto con HTTP 200
                            if(req.status === 200)
                            {
                                var responseData = JSON.parse(req.responseText);
                                console.log(req.responseText);
                                console.log(responseData.responseData);
                                if(responseData.responseData.code.indexOf('200')!=-1)
                                {
                                    document.getElementById('msgAggiungiNominativo')
                                        .innerHTML = responseData.responseData.msg;

                                    document.getElementById('fldNominativo').value = '';
                                }
                            }
                        }
                    };

                })(xhr);

                // --- faccio partire la mia chiamata asincrona, passando i dati
                xhr.send(JSON.stringify(jsonData));

            }
        });

});

'use strict';

/**
 * @ngdoc function
 * @name ngAnagraficaApp.controller:AnagraficaCtrl
 * @description
 * # AnagraficaCtrl
 * Controller of the ngAnagraficaApp
 */
angular.module('ngAnagraficaApp')
  .controller('AnagraficaCtrl', function ($location, $scope, $http, ApiEndpoint) {

    // === Se non esiste il token
    if(sessionStorage.getItem('jwt') === null)
    {
      // --- Ti riporto alla pagina di login
      $location.url('/login');
    } else {

      // === Variabile per la gestione del pulsante per inviare i dati
      $scope.hideSubmit = false;
      $scope.sendMessage = '';

      // === Variabile globale che contiene l'elenco dei record da visualizzare in tabella
      $scope.elenco = [];

      // === Richiamo l'elenco degli elementi presenti in anagrafica
      $http({
        method: 'GET',
        url: ApiEndpoint.url.concat('/anagrafica?token=').concat(sessionStorage.getItem('jwt'))

      }).then(function successCallback(response) {

        $scope.elenco = response.data.data;
        console.log($scope.elenco);

      });


      $scope.inviaDati = function () {
        $scope.hideSubmit = true;
        $scope.sendMessage = 'Invio dati in corso ...';

        // --- Dichiaro un oggetto JSON che mi servirà per la chiamata HTTP POST
        var objData = {
          fldRagioneSociale: $scope.fldRagioneSociale,
          fldIndirizzo: $scope.fldIndirizzo,
          fldCitta: $scope.fldCitta,
          fldCap: $scope.fldCap,
          fldProvincia: $scope.fldProvincia,
          fldWebsite: $scope.fldWebsite,
          fldTipo: $scope.fldTipoContatto,
          token: sessionStorage.getItem('jwt')
        };

        console.log(objData);

        // === Effettuo la chiamata HTTP POST verso /anagrafica, in modo da registrare il nuovo record
        $http({
          method: 'POST',
          url: ApiEndpoint.url + '/anagrafica',
          data: objData
        })
          .then(function successCallback(response) {

            // --- se il WS ci ha risposto correttamente
            if (response.data.status === 200) {
              // --- aggiungo il record alla tabella HTML
              $scope.elenco.push({
                ragione_sociale: $scope.fldRagioneSociale,
                indirizzo: $scope.fldIndirizzo,
                citta: $scope.fldCitta,
                id: response.data.idCreated
              });

              // --- visualizzo il messaggio di avvenuto inserimento
              $scope.sendMessage = response.data.msg;

              // --- chiudo la modal dopo 3 secondi
              setTimeout(function () {
                $('#frmInserisciNuovo').modal('hide');
              }, 2000);
            }
          });


      }   // --- end func inviaDati

    }

  });

'use strict';

/**
 * @ngdoc function
 * @name lezione6App.controller:RegistranuovoutenteCtrl
 * @description
 * # RegistranuovoutenteCtrl
 * Controller of the lezione6App
 */
angular.module('lezione6App')
  .controller('RegistranuovoutenteCtrl', function ($scope, $http, ApiEndpoint, $location, getListaAnagrafica) {

    // === Se non esiste il token
    if(localStorage.getItem('jwt') === null)
    {
      // --- Ti riporto alla pagina di login
      $location.url('/login');
    }

    $scope.elenco = [];

    var elenco = getListaAnagrafica.getAllData().then(function (response) {
        $scope.elenco = response.data.data;
        console.log($scope.elenco);
    });





    $scope.registerUser = function()
    {
      var objUserData = {
        nome: $scope.fldNome,
        email: $scope.fldEmail,
        password: $scope.fldPasswd
      };

      console.log(objUserData);
      console.log(ApiEndpoint.url);
      $scope.loadingMsg = 'Invio dati in corso...';

      var config = {
        headers : {
          'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8;'
        }
      };

      // http://techfunda.com/howto/565/http-post-server-request
      // http://tutlane.com/tutorial/angularjs/angularjs-http-post-method-http-post-with-parameters-example
      $http.post(ApiEndpoint.url.concat('/api/auth/register'), objUserData, config)
        .then(function(response){
          console.log(response.data);
          $scope.loadingMsg = '';
        });


    };

  });

'use strict';

/**
 * @ngdoc function
 * @name lezione6App.controller:LoginCtrl
 * @description
 * # LoginCtrl
 * Controller of the lezione6App
 */
angular.module('lezione6App')
  .controller('LoginCtrl', function ($scope, $http, ApiEndpoint) {


    $scope.doLogin = function () {

        console.log('Giusto un riepilogo dei dati della form...');
        console.log($scope.fldEmail);
        console.log($scope.fldPasswd);

      $http({
        method : 'POST',
        url: ApiEndpoint.url + '/auth/login',
        data : {
          email: $scope.fldEmail,
          password: $scope.fldPasswd
        }

      })
      .then(function successCallback(response) {

        console.log(response);
        console.log(response.data.token);

        // --- Memorizzo il token ottenuto
        localStorage.setItem('jwt',response.data.token);
      });

    };    // --- end doLogin


    $scope.checkUserData = function ($scope) {

      $http({
        method: 'POST',
        url:'http://api.anagraficarest.dev:8888/api/user-info',
        data : {
          'token' : localStorage.getItem('jwt')
        }
      }).then(function successCallback(response){
        console.log(response.data);
      });

    };

    $scope.testModel = function() {
      console.log($scope.fldNome);

    }

  });

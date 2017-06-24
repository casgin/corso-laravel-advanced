'use strict';

/**
 * @ngdoc function
 * @name ngAnagraficaApp.controller:LoginCtrl
 * @description
 * # LoginCtrl
 * Controller of the ngAnagraficaApp
 */
angular.module('ngAnagraficaApp')
  .controller('LoginCtrl', function ($scope, $http, ApiEndpoint, $location) {

    $scope.userLogged = false;
    $scope.hideSubmit = false;
    $scope.loginMessage = '';

    $scope.doLogin = function () {

      $scope.hideSubmit = true;
      $scope.loginMessage = 'Login in corso ...';

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
          sessionStorage.setItem('jwt',response.data.token);

          $scope.userLogged = true;
          $scope.loginMessage = '';


        });

    };    // --- end doLogin



  });

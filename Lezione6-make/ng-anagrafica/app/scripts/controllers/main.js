'use strict';

/**
 * @ngdoc function
 * @name ngAnagraficaApp.controller:MainCtrl
 * @description
 * # MainCtrl
 * Controller of the ngAnagraficaApp
 */
angular.module('ngAnagraficaApp')
  .controller('MainCtrl', function ($scope) {

    $scope.loggedUser = false;

    // === Se esiste il token, abilito il menu
    if(localStorage.getItem('jwt') !== null)
    {
      $scope.loggedUser = true;
      console.log('loggedUser true');
      console.log($scope.loggedUser);
      console.log(localStorage.getItem('jwt'));
    }


  });

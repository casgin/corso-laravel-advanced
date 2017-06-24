'use strict';

/**
 * @ngdoc overview
 * @name lezione6App
 * @description
 * # lezione6App
 *
 * Main module of the application.
 */
angular
  .module('lezione6App', [
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch'
  ])
  .config(function ($routeProvider, $locationProvider) {

    // --- Imposto la navigazione in HTML5 Mode
    $locationProvider.hashPrefix('');

    // --- Routing del nostro applicativo
    $routeProvider
      .when('/', {
        templateUrl: 'views/main.html',
        controller: 'MainCtrl',
        controllerAs: 'main'
      })
      .when('/about', {
        templateUrl: 'views/about.html',
        controller: 'AboutCtrl',
        controllerAs: 'about'
      })
      .when('/anagrafica', {
        templateUrl: 'views/anagrafica.html',
        controller: 'AnagraficaCtrl',
        controllerAs: 'anagrafica'
      })
      .when('/login', {
        templateUrl: 'views/login.html',
        controller: 'LoginCtrl',
        controllerAs: 'login'
      })
      .when('/contatti', {
        templateUrl: 'views/contatti.html',
        controller: 'ContattiCtrl',
        controllerAs: 'contatti'
      })
      .when('/registra-nuovo-utente', {
        templateUrl: 'views/registranuovoutente.html',
        controller: 'RegistranuovoutenteCtrl',
        controllerAs: 'registraNuovoUtente'
      })
      .otherwise({
        redirectTo: '/'
      });
  })
  .constant('ApiEndpoint', {
    url: 'http://api.lezione6.dev:8888/api'
  });

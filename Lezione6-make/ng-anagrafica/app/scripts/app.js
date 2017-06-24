'use strict';

/**
 * @ngdoc overview
 * @name ngAnagraficaApp
 * @description
 * # ngAnagraficaApp
 *
 * Main module of the application.
 */
angular
  .module('ngAnagraficaApp', [
    'ngAnimate',
    'ngCookies',
    'ngResource',
    'ngRoute',
    'ngSanitize',
    'ngTouch'
  ])
  .config(function ($routeProvider, $locationProvider) {

    // --- attivo la navigazione/gestione dei routes in modalita HTML5
    $locationProvider.hashPrefix('');

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
      .when('/login', {
        templateUrl: 'views/login.html',
        controller: 'LoginCtrl',
        controllerAs: 'login'
      })
      .when('/anagrafica', {
        templateUrl: 'views/anagrafica.html',
        controller: 'AnagraficaCtrl',
        controllerAs: 'anagrafica'
      })
      .otherwise({
        redirectTo: '/'
      });
  })
  .constant('ApiEndpoint', {
    url: 'http://api.lezione6.dev:8888/api'
  });

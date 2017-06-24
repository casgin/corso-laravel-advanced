'use strict';

/**
 * @ngdoc service
 * @name lezione6App.getListaAnagrafica
 * @description
 * # getListaAnagrafica
 * Factory in the lezione6App.
 */
angular.module('lezione6App')
  .factory('getListaAnagrafica', function ($http, ApiEndpoint) {



    // Public API here
    return {
      getAllData: function () {


        return $http({
          method: 'GET',
          url: ApiEndpoint.url.concat('/anagrafica?token=').concat(localStorage.getItem('jwt'))
        })


      }
    };
  });

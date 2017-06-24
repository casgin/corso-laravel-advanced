'use strict';

describe('Controller: AnagraficaCtrl', function () {

  // load the controller's module
  beforeEach(module('lezione6App'));

  var AnagraficaCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    AnagraficaCtrl = $controller('AnagraficaCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(AnagraficaCtrl.awesomeThings.length).toBe(3);
  });
});

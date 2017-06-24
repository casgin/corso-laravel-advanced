'use strict';

describe('Controller: RegistranuovoutenteCtrl', function () {

  // load the controller's module
  beforeEach(module('lezione6App'));

  var RegistranuovoutenteCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    RegistranuovoutenteCtrl = $controller('RegistranuovoutenteCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(RegistranuovoutenteCtrl.awesomeThings.length).toBe(3);
  });
});

'use strict';

describe('Controller: ContattiCtrl', function () {

  // load the controller's module
  beforeEach(module('lezione6App'));

  var ContattiCtrl,
    scope;

  // Initialize the controller and a mock scope
  beforeEach(inject(function ($controller, $rootScope) {
    scope = $rootScope.$new();
    ContattiCtrl = $controller('ContattiCtrl', {
      $scope: scope
      // place here mocked dependencies
    });
  }));

  it('should attach a list of awesomeThings to the scope', function () {
    expect(ContattiCtrl.awesomeThings.length).toBe(3);
  });
});

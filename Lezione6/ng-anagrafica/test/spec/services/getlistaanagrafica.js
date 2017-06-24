'use strict';

describe('Service: getListaAnagrafica', function () {

  // load the service's module
  beforeEach(module('lezione6App'));

  // instantiate service
  var getListaAnagrafica;
  beforeEach(inject(function (_getListaAnagrafica_) {
    getListaAnagrafica = _getListaAnagrafica_;
  }));

  it('should do something', function () {
    expect(!!getListaAnagrafica).toBe(true);
  });

});

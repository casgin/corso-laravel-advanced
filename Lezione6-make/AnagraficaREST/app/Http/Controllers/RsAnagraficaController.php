<?php

namespace App\Http\Controllers;

use App\Models\Anagrafica;
use Illuminate\Http\Request;

class RsAnagraficaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Anagrafica::paginate(15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // @todo: qui dovremmo validare i dati in input
        $mdlAnagrafica = new Anagrafica();
        $mdlAnagrafica->ragione_sociale     = $request->get('fldRagioneSociale');
        $mdlAnagrafica->indirizzo           = $request->get('fldIndirizzo');
        $mdlAnagrafica->citta               = $request->get('fldCitta');
        $mdlAnagrafica->cap                 = $request->get('fldCap');
        $mdlAnagrafica->provincia           = $request->get('fldProvincia');
        $mdlAnagrafica->website             = $request->get('fldWebsite');
        $mdlAnagrafica->tipo                = $request->get('fldTipo');

        $mdlAnagrafica->save();

        $data = [
            'status' => 200,
            'msg' => 'Record anagrafica inserito',
            'idCreated' => $mdlAnagrafica->id
        ];

        // --- Risposta JSON/P
        return response()
                    ->json( $data,200)
                    ->withCallback($request->input('callback'));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anagrafica  $anagrafica
     * @return \Illuminate\Http\Response
     */
    public function show(Anagrafica $anagrafica)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anagrafica  $anagrafica
     * @return \Illuminate\Http\Response
     */
    public function edit(Anagrafica $anagrafica)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anagrafica  $anagrafica
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anagrafica $anagrafica)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anagrafica  $anagrafica
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anagrafica $anagrafica)
    {
        //
    }
}

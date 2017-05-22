<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BackendController extends Controller
{
    public function addNominativo(Request $request)
    {
        // === Recupero il contenuto "raw" della chiamata asincrona
        $rawdata = $request->getContent();

        // === Converto il contenuto raw in JSON
        $data = json_decode($rawdata, true);

        // === array di risposta
        $responseData = [];

        // === Utilizzo del Model
        $mdl = new \App\Invitati();
        $mdl->nominativo = $data['nominativo'];

        if($mdl->save()) {
            $responseData['code'] = '200';
            $responseData['msg'] = 'Record Correttamente inserito';
        } else {
            $responseData['code'] = '500';
            $responseData['msg'] = 'Errore inserimento Record';
        };

        // === Restituisco la risposta JSON
        return response()
                ->json([
                    'responseData' => $responseData
                ])
                ->withCallback($request->input('callback'));

    }
}

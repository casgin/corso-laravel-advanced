<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use JWTAuthException;



class UserController extends Controller
{
        private $user;

        // === Imposto il model User come parametro in ingresso sul costruttore
        public function __construct(User $user){
            $this->user = $user;
        }

        /**
         * Registro un utente sulla tabella users
         *
         * @param Request $request
         * @return \Illuminate\Http\JsonResponse
         */
        public function register(Request $request){


            // --- creo il record
            $user = $this->user->create([
                'name'      => $request->get('nome'),
                'email'     => $request->get('email'),
                'password'  => bcrypt($request->get('password'))
            ]);

            // --- restituisco JSON risposta
            return response()->json([
                'status'    => true,
                'message'   => 'Utente creato correttamente',
                'data'      => $user
            ]);
        }


    /**
     * Effettua il login utente
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request){

        // --- recupero i campi dalla chiamata HTTP POST
        $credentials = $request->only('email', 'password');

        $token = null;

        try {

            // --- Vado ad autenticare l'utente, ottenendo un token
            $token = JWTAuth::attempt($credentials);

            // --- se le credenziali sono errate, NON otteniamo il token
            if(!$token) {

                // --- emetto risposta HTTP 422 (http://www.restpatterns.org/HTTP_Status_Codes/422_-_Unprocessable_Entity)
                return response()->json(['credenziali_accesso-errate'], 422);
            }


        } catch (JWTAuthException $e) {
            // --- emetto risposta HTTP 500, se ci sono impedimenti nella creazione del token
            // --- http://www.restpatterns.org/HTTP_Status_Codes/500_-_Internal_Server_Error
            return response()->json(['failed_to_create_token'], 500);
        }

        // --- se tutto va a buon fine, restituisco il token
        return response()->json(compact('token'));
    }


    // === Recupera le informazioni di un utente, recuperate via token
    public function getAuthUser(Request $request){

        $user = JWTAuth::toUser($request->token);

        return response()->json(['result' => $user]);
    }


}

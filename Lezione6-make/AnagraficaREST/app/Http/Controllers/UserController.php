<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use JWTAuth;
use JWTAuthException;


class UserController extends Controller
{
    private $user;

    // === vedi config/jwt.php sul model utilizzato per parlare con gli utenti
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    /**
     * Registra un nuovo utente
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
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

    public function login(Request $request)
    {
        // === vado a recuperare email e password
        $credentials = $request->only('email', 'password');

        $token = null;

        try
        {
            // --- Vado ad autenticare l'utente, ottenendo un token
            $token = JWTAuth::attempt($credentials);

            // --- se le credenziali sono errate, NON otteniamo il token
            if (!$token) {

                // --- emetto risposta HTTP 422
                // (http://www.restpatterns.org/HTTP_Status_Codes/422_-_Unprocessable_Entity)
                return response()->json(['credenziali_accesso-errate'], 422);
            }

        }
        catch(JWTAuthException $e)
        {
            // --- emetto risposta HTTP 500, se ci sono impedimenti nella creazione del token
            // --- http://www.restpatterns.org/HTTP_Status_Codes/500_-_Internal_Server_Error
            return response()->json(['failed_to_create_token'], 500);
        }


        // --- se tutto va a buon fine, restituisco il token
        return response()->json(compact('token'));


    }   // end login

    public function getAuthUser(Request $request)
    {
        // === Recupera le informazioni utente, in base al token passato
        $user = JWTAuth::toUser($request->token);

        return response()->json([
            'status' => 200,
            'msg'   => 'Utente trovato',
            'datiUtente' => $user,
        ]);

    }

    public function angularDemo()
    {
        return response()->json([
            'status' => 200,
            'msg'   => 'angularDemo',
            'listaBrani'    => [
                ['titolo' => 'volare'],
                ['titolo' => 'gli spari sopra'],
                ['titolo' => 'non lo so'],
            ]

        ]);

    }

}

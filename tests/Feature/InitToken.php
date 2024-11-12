<?php

namespace Tests\Feature;

use App\Models\Token;

class InitToken
{
    public static function initToken(): Token
    {
        // Array simulado para construir um objeto Token
        $tokenArray = [
            'access_token' => 'some_access_token',
            'expires_in' => 3600,
            'senha_expirada' => false,
            'token_id' => 'token_id_123',
            'token_type' => 'bearer',
            'user_id' => 1,
        ];

        // Cookies simulados
        $cookieX = 'cookieX_value';
        $cookieBIG = 'cookieBIG_value';

        // Criando um objeto Token para simular o retorno do método authenticate
        return new Token($tokenArray, $cookieX, $cookieBIG);
    }
}

<?php

namespace App\Services;

use App\Models\Token;
use App\Services\Interfaces\ITokenService;
use Illuminate\Support\Facades\Http;

class TokenService implements ITokenService
{
    /**
     * Função responsável por autenticar o usuário
     */
    public function autenticate(): ?Token
    {
        $url = env('URL_GIU') . '/token';

        $data = [
            "grant_type" => "password",
            "username" => env('USER_USERNAME'),
            "password" => env('USER_PASSWORD')
        ];

        $res = Http::post($url, $data);

        if ($res->successful()) {
            $cookieX = $res->cookies()->toArray()[0]['Value'];
            $cookieBIG = $res->cookies()->toArray()[1]['Value'];
            $token = new Token($res->json(), $cookieX, $cookieBIG);
        } else {
            return null;
        }

        return $token;
    }
}

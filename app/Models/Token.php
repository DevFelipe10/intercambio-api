<?php

namespace App\Models;

class Token
{
    private $access_token;
    private $expires_in;
    private $senha_expirada;
    private $token_id;
    private $token_type;
    private $user_id;
    private $cookieX;
    private $cookieBIG;

    public function __construct(array $array, string $cookieX, string $cookieBIG)
    {
        $this->access_token = $array['access_token'];
        $this->expires_in = $array['expires_in'];
        $this->senha_expirada = $array['senha_expirada'];
        $this->token_id = $array['token_id'];
        $this->token_type = $array['token_type'];
        $this->user_id = $array['user_id'];
        $this->cookieX = $cookieX;
        $this->cookieBIG = $cookieBIG;
    }

    /**
     * Get the value of access_token
     */
    public function getAccess_token()
    {
        return $this->access_token;
    }

    public function getCookieX()
    {
        return $this->cookieX;
    }

    public function getCookieBIG()
    {
        return $this->cookieBIG;
    }
}

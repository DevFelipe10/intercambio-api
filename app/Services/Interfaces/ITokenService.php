<?php

namespace App\Services\Interfaces;

use App\Models\Token;

interface ITokenService
{
    public function autenticate(): ?Token;
}

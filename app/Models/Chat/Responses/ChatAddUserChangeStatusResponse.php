<?php

namespace App\Models\Chat\Responses;


class ChatAddUserChangeStatusResponse
{
    public $fl_retorno;

    public function __construct(array $array)
    {
        $this->fl_retorno = $array['flRetorno'];
    }

    public function toArray(): array{
        return [
            'flRetorno' => $this->fl_retorno
        ];
    }

}

<?php

namespace App\Models\Chat\Responses;


class ChatOpenResponse
{
    public $link_sala_usuario;

    public function __construct(array $array)
    {
        $this->link_sala_usuario = $array['linkSalaUsuario'];
    }

    public function toArray(): array{
        return [
            'linkSalaUsuario' => $this->link_sala_usuario
        ];
    }

}

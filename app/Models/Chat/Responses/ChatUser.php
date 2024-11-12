<?php

namespace App\Models\Chat\Responses;


class ChatUser
{
    public $id_usuario;
    public $nome;
    public $cd_unimed;
    public $ds_email;

    public function __construct(array $array)
    {
        $this->id_usuario = $array['idUsuario'] ?? null;
        $this->nome = $array['nome'] ?? null;
        $this->cd_unimed = $array['cdUnimed'] ?? null;
        $this->ds_email = $array['dsEmail'] ?? null;
    }

    public function toArray(): array{
        return [
            'idUsuario' => $this->id_usuario,
            'nome' => $this->nome,
            'cdUnimed' => $this->cd_unimed,
            'dsEmail' => $this->ds_email
        ];
    }

}

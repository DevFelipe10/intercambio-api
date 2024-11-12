<?php

namespace App\Models\Chat\Responses;

class ChatUnitaryUserSearchResponse
{
    public $id_usuario;
    public $nome;
    public $cd_unimed;
    public $ds_email;
    public $chat_exception;

    public function __construct(array $arrayIn)
    {
        $array = $arrayIn['usuario'];
        $this->id_usuario = $array['idUsuario'];
        $this->nome = $array['nome'];
        $this->cd_unimed = $array['cdUnimed'];
        $this->ds_email = $array['dsEmail'];
        $this->chat_exception = $array['chatException'] ??  'NO_CHAT_EXCEPTION';
    }

    public function toArray(): array{
        return [
            'idUsuario' => $this->id_usuario,
            'nome' => $this->nome,
            'cdUnimed' => $this->cd_unimed,
            'dsEmail' => $this->ds_email,
            'chatException' => $this->chat_exception
        ];
    }

}

<?php

namespace App\Models\Chat\Responses;


class ChatMessage
{
    /**
     * @var ChatUser $usuario
     */
    public $usuario;
    public $codigo;
    public $data_envio;
    public $mensagem;

    public function __construct(array $array)
    {
        $emissor = $array['emissor'];
        $this->codigo = $array['codigo'];
        $this->data_envio = $array['dataEnvio'];
        $this->mensagem = $array['mensagem'];
        $this->usuario = new ChatUser($emissor);
    }

    public function toArray(): array{
        return [
            'usuario' => $this->usuario->toArray(),
            'codigo' => $this->codigo,
            'dataEnvio' => $this->data_envio,
            'mensagem' => $this->mensagem
        ];
    }

}

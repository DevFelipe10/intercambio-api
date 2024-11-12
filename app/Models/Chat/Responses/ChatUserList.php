<?php

namespace App\Models\Chat\Responses;


class ChatUserList
{
    /**
     * @var ChatUser $usuario
     */
    public $usuario;
    public $existe_transacao;
    public $numero_transacao;
    public $codigo_unimed_solicitante;
    public $mensagem;

    public function __construct(array $arrayIn)
    {
        $usuario = $arrayIn['usuario'] ?? [];
        $array = $arrayIn['idSalaAutorizacao'];
        $this->usuario = new ChatUser($usuario);
        $this->existe_transacao = $array['existeTransacao'];
        $this->mensagem = $array['mensagem'];
        $this->numero_transacao = $array['numeroTransacao'];
        $this->codigo_unimed_solicitante = $array['codigoUnimedSolicitante'];
    }

    public function toArray(): array{
        return [
            'usuario' => $this->usuario->toArray(),
            'idSalaAutorizacao' => [
                'existeTransacao' => $this->existe_transacao,
                'mensagem' => $this->mensagem,
                'numeroTransacao' => $this->numero_transacao,
                'codigoUnimedSolicitante' => $this->codigo_unimed_solicitante
            ]
        ];
    }

}

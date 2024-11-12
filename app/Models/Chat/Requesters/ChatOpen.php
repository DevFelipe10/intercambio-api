<?php

namespace App\Models\Chat\Requesters;

/**
 * Class responsable to save body request from /abrirSala endpoint
 */
class ChatOpen
{
    public $id_usuario;
    public $array_id_usuarios_conversa;
    public $cd_unimed_executora;
    public $numero_transacao;

    public function __construct(array $array)
    {
        $this->id_usuario = $array['idUsuario'];
        $this->array_id_usuarios_conversa = $array['arrayIdUsuariosAdicionadosNaConvesa'];
        $this->cd_unimed_executora = $array['cdUnimedExecutora'];
        $this->numero_transacao = $array['numeroTransacao'];
    }

    public function toArray(): array{
        return [
            'idUsuario' => $this->id_usuario,
            'arrayIdUsuariosAdicionadosNaConvesa' => $this->array_id_usuarios_conversa,
            'numeroTransacao' => $this->numero_transacao,
            'cdUnimedExecutora' => $this->cd_unimed_executora
        ];
    }


}

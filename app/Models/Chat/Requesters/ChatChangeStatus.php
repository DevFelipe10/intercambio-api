<?php

namespace App\Models\Chat\Requesters;

/**
 * Class responsable to save body request from /adicionarUsuariosSala endpoint
 */
class ChatChangeStatus
{
    public $tipo_funcao;
    public $array_id_usuarios;
    public $cd_unimed_executora;
    public $numero_transacao;

    public function __construct(array $array)
    {
        $this->tipo_funcao = $array['tipo_funcao'];
        $this->array_id_usuarios = $array['arrayIdUsuarios'];
        $this->cd_unimed_executora = $array['cdUnimedExecutora'];
        $this->numero_transacao = $array['numeroTransacao'];
    }

    public function toArray(): array{
        return [
            'tipo_funcao' => $this->tipo_funcao,
            'arrayIdUsuarios' => $this->array_id_usuarios,
            'numeroTransacao' => $this->numero_transacao,
            'cdUnimedExecutora' => $this->cd_unimed_executora
        ];
    }
}

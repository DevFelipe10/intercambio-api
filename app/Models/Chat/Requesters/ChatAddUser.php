<?php

namespace App\Models\Chat\Requesters;

/**
 * Class responsable to save body request from /adicionarUsuariosSala endpoint
 */
class ChatAddUser
{
    public $array_id_usuarios_adicionados;
    public $cod_grupo_conversa;
    public $array_id_usuarios_principais;
    public $cd_unimed_executora;
    public $numero_transacao;

    public function __construct(array $array)
    {
        $this->array_id_usuarios_adicionados = $array['arrayIdUsuarioAdicionados'];
        $this->cod_grupo_conversa = $array['codGrupoConversa'];
        $this->array_id_usuarios_principais = $array['arrayIdUsuariosPrincipais'];
        $this->cd_unimed_executora = $array['cdUnimedExecutora'];
        $this->numero_transacao = $array['numeroTransacao'];
    }

    public function toArray(): array{
        return [
            'arrayIdUsuarioAdicionados' => $this->array_id_usuarios_adicionados,
            'codGrupoConversa' => $this->cod_grupo_conversa,
            'arrayIdUsuariosPrincipais' => $this->array_id_usuarios_principais,
            'numeroTransacao' => $this->numero_transacao,
            'cdUnimedExecutora' => $this->cd_unimed_executora
        ];
    }
}

<?php

namespace App\Models\Chat\Requesters;

/**
 * Class responsable to save data request from endpoints:
 *  /recuperarLinkHistoricoSala
 *  /definirSalaPendente
 */
class ChatLinkAndPendence
{
    public $id_usuario;
    public $cd_unimed_executora;
    public $numero_transacao;

    public function __construct(array $array)
    {
        $this->id_usuario = $array['idUsuario'];
        $this->cd_unimed_executora = $array['cdUnimedExecutora'];
        $this->numero_transacao = $array['numeroTransacao'];
    }

    public function toArray(): array{
        return [
            'idUsuario' => $this->id_usuario,
            'numeroTransacao' => $this->numero_transacao,
            'cdUnimedExecutora' => $this->cd_unimed_executora
        ];
    }

}

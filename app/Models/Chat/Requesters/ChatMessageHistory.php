<?php

namespace App\Models\Chat\Requesters;

/**
 * Class responsable to save data request from /mensagemHistoricoChat endpoint
 */
class ChatMessageHistory
{
    public $id_usuario;
    public $cd_unimed_executora;
    public $numero_transacao;
    public $flag_msgs_admin;

    public function __construct(array $array)
    {
        $this->id_usuario = $array['idUsuario'];
        $this->cd_unimed_executora = $array['cdUnimedExecutora'];
        $this->numero_transacao = $array['numeroTransacao'];
        $this->flag_msgs_admin = $array['flagMsgsAdmin'];
    }

    public function toArray(): array{
        return [
            'idUsuario' => $this->id_usuario,
            'numeroTransacao' => $this->numero_transacao,
            'cdUnimedExecutora' => $this->cd_unimed_executora,
            'flagMsgsAdmin' => $this->flag_msgs_admin
        ];
    }


}

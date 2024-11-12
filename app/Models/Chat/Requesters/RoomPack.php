<?php

namespace App\Models\Chat\Requesters;

/**
 * Class responsable to save data request from /enviarMensagem endpoint
 */
class RoomPack
{
    public $id_usuario;
    public $numero_transacao;
    public $cd_unimed_executora;

    public function __construct(array $array)
    {
        $arraySala = $array['sala'];
        $this->id_usuario = $array['idUsuario'];
        $this->numero_transacao = $arraySala['numeroTransacao'];
        $this->cd_unimed_executora = $arraySala['cdUnimedExecutora'];
    }

    public function toArray(): array{
        return [
            'sala' => [
                "numeroTransacao" => $this->numero_transacao,
                "cdUnimedExecutora" => $this->cd_unimed_executora
            ],
            'idUsuario' => $this->id_usuario
        ];
    }


}

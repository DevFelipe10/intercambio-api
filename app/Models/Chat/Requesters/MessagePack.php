<?php

namespace App\Models\Chat\Requesters;

/**
 * Class responsable to save data request from /enviarMensagem endpoint
 */
class MessagePack
{
    public $id_usuario_emissor;
    public $mensagem;
    public $numero_transacao;
    public $cd_unimed_executora;

    public function __construct(array $array)
    {
        $arraySala = $array['sala'];
        $this->id_usuario_emissor = $array['idUsuarioEmissor'];
        $this->mensagem = $array['mensagem'];
        $this->numero_transacao = $arraySala['numeroTransacao'];
        $this->cd_unimed_executora = $arraySala['cdUnimedExecutora'];
    }

    public function toArray(): array{
        return [
            'idUsuarioEmissor' => $this->id_usuario_emissor,
            'mensagem' => $this->mensagem,
            'sala' => [
                "numeroTransacao" => $this->numero_transacao,
                "cdUnimedExecutora" => $this->cd_unimed_executora
            ]
        ];
    }


}

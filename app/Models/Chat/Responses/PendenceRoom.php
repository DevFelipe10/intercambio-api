<?php

namespace App\Models\Chat\Responses;


class PendenceRoom
{
    public $existe_sala;
    public $mensagem;
    public $cd_unimed;
    public $nm_unimed;
    public $fl_passar_pendencia;
    public $numero_transacao;
    public $cd_unimed_executora;

    public function __construct(array $arrayIn)
    {
        
        $unimedPendente = $arrayIn['unimedPendente'] ?? [];
        $sala = $arrayIn['sala'] ?? [];

        $this->existe_sala = $arrayIn['existeSala'];
        $this->mensagem = $arrayIn['mensagem'];
        $this->fl_passar_pendencia = $arrayIn['flPassarPendencia'];

        $this->cd_unimed = $unimedPendente['cdUnimed'];
        $this->nm_unimed = $unimedPendente['nmUnimed'];

        $this->numero_transacao = $sala['numeroTransacao'];
        $this->cd_unimed_executora = $sala['cdUnimedExecutora'];
    }

    public function toArray(): array{
        return [
            "existeSala" => $this->existe_sala,
            "mensagem" => $this->mensagem,
            "unimedPendente" => [
                "cdUnimed" => $this->cd_unimed,
                "nmUnimed" => $this->nm_unimed
            ],
            "flPassarPendencia" => $this->fl_passar_pendencia,
            "sala" => [
                "numeroTransacao" => $this->numero_transacao,
                "cdUnimedExecutora" => $this->cd_unimed_executora
            ]
        ];
    }

}

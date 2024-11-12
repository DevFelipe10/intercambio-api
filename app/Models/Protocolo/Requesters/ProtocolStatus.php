<?php

namespace App\Models\Protocolo\Requesters;

/**
 * Class responsable to save body request from /consulta-status endpoint
 */
class ProtocolStatus
{
    /**
     * @var Transaction $transacao
     */
    private $transacao;
    public $cd_unimed;
    public $id_benef;
    public $nr_protocolo;

    public function __construct(array $array)
    {
        $consulta = $array['consulta_status_protocolo'];
        $this->transacao = new Transaction($array['cabecalho_transacao']);
        $this->id_benef = $consulta['id_benef'];
        $this->nr_protocolo = $consulta['nr_protocolo'];
        $this->cd_unimed = $consulta['cd_unimed'];
    }

    public function toArray(): array{
        return [
            'id_benef' => $this->id_benef,
            'nr_protocolo' => $this->nr_protocolo,
            'cd_unimed' => $this->cd_unimed,
        ];
    }

    public function getTransacao(): Transaction{
        return $this->transacao;
    }

}

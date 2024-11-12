<?php

namespace App\Models\Protocolo\Requesters;

/**
 * Class responsable to save body request from /cancelamento endpoint
 */
class ProtocolCancel
{
    /**
     * @var Transaction $transacao
     */
    private $transacao;
    public $cd_unimed;
    public $id_benef;
    public $nr_protocolo;
    public $motivo_cancelamento;

    public function __construct(array $array)
    {
        $cancelamento = $array['cancelamento'];
        $this->transacao = new Transaction($array['cabecalho_transacao']);
        $this->cd_unimed = $cancelamento['cd_unimed'];
        $this->id_benef = $cancelamento['id_benef'];
        $this->nr_protocolo = $cancelamento['nr_protocolo'];
        $this->motivo_cancelamento = $cancelamento['motivo_cancelamento'];
    }

    public function toArray(): array{
        return [
            'cd_unimed' => $this->cd_unimed,
            'id_benef' => $this->id_benef,
            'nr_protocolo' => $this->nr_protocolo,
            'motivo_cancelamento' => $this->motivo_cancelamento,
        ];
    }

    public function getTransacao(): Transaction{
        return $this->transacao;
    }

}

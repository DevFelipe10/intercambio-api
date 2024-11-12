<?php

namespace App\Models\Protocolo\Requesters;

/**
 * Class responsable to save body request from /complemento-protocolo endpoint
 */
class ProtocolComplement
{
    /**
     * @var Transaction $transacao
     */
    private $transacao;
    public $cd_unimed;
    public $id_benef;
    public $nr_protocolo;
    public $mensagem;
    public $nr_transacao_intercambio;
    public $id_resposta;

    public function __construct(array $array)
    {
        $complement = $array['pedido_complemento_protocolo'];
        $this->transacao = new Transaction($array['cabecalho_transacao']);
        $this->cd_unimed = $complement['cd_unimed'];
        $this->id_benef = $complement['id_benef'];
        $this->nr_transacao_intercambio = $complement['nr_transacao_intercambio'];
        $this->nr_protocolo = $complement['nr_protocolo'];
        $this->mensagem = $complement['mensagem'];
        $this->id_resposta = $complement['id_resposta'];
    }

    public function toArray(): array{
        return [
            'id_benef' => $this->id_benef,
            'nr_transacao_intercambio' => $this->nr_transacao_intercambio,
            'nr_protocolo' => $this->nr_protocolo,
            'mensagem' => $this->mensagem,
            'id_resposta' => $this->id_resposta,
        ];
    }

    public function getTransacao(): Transaction{
        return $this->transacao;
    }

}

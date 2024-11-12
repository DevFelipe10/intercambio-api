<?php

namespace App\Models\Protocolo\Requesters;

/**
 * Class responsable to save body request from /resposta-atendimento endpoint
 */
class ProtocolAnswer
{
    /**
     * @var Transaction $transacao
     */
    private $transacao;
    public $cd_unimed;
    public $id_benef;
    public $nr_protocolo;
    public $id_resposta;
    public $nr_transacao_origem_benef;
    public $nr_transacao_intercambio;
    public $mensagem;

    public function __construct(array $array)
    {
        $resposta = $array['resposta_atendimento'];
        $this->transacao = new Transaction($array['cabecalho_transacao']);
        $this->cd_unimed = $resposta['cd_unimed'];
        $this->id_benef = $resposta['id_benef'];
        $this->nr_transacao_intercambio = $resposta['nr_transacao_intercambio'];
        $this->nr_transacao_origem_benef = $resposta['nr_transacao_intercambio'];
        $this->nr_protocolo = $resposta['nr_protocolo'];
        $this->mensagem = $resposta['mensagem'];
        $this->id_resposta = $resposta['id_resposta'];
    }

    public function toArray(): array{
        return [
            'cd_unimed' => $this->cd_unimed,
            'id_benef' => $this->id_benef,
            'nr_transacao_origem_benef' => $this->nr_transacao_intercambio,
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

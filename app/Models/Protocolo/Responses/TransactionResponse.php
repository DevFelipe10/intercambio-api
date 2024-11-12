<?php

namespace App\Models\Protocolo\Responses;

/**
 * Class responsable to save majority "cabecalho_transacao" responses data
 */
class TransactionResponse
{
    public $cd_transacao, $tp_cliente, $cd_uni_origem, $cd_uni_destino, $nr_ans;
    public $nr_transacao_prestadora, $id_usuario, $nr_versao_protocolo;

    public function __construct(array $array)
    {
        $this->cd_transacao = $array['cd_transacao'];
        $this->tp_cliente = $array['tp_cliente'];
        $this->cd_uni_origem = $array['cd_uni_origem'];
        $this->cd_uni_destino = isset($array['cd_uni_destino']) ? $array['cd_uni_destino'] : null;
        $this->nr_ans = $array['nr_ans'];
        $this->nr_transacao_prestadora = $array['nr_transacao_prestadora'];
        $this->id_usuario = $array['id_usuario'];
        $this->nr_versao_protocolo = $array['nr_versao_protocolo'];
    }

    public function toArray(): array{
        return (array) $this;
    }

}

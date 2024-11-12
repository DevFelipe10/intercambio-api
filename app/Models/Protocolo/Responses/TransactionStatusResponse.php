<?php

namespace App\Models\Protocolo\Responses;

/**
 * Class responsable to save "cabecalho_transacao" from /consulta-status request
 */
class TransactionStatusResponse
{
    public $cd_transacao, $tp_cliente, $cd_uni_origem, $cd_uni_destino, $nr_ans;
    public $nr_transacao_prestadora, $dt_sol_protocolo, $nr_versao_protocolo;

    public function __construct(array $array)
    {
        $this->cd_transacao = $array['cd_transacao'];
        $this->tp_cliente = $array['tp_cliente'];
        $this->cd_uni_origem = $array['cd_uni_origem'];
        $this->cd_uni_destino = $array['cd_uni_destino'];
        $this->nr_ans = $array['nr_ans'];
        $this->nr_transacao_prestadora = $array['nr_transacao_prestadora'];
        $this->dt_sol_protocolo = $array['dt_sol_protocolo'];
        $this->nr_versao_protocolo = $array['nr_versao_protocolo'];
    }

    public function toArray(): array{
        return (array) $this;
    }

}

<?php

namespace App\Models\Protocolo\Requesters;

class Transaction
{
    public $cd_transacao, $tp_cliente, $cd_uni_origem, $cd_uni_destino, $nr_ans;
    public $nr_transacao_prestadora, $data, $id_usuario, $nr_versao_protocolo;

    public function __construct(array $array)
    {
        $this->cd_transacao = $array['cd_transacao'];
        $this->tp_cliente = $array['tp_cliente'];
        $this->cd_uni_origem = $array['cd_uni_origem'];
        $this->cd_uni_destino = isset($array['cd_uni_destino']) ? $array['cd_uni_destino'] : null;
        $this->nr_ans = isset($array['nr_ans']) ? $array['nr_ans'] : null;
        $this->nr_transacao_prestadora = $array['nr_transacao_prestadora'];
        if(isset($array['dt_manifestacao'])) $this->data = $array['dt_manifestacao'];
        else if(isset($array['dt_cancelamento'])) $this->data = $array['dt_cancelamento'];
        $this->id_usuario = $array['id_usuario'];
        $this->nr_versao_protocolo = $array['nr_versao_protocolo'];
    }

    public function toArray($isCancel = false): array
    {
        $result = [];

        if ($this->cd_transacao !== null) {
            $result['cd_transacao'] = $this->cd_transacao;
        }
        if ($this->tp_cliente !== null) {
            $result['tp_cliente'] = $this->tp_cliente;
        }
        if ($this->cd_uni_origem !== null) {
            $result['cd_uni_origem'] = $this->cd_uni_origem;
        }
        if ($this->cd_uni_destino !== null) {
            $result['cd_uni_destino'] = $this->cd_uni_destino;
        }
        if ($this->nr_ans !== null) {
            $result['nr_ans'] = $this->nr_ans;
        }
        if ($this->nr_transacao_prestadora !== null) {
            $result['nr_transacao_prestadora'] = $this->nr_transacao_prestadora;
        }
        if ($this->data !== null) {
            if($isCancel){
                $result['dt_cancelamento'] = $this->data;
            }
            else {
                $result['dt_manifestacao'] = $this->data;
            }
        }
        if ($this->id_usuario !== null) {
            $result['id_usuario'] = $this->id_usuario;
        }
        if ($this->nr_versao_protocolo !== null) {
            $result['nr_versao_protocolo'] = $this->nr_versao_protocolo;
        }

        return $result;
    }

    public function getCd_transacao(): string{
        return $this->cd_transacao;
    }

}

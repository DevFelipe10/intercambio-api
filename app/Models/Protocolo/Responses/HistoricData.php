<?php

namespace App\Models\Protocolo\Responses;

/**
 * Class responsable to save all the protocol history data
 */
class HistoricData
{

    public $nr_transacao_prestadora = null;
    public $id_usuario = null;
    public $nr_versao_protocolo = null;
    public $dt_manifestacao = null;
    public $nr_protocolo = null;
    public $id_resposta = null;
    public $id_sistema = null;

    public function __construct(array $array)
    {
        $this->nr_transacao_prestadora = $array['nr_transacao_prestadora'];
        $this->id_usuario = $array['id_usuario'];
        $this->nr_versao_protocolo = $array['nr_versao_protocolo'];
        $this->dt_manifestacao = $array['dt_manifestacao'];
        $this->nr_protocolo = $array['nr_protocolo'];
        $this->id_sistema = $array['id_sistema'];
        $this->id_resposta = isset($array['id_resposta']) ? $array['id_resposta'] : null;

    }

    public function toArray(): array
    {
        return [
            'nr_transacao_prestadora' => $this->nr_transacao_prestadora,
            'id_usuario' => $this->id_usuario,
            'nr_versao_protocolo' => $this->nr_versao_protocolo,
            'dt_manifestacao' => $this->dt_manifestacao,
            'nr_protocolo' => $this->nr_protocolo,
            'id_resposta' => $this->id_resposta,
            'id_sistema' => $this->id_sistema,
        ];
    }
}

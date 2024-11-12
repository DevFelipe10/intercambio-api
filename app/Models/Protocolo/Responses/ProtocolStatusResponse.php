<?php

namespace App\Models\Protocolo\Responses;

/**
 * Class responsable to save protocol status response data - /consulta-status
 */
class ProtocolStatusResponse
{
    /**
     * @var TransactionStatusResponse $transacao
     */
    private $transacao;
    public $cd_unimed = null;
    public $id_benef = null;
    public $nome = null;
    public $tp_manifestacao = null;
    public $tp_categoria_manifestacao = null;
    public $nr_protocolo = null;
    public $id_resposta = null;
    public $num_trans_interc_prestadora = null;
    public $num_trans_origem_beneficiario = null;
    public $id_origem_resposta = null;
    public $id_usuario = null;
    public $dt_solicitacao_protocolo = null;
    public $mensagem = null;

    public function __construct(array $array)
    {
        $response = $array['resposta_consulta_status_protocolo'];
        $this->transacao = new TransactionStatusResponse($array['cabecalho_transacao']);
        $this->cd_unimed = $response['cd_unimed'];
        $this->id_benef = $response['id_benef'];
        $this->nome = $response['nome'];
        $this->tp_manifestacao = $response['tp_manifestacao'];
        $this->tp_categoria_manifestacao = $response['tp_categoria_manifestacao'];
        $this->nr_protocolo = $response['nr_protocolo'];
        $this->id_resposta = $response['id_resposta'];
        $this->num_trans_interc_prestadora = $response['num_trans_interc_prestadora'];
        $this->num_trans_origem_beneficiario = $response['num_trans_origem_beneficiario'];
        $this->id_origem_resposta = $response['id_origem_resposta'];
        $this->id_usuario = $response['id_usuario'];
        $this->dt_solicitacao_protocolo = $response['dt_solicitacao_protocolo'];
        $this->mensagem = $response['mensagem'];
    }

    public function toArray(): array
    {
        return [
            'cd_unimed' => $this->cd_unimed,
            'id_benef' => $this->id_benef,
            'nome' => $this->nome,
            'tp_manifestacao' => $this->tp_manifestacao,
            'tp_categoria_manifestacao' => $this->tp_categoria_manifestacao,
            'nr_protocolo' => $this->nr_protocolo,
            'id_resposta' => $this->id_resposta,
            'num_trans_interc_prestadora' => $this->num_trans_interc_prestadora,
            'num_trans_origem_beneficiario' => $this->num_trans_origem_beneficiario,
            'id_origem_resposta' => $this->id_origem_resposta,
            'id_usuario' => $this->id_usuario,
            'dt_solicitacao_protocolo' => $this->dt_solicitacao_protocolo,
            'mensagem' => $this->mensagem,
        ];
    }

}

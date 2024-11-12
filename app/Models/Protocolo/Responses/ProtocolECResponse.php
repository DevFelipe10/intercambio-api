<?php

namespace App\Models\Protocolo\Responses;

/**
 * Class responsable to save Execution and Cancel responses data - E.C.
 *  /encaminhar-execucao
 *  /cancelamento
 */
class ProtocolECResponse
{
    /**
     * @var TransactionResponse $transacao
     */
    private $transacao;
    public $cd_unimed = null;
    public $id_benef = null;
    public $id_resposta = null;
    public $nr_protocolo = null;
    public $id_sistema = null;

    public function __construct(array $array)
    {
        $response = $array['confirmacao'] ?? $array['cancelamento'];
        $this->transacao = new TransactionResponse($array['cabecalho_transacao']);
        $this->cd_unimed = $response['cd_unimed'];
        $this->id_benef = $response['id_benef'];
        $this->id_resposta = isset($response['id_resposta']) ? $response['id_resposta'] : null;
        $this->nr_protocolo = $response['nr_protocolo'];
        $this->id_sistema = $response['id_sistema'];
    }

    public function toArray(): array
    {
        return [
            'id_benef' => $this->id_benef,
            'cd_unimed' => $this->cd_unimed,
            'id_resposta' => $this->id_resposta,
            'nr_protocolo' => $this->nr_protocolo,
            'id_sistema' => $this->id_sistema,
        ];
    }

}

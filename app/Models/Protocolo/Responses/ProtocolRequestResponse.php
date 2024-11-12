<?php

namespace App\Models\Protocolo\Responses;

/**
 * Class responsable to save protocol request response data - /solicitar-protocolo
 */
class ProtocolRequestResponse
{
    /**
     * @var TransactionResponse $transacao
     */
    public $transacao;
    public $cd_unimed, $id_benef, $nr_protocolo, $id_resposta, $mensagem, $id_sistema;

    public function __construct(array $array)
    {
        $respostaSolicitar = $array['resposta_solicitar_protocolo'];
        $this->transacao = new TransactionResponse($array['cabecalho_transacao']);
        $this->cd_unimed = $respostaSolicitar['cd_unimed'];
        $this->id_benef = $respostaSolicitar['id_benef'];
        $this->nr_protocolo = $respostaSolicitar['nr_protocolo'];
        $this->id_resposta = $respostaSolicitar['id_resposta'];
        $this->mensagem = $respostaSolicitar['mensagem'];
        $this->id_sistema = $respostaSolicitar['id_sistema'] ?? null;
    }

    /**
     *
     * @return array<ProtocolRequestResponse>
     */
    public function toArray()
    {
        return [
            'cd_unimed' => $this->cd_unimed,
            'id_benef' => $this->id_benef,
            'nr_protocolo' => $this->nr_protocolo,
            'id_resposta' => $this->id_resposta,
            'mensagem' => $this->mensagem,
            'id_sistema' => $this->id_sistema,
        ];
    }

}

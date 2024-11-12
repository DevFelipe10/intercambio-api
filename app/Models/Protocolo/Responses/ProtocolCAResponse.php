<?php

namespace App\Models\Protocolo\Responses;

/**
 * Class responsable to save Complement and Answer responses data - C.A.
 *  /complemento-protocolo
 *  /resposta-atendimento
 */
class ProtocolCAResponse
{
    /**
     * @var TransactionResponse $transacao
     */
    private $transacao;
    public $cd_unimed = null;
    public $id_benef = null;
    public $id_origem_resposta = null;

    public function __construct(array $array)
    {
        $response = isset($array['resposta_atendimento']) ? $array['resposta_atendimento'] : $array['resposta_complemento'] ;
        $this->transacao = new TransactionResponse($array['cabecalho_transacao']);
        $this->cd_unimed = $response['cd_unimed'];
        $this->id_benef = $response['id_benef'];
        $this->id_origem_resposta = isset($response['id_origem_resposta']) ? $response['id_origem_resposta'] : null;
    }

    public function toArray(): array
    {
        return [
            'id_benef' => $this->id_benef,
            'cd_unimed' => $this->cd_unimed,
            'id_origem_resposta' => $this->id_origem_resposta,
        ];
    }

}

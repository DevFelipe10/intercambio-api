<?php

namespace App\Models\Protocolo\Responses;

/**
 * Class responsable to save protocol history response data - /consulta-historico
 */
class ProtocolHistoryResponse
{
    /**
     * @var TransactionResponse $transacao
     */
    private $transacao;
    /**
     * @var HistoricData[] $consulta_historico
     */
    public $consulta_historico;

    public function __construct(array $array)
    {
        $resposta = $array['resposta_consulta_historico'];
        $this->transacao = new TransactionResponse($array['cabecalho_transacao']);
        if($resposta != [] || $resposta != ''){
            foreach($resposta as $key => $value){
                $this->consulta_historico[] = new HistoricData($value);
            }
        } else {
            $this->consulta_historico = null;
        }
    }

    public function toArray(): array
    {
        $array = [
            'cabecalho_transacao' => $this->transacao->toArray(),
            'consulta_historico' => []
        ];

        if($this->consulta_historico != null){
            foreach($this->consulta_historico as $data){
                array_push($array['consulta_historico'], $data->toArray());
            }
        }

        return $array;
    }

}

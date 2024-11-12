<?php

namespace Tests\Feature\Protocol;

use App\Http\Requests\Protocol\ProtocolCancelRequest;
use App\Http\Requests\Protocol\ProtocolCreateRequest;
use App\Models\Protocolo\Responses\ProtocolCAResponse;
use App\Models\Protocolo\Responses\ProtocolECResponse;
use App\Models\Protocolo\Responses\ProtocolHistoryResponse;
use App\Models\Protocolo\Responses\ProtocolRequestResponse;
use App\Models\Protocolo\Responses\ProtocolStatusResponse;

class ProtocolResponsesMocks
{
    // Método auxiliar para criar uma instância de StorePostRequest com dados de teste
    static function createResponse(): ProtocolRequestResponse
    {
        $responseArray = [
            'resposta_solicitar_protocolo' => [
                'cd_unimed' => '0666',
                'id_benef' => '0000000000006',
                'nr_protocolo' => '0000012345',
                'id_resposta' => 3,
                'mensagem' => 'Teste de mensagem',
                'id_sistema' => 'SIS123'
            ],
            'cabecalho_transacao' => [
                'cd_transacao' => '001',
                'tp_cliente' => 'UNIMED',
                'cd_uni_origem' => '0137',
                'cd_uni_destino' => '0667',
                'nr_ans' => '322831',
                'nr_transacao_prestadora' => '0000046846',
                'dt_manifestacao' => '2020-08-01 12:00:00',
                'id_usuario' => 'teste',
                'nr_versao_protocolo' => '001'
            ]
        ];

        $request = new ProtocolRequestResponse($responseArray);

        return $request;
    }
    static function cancelResponse(): ProtocolECResponse
    {
        $responseArray = [
            'cancelamento' => [
                'cd_unimed' => 'badreqest',
                'id_benef' => '0000000000006',
                'nr_protocolo' => '0000012345',
                'id_resposta' => 3,
                'id_sistema' => 'SIS123'
            ],
            'cabecalho_transacao' => [
                'cd_transacao' => '001',
                'tp_cliente' => 'UNIMED',
                'cd_uni_origem' => '0137',
                'cd_uni_destino' => '0667',
                'nr_ans' => '322831',
                'nr_transacao_prestadora' => '0000046846',
                'dt_manifestacao' => '2020-08-01 12:00:00',
                'id_usuario' => 'teste',
                'nr_versao_protocolo' => '001'
            ]
        ];

        $request = new ProtocolECResponse($responseArray);

        return $request;
    }
    static function answerComplementResponse(): ProtocolCAResponse
    {
        $responseArray = [
            "cabecalho_transacao" => [
                "cd_transacao" => "005",
                "tp_cliente" => "UNIMED",
                "cd_uni_origem" => "0137",
                "cd_uni_destino" => "0667",
                "nr_ans" => "337188",
                "nr_transacao_prestadora" => "0000046846",
                "dt_manifestacao" => "2020-08-01 12:00:00",
                "id_usuario" => "teste",
                "nr_versao_protocolo" => "001"
            ],
            "resposta_atendimento" => [
                "cd_unimed" => "0666",
                "id_benef" => "0000000000006",
                "id_origem_resposta" => 2,
            ]
        ];

        $request = new ProtocolCAResponse($responseArray);

        return $request;
    }
    static function historyResponse(): ProtocolHistoryResponse
    {
        $array = [
            "cabecalho_transacao" => [
                "cd_transacao" => "010",
                "tp_cliente" => "PORTAL",
                "cd_uni_origem" => "0001",
                "cd_uni_destino" => "0667",
                "nr_ans" => "000667",
                "nr_transacao_prestadora" => "0000046846",
                "id_usuario" => "teste",
                "nr_versao_protocolo" => "001"
            ],
            "resposta_consulta_historico" => [
                [
                    "nr_transacao_prestadora" => "1495606",
                    "id_usuario" => "QUALQUERCOISA",
                    "nr_versao_protocolo" => "001",
                    "dt_manifestacao" => "2020-08-01 12:00:00",
                    "nr_protocolo" => "12345678912345677777",
                    "id_resposta" => 4,
                    "id_sistema" => 2
                ]
            ]
        ];

        $request = new ProtocolHistoryResponse($array);

        return $request;
    }

    static function statusResponse(): ProtocolStatusResponse
    {
        $array = [
            "cabecalho_transacao" => [
                "cd_transacao" => "010",
                "tp_cliente" => "PORTAL",
                "cd_uni_origem" => "0001",
                "cd_uni_destino" => "0667",
                "nr_ans" => "000667",
                "nr_transacao_prestadora" => "0000046846",
                "dt_sol_protocolo" => "2020-08-01 12:00:00",
                "nr_versao_protocolo" => "001"
            ],
            "resposta_consulta_status_protocolo" => [
                "cd_unimed" => "0666",
                "id_benef" => "0000000000006",
                "nome" => "teste",
                "tp_manifestacao" => null,
                "tp_categoria_manifestacao" => [
                    18
                ],
                "nr_protocolo" => "12345678912345679997",
                "id_resposta" => 3,
                "num_trans_interc_prestadora" => null,
                "num_trans_origem_beneficiario" => null,
                "id_origem_resposta" => 2,
                "id_usuario" => "teste",
                "dt_solicitacao_protocolo" => "2021-01-14 14:27:02",
                "mensagem" => "Teste"
            ]
        ];

        $request = new ProtocolStatusResponse($array);

        return $request;
    }

    static function sendExecutionResponse(): ProtocolECResponse
    {
        $array = [
            "cabecalho_transacao" => [
                "cd_transacao" => "014",
                "tp_cliente" => "PORTAL",
                "cd_uni_origem" => "0001",
                "cd_uni_destino" => "0032",
                "nr_ans" => "304701",
                "nr_transacao_prestadora" => "0000046846",
                "id_usuario" => "Gestão de Protocolos - Contingência",
                "nr_versao_protocolo" => "001"
            ],
            "confirmacao" => [
                "cd_unimed" => "0032",
                "id_benef" => "0000000000006",
                "id_resposta" => 4,
                "nr_protocolo" => "30470120210119900003",
                "id_sistema" => 2
            ]
        ];

        $request = new ProtocolECResponse($array);

        return $request;
    }
}

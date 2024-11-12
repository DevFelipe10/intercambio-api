<?php

namespace Tests\Feature\Protocol;

use App\Http\Requests\Protocol\ProtocolAnswerRequest;
use App\Http\Requests\Protocol\ProtocolCancelRequest;
use App\Http\Requests\Protocol\ProtocolComplementRequest;
use App\Http\Requests\Protocol\ProtocolCreateRequest;
use App\Http\Requests\Protocol\ProtocolExecutionRequest;
use App\Http\Requests\Protocol\ProtocolHistoryRequest;
use App\Http\Requests\Protocol\ProtocolStatusRequest;
use App\Models\Token;
use Tests\Feature\InitToken;

class ProtocolRequestsMocks
{
    // Método auxiliar para criar uma instância de StorePostRequest com dados de teste
    static function createRequest(): ProtocolCreateRequest
    {
        $requestData = [
            'cabecalho_transacao' => [
                'cd_transacao' => '003',
                'tp_cliente' => 'UNIMED',
                'cd_uni_origem' => '0137',
                'cd_uni_destino' => '0667',
                'nr_ans' => '322831',
                'nr_transacao_prestadora' => '0000046846',
                'dt_manifestacao' => '2020-08-01 12:00:00',
                'id_usuario' => 'teste',
                'nr_versao_protocolo' => '001'
            ],
            'solicitar_protocolo' => [
                'nome' => 'teste',
                'cd_unimed' => '0666',
                'id_benef' => '0000000000006',
                'cd_cpf' => '09520811990',
                'ddd' => '11',
                'telefone' => '988887777',
                'email' => 'teste@teste.com',
                'cd_uf' => 'SC',
                'cd_cidade' => '4205407',
                'cd_uni_atendimento' => '0025',
                'tp_manifestacao' => '7',
                'tp_categoria_manifestacao' => [18],
                'id_resposta' => 3,
                'nr_transacao_intercambio' => '0000054545',
                "nr_protocolo_anterior" => "00000000000000000000",
                'mensagem' => 'Teste'
            ]
        ];

        $request = new ProtocolCreateRequest();
        $request->merge($requestData);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());
        return $request;
    }
    static function cancelRequest(): ProtocolCancelRequest
    {
        $requestData = [
            "cabecalho_transacao" => [
                "cd_transacao" => "011",
                "tp_cliente" => "UNIMED",
                "cd_uni_origem" => "0137",
                "cd_uni_destino" => "0667",
                "nr_ans" => "337188",
                "nr_transacao_prestadora" => "0000046846",
                "dt_cancelamento" => "2020-08-01 12:00:00",
                "id_usuario" => "teste",
                "nr_versao_protocolo" => "001"
            ],
            "cancelamento" => [
                "cd_unimed" => "0666",
                "id_benef" => "0000000000006",
                "nr_protocolo" => "32283120999999999993",
                "motivo_cancelamento" => "teste"
            ]
        ];

        $request = new ProtocolCancelRequest();
        $request->merge($requestData);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }
    static function complementProtocolRequest(): ProtocolComplementRequest
    {
        $array = [
            "cabecalho_transacao" => [
                "cd_transacao" => "003",
                "tp_cliente" => "UNIMED",
                "cd_uni_origem" => "0137",
                "cd_uni_destino" => "0667",
                "nr_ans" => "322831",
                "nr_transacao_prestadora" => "0000046846",
                "dt_manifestacao" => "2020-08-01 12:00:00",
                "id_usuario" => "teste",
                "nr_versao_protocolo" => "001"
            ],
            "pedido_complemento_protocolo" => [
                "cd_unimed" => "0667",
                "id_benef" => "0000000000002",
                "nr_protocolo" => "32283120240716900004",
                "mensagem" => "teste",
                "nr_transacao_intercambio" => "1234567891",
                "id_resposta" => 3
            ]
        ];


        $request = new ProtocolComplementRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }
    static function answerRequest(): ProtocolAnswerRequest
    {
        $requestData = [
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
                "nr_protocolo" => "32283120240716900004",
                "id_resposta" => 2,
                "nr_transacao_origem_benef" => "1234567891",
                "nr_transacao_intercambio" => null,
                "mensagem" => "teste atendimento"
            ]
        ];

        $request = new ProtocolAnswerRequest();
        $request->merge($requestData);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }
    static function historyRequest(): ProtocolHistoryRequest
    {
        $array = [
            "cabecalho_transacao" => [
                "cd_transacao" => "009",
                "tp_cliente" => "UNIMED",
                "cd_uni_origem" => "0137",
                "nr_ans" => "337188",
                "nr_transacao_prestadora" => "0000900005",
                "dt_manifestacao" => "2024-07-11 14:08:41",
                "id_usuario" => "teste",
                "nr_versao_protocolo" => null
            ],
            "consulta_historico" => [
                "cd_unimed" => "0146",
                "id_benef" => "0274001878019",
                "dt_inicio_historico" => "2024-07-01 12:00:00",
                "dt_fim_historico" => "2024-07-30 12:00:00"
            ]
        ];

        $request = new ProtocolHistoryRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }
    static function statusRequest(): ProtocolStatusRequest
    {
        $array = [
            "cabecalho_transacao" => [
                "cd_transacao" => "007",
                "tp_cliente" => "UNIMED",
                "cd_uni_origem" => "0137",
                "cd_uni_destino" => "0032",
                "nr_ans" => "322831",
                "nr_transacao_prestadora" => "0000046846",
                "dt_manifestacao" => "2020-08-01 12:00:00",
                "id_usuario" => "teste",
                "nr_versao_protocolo" => "001"
            ],
            "consulta_status_protocolo" => [
                "cd_unimed" => "0666",
                "id_benef" => "0000000000006",
                "nr_protocolo" => "32283120240711900014"
            ]
        ];

        $request = new ProtocolStatusRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }
    static function sendExecutionRequest(): ProtocolExecutionRequest
    {
        $array = [
            "cabecalho_transacao" => [
                "cd_transacao" => "013",
                "tp_cliente" => "UNIMED",
                "cd_uni_origem" => "0137",
                "cd_uni_destino" => "0667",
                "nr_ans" => "337188",
                "nr_transacao_prestadora" => "0000046846",
                "dt_manifestacao" => "2020-08-01 12:00:00",
                "id_usuario" => "teste",
                "nr_versao_protocolo" => "001"
            ],
            "encaminhar_execucao" => [
                "cd_unimed" => "0666",
                "id_benef" => "0000000000006",
                "nome" => "teste",
                "cd_cpf" => null,
                "ddd" => "0048",
                "telefone" => "962426956",
                "email" => "teste@teste.com",
                "tp_manifestacao" => "1",
                "tp_categoria_manifestacao" => [
                    1
                ],
                "nr_transacao_intercambio" => "0000054545",
                "nr_protocolo_anterior" => "32283120240716900002",
                "mensagem" => "Encaminhar Execucao"
            ]
        ];

        $request = new ProtocolExecutionRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }
}

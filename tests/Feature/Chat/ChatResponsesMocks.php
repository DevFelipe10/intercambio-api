<?php

namespace Tests\Feature\Chat;

use App\Models\Chat\Responses\ChatAddUserChangeStatusResponse;
use App\Models\Chat\Responses\ChatCreateAndComplementControlResponse;
use App\Models\Chat\Responses\ChatLinkRecoverResponse;
use App\Models\Chat\Responses\ChatMessageHistoryResponse;
use App\Models\Chat\Responses\ChatMultipleTransactionAndPanelSearchResponse;
use App\Models\Chat\Responses\ChatMultipleUserSearchResponse;
use App\Models\Chat\Responses\ChatOpenResponse;
use App\Models\Chat\Responses\ChatPendenceRoomSearchResponse;
use App\Models\Chat\Responses\ChatPendingResponse;
use App\Models\Chat\Responses\ChatSendMessageResponse;
use App\Models\Chat\Responses\ChatUnitaryTransactionSearchResponse;
use App\Models\Chat\Responses\ChatUnitaryUserSearchResponse;

class ChatResponsesMocks
{
    public static function chatCreateRoomAndComplementControlResponse(): ChatCreateAndComplementControlResponse
    {
        $array = [
            'salaAutorizacao' => [
                'codigo' => '001',
                'numeroTransacao' => "000000000054545",
                'dataCriacao' => '2024-07-30T10:00:00',
                'dataUltimaConversa' => '2024-07-30T10:00:00',
                'statusSala' => 'status',
                'codigoUnimedSolicitante' => '0137',
                'codigoUnimedAtendente' => '0667',
                'tipoSolicitacao' => 'tipo',
                'codigoBeneficiario' => '06660000000000006',
                'dtCriacaoAutorizacao' => '2024-07-30T10:00:00',
                'nrTransRef' => '000000000000000',
                'criador' => [
                    'idUsuario' => '00000000000-000',
                    'nome' => 'nome',
                    'cdUnimed' => '0137',
                    'dsEmail' => 'imtheone'
                ]
            ]
        ];

        return new ChatCreateAndComplementControlResponse($array);
    }

    public static function chatOpenResponse(): ChatOpenResponse
    {
        $array =  [
            'linkSalaUsuario' => 'https://link'
        ];

        return new ChatOpenResponse($array);
    }

    public static function chatUnitaryUserSearchResponse(): ChatUnitaryUserSearchResponse
    {
        $array =  [
            'usuario' => [
                'idUsuario' => '00000000000-000',
                'nome' => 'nome',
                'cdUnimed' => '0137',
                'dsEmail' => 'email',
                'chatException' => null
            ]
        ];

        return new ChatUnitaryUserSearchResponse($array);
    }

    public static function chatlinkRecoverResponse(): ChatLinkRecoverResponse
    {
        $array =  [
            'linkHistoricoSala' => 'https://link'
        ];

        return new ChatLinkRecoverResponse($array);
    }

    public static function chatFindRoomResponse(): ChatOpenResponse
    {
        $array =  [
            'linkSalaUsuario' => 'https://link'
        ];

        return new ChatOpenResponse($array);
    }

    public static function chatMessageHistoryResponse(): ChatMessageHistoryResponse
    {
        $array =  [
            'mensagensHistorico' => [
                'mensagens' => [
                    [
                        'usuario' => '00000000000-000',
                        'codigo' => 1,
                        'dataEnvio' => 'data',
                        'mensagem' => 'mensagem',
                        'emissor' => [
                            'idUsuario' => '00000000000-000',
                            'nome' => 'nome',
                            'cdUnimed' => '0137',
                            'dsEmail' => 'email@teste.com'
                        ]
                    ]
                ]
            ]
        ];

        return new ChatMessageHistoryResponse($array);
    }

    public static function chatMultipleUserSearchResponse(): ChatMultipleUserSearchResponse
    {
        $array =  [
            'usuariosSalas' => [
                [
                    'usuario' => [
                        'idUsuario' => '0000000000-000',
                        'nome' => 'nome',
                        'cdUnimed' => '0137',
                        'dsEmail' => 'email'
                    ],
                    'idSalaAutorizacao' => [
                        'existeTransacao' => true,
                        'mensagem' => 'mensagem',
                        'numeroTransacao' => '0000000054545',
                        'codigoUnimedSolicitante' => '0000'
                    ]
                ]
            ]
        ];

        return new ChatMultipleUserSearchResponse($array);
    }

    public static function chatPendingResponse(): ChatPendingResponse
    {
        $array =  [
            "unimed" => [
                'cdUnimed' => '0137',
                'nmUnimed' => 'nmUnimed'
            ]
        ];

        return new ChatPendingResponse($array);
    }

    public static function chatUnitaryTransactionSearchResponse(): ChatUnitaryTransactionSearchResponse
    {
        $array =  [
            "buscaPainel" => [
                [
                    'numeroTransacao' => '000000000054545',
                    'nrTransRef' => "00000000000000000",
                    'codigoBeneficiarioFormatado' => "0000000",
                    'codigoUnimedExecutora' => '0000',
                    'codigoUnimedOrigem' => '0000',
                    'tipoSolicitacao' => "tipo",
                    'dataTransacao' => '11/09/2001',
                    'dataUltimaAtualizacao' => '28/03/2005',
                    'usuarioUltimaAtualizacao' => 'data',
                    'statusOutraUnimed' => 'status',
                    'statusAnexo' => 'status',
                    'statusMensagem' => 'status',
                    'statusEncerramento' => 'status',
                    'usuarioResponsavelMinhaUnimed' => '0000000000000-000',
                    'corFundoVencimento' => '#cor'
                ]
            ]
        ];

        return new ChatUnitaryTransactionSearchResponse($array);
    }

    public static function chatAddUserAndChangeStatusResponse(): ChatAddUserChangeStatusResponse
    {
        $array =  [
            'flRetorno' => 'flRetorno'
        ];

        return new ChatAddUserChangeStatusResponse($array);
    }

    public static function chatSendMessageResponse(): ChatSendMessageResponse
    {
        $array =  [
            "descricao" => "Mensagem enviada as salas",
            "httpStatusCode" => 202
        ];

        return new ChatSendMessageResponse($array);
    }


    public static function chatPendenceRoomResponse(): ChatPendenceRoomSearchResponse
    {
        $array =  [
            "pendenciaSala" => array(
                [
                    "existeSala" => true,
                    "mensagem" => null,
                    "unimedPendente" => [
                        "cdUnimed" => 137,
                        "nmUnimed" => "UNIMED ITAJUBÁ"
                    ],
                    "flPassarPendencia" => true,
                    "sala" => [
                        "numeroTransacao" => 7749755,
                        "cdUnimedExecutora" => 137
                    ]
                ]
            )
        ];

        return new ChatPendenceRoomSearchResponse($array);
    }
}
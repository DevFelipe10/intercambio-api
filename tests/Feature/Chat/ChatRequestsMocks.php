<?php

namespace Tests\Feature\Chat;

use App\Http\Requests\Chat\ChatAddUserRequest;
use App\Http\Requests\Chat\ChatChangeStatusRequest;
use App\Http\Requests\Chat\ChatCreateRequest;
use App\Http\Requests\Chat\ChatFindRequest;
use App\Http\Requests\Chat\ChatLinkAndPendingRequest;
use App\Http\Requests\Chat\ChatLockUnlockRequest;
use App\Http\Requests\Chat\ChatMessageHistoryRequest;
use App\Http\Requests\Chat\ChatMultipleUserSearchRequest;
use App\Http\Requests\Chat\ChatOpenRequest;
use App\Http\Requests\Chat\ChatPendenceRoomRequest;
use App\Http\Requests\Chat\ChatSendMessageRequest;
use App\Http\Requests\Chat\ChatTransactionPanelRequest;
use App\Http\Requests\Chat\ChatUnitaryTransactionSearchRequest;
use App\Http\Requests\Chat\ChatUserRoomSearchAndComplementRequest;
use App\Models\Chat\Requesters\ChatAddUser;
use App\Models\Chat\Requesters\ChatLockUnlock;
use App\Models\Chat\Requesters\ChatSendMessage;
use App\Models\Chat\Responses\ChatMessageHistoryResponse;
use Tests\Feature\InitToken;

class ChatRequestsMocks
{
    public static function createRoom() : ChatCreateRequest
    {
        $array = [
            'idUsuario' => '00000000000-000',
            'numeroTransacao' => '000000000054545',
            'codUnimedOrigem' => '0137',
            'codUnimedExecutora' => '0667',
            'tipoSolicitacao' => 'tipo',
            'codigoBeneficiario' => '0666000000000000006',
            'dtCriacaoAutorizacao' => '2024-07-30T10:00:00',
            'codChat' => 1,
        ];

        $request = new ChatCreateRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }

    public static function chatOpen() : ChatOpenRequest
    {
        $array = [
            'idUsuario' => '00000000000-000',
            'numeroTransacao' => '000000000054545',
            'cdUnimedExecutora' => '0667',
            'arrayIdUsuariosAdicionadosNaConvesa' => ['00000000000-000'],
        ];

        $request = new ChatOpenRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }

    public static function chatLockUnlock() : ChatLockUnlockRequest
    {
        $array = [
            'numeroTransacao' => '000000000054545',
            'cdUnimedExecutora' => '0667',
            'tipoFuncao' => 'bloqueio',
        ];

        $request = new ChatLockUnlockRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }

    public static function chatUserAndRoomSearchAndComplementControl() : ChatUserRoomSearchAndComplementRequest
    {
        $array = [
            'numeroTransacao' => '000000000054545',
            'cdUnimedExecutora' => '0667'
        ];

        $request = new ChatUserRoomSearchAndComplementRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }

    public static function chatLinkAndPending() : ChatLinkAndPendingRequest
    {
        $array = [
            'idUsuario' => '00000000000-000',
            'numeroTransacao' => '000000000054545',
            'cdUnimedExecutora' => '0667',
        ];

        $request = new ChatLinkAndPendingRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }

    public static function chatFindRoom() : ChatFindRequest
    {
        $array = [
            'idUsuario' => '00000000000-000',
            'numeroTransacao' => '000000000054545',
            'codUnimedExecutora' => '0667',
            'codUnimedOrigem' => '0137',
            'tipoSolicitacao' => 'tipo',
            'codigoBeneficiario' => '6660000000000006',
            'dtCriacaoAutorizacao' => '2024-07-30T10:00:00',
            'codChat' => 1,
            'arrayIdUsuariosAdicionadosNaConvesa' => null,
            'nrTransRef' => '0000000000054545'
        ];

        $request = new ChatFindRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }

    public static function chatMessageHistory() : ChatMessageHistoryRequest
    {
        $array = [
            'idUsuario' => '00000000000-000',
            'numeroTransacao' => '000000000054545',
            'cdUnimedExecutora' => '0667',
            'flagMsgsAdmin' => true,
        ];

        $request = new ChatMessageHistoryRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }

    public static function chatMultipleUserSearch() : ChatMultipleUserSearchRequest
    {
        $array = [
            'cdUnimedExecutora' => '0667',
            'listaNuTransacao' => ['000000000054545'],
        ];

        $request = new ChatMultipleUserSearchRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }

    public static function chatUnitaryTransactionSearch() : ChatUnitaryTransactionSearchRequest
    {
        $array = [
            'idUsuarioLogado' => '0000000000-000',
            'numeroTransacao' => '000000000054545',
            'cdUnimedorigem' => '0137',
            'cdUnimedExecutora' => '0667',
            'codigoBeneficiario' => '6660000000000006',
            'dtAtualizacaoInicio' => '2024/07/3010:00:00P',
            'dtAtualizacaoFim' => '2024/07/3010:00:00P',
            'dtPedidoInicio' => '2024/07/3010:00:00P',
            'dtPedidoFim' => '2024/07/3010:00:00P',
            'numeroTransacaoInicial' => '000000000048645',
            'idusuarioResponsavel' => '0000000000-000',
            'pendencia' => 'pensencia',
            'tipoSolicitacao' => 'tipo',
            'vencimento' => '2024/07/3010:00:00P',
            'codigoUnimedAdmin' => '0137'
        ];

        $request = new ChatUnitaryTransactionSearchRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }

    public static function chatAddUser() : ChatAddUserRequest
    {
        $array = [
            'numeroTransacao' => '000000000054545',
            'cdUnimedExecutora' => '0667',
            'arrayIdUsuarioAdicionados' => ['0000000000-000'],
            'codGrupoConversa' => 1,
            'arrayIdUsuariosPrincipais' => ['0000000000-000']
        ];

        $request = new ChatAddUserRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }

    public static function chatSendMessage() : ChatSendMessageRequest
    {
        $array = array(
            [
                'idUsuarioEmissor' => '0000000000-000',
                'mensagem' => 'mocked message',
                'sala' => 
                    [
                        'numeroTransacao' => '000000000054545',
                        'cdUnimedExecutora' => '0667'
                    ]
            ]
        );

        $request = new ChatSendMessageRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }

    public static function chatChangeStatus() : ChatChangeStatusRequest
    {
        $array =
            [
                'tipo_funcao' => 'adiciona_status',
                'arrayIdUsuarios' => ['0000000000-000'],
                'numeroTransacao' => '000000000054545',
                'cdUnimedExecutora' => '0137'
            ];

        $request = new ChatChangeStatusRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }

    public static function chatTransactionPanel() : ChatTransactionPanelRequest
    {
        $array =
            [
                "idUsuarioLogado" => "08557428600-137",
                "numeroTransacao" => "7749755",
                "codigoUnimedOrigem" => "0060",
                "codigoUnimedExecutora" => "0137",
                "paginaAtual" => 1,
                "quantidadeItensPag" => 10
            ];

        $request = new ChatTransactionPanelRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }

    public static function pendenceRoom() : ChatPendenceRoomRequest
    {
        $array =
            [
                "salaPendenciaUsuario" => array(
                    [
                        "sala" => [
                            "numeroTransacao" => "000000007749755",
                            "cdUnimedExecutora" => "0137"
                        ],
                        "idUsuario" => "08557428600-137"
                    ]
                )
            ];

        $request = new ChatPendenceRoomRequest();
        $request->merge($array);
        $request->setMethod('POST');
        $request->attributes->set('token', InitToken::initToken());

        return $request;
    }

}

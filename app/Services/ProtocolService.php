<?php

namespace App\Services;

use App\Models\Protocolo\Responses\ProtocolCAResponse;
use App\Models\Protocolo\Responses\ProtocolECResponse;
use App\Models\Protocolo\Responses\ProtocolHistoryResponse;
use App\Models\Protocolo\Responses\ProtocolRequestResponse;
use App\Models\Protocolo\Responses\ProtocolStatusResponse;
use App\Models\Protocolo\Requesters\ProtocolAnswer;
use App\Models\Protocolo\Requesters\ProtocolCancel;
use App\Models\Protocolo\Requesters\ProtocolComplement;
use App\Models\Protocolo\Requesters\ProtocolExecution;
use App\Models\Protocolo\Requesters\ProtocolHistory;
use App\Models\Protocolo\Requesters\ProtocolRequest;
use App\Models\Protocolo\Requesters\ProtocolStatus;
use App\Models\Token;
use App\Services\Interfaces\IProtocolService;
use Illuminate\Support\Facades\Http;

class ProtocolService implements IProtocolService
{
    public function createProtocol(ProtocolRequest $protocolRequest, Token $token): array|ProtocolRequestResponse
    {
        $url = env('URL_GPU') . '/solicitar-protocolo';

        $data = [
            "cabecalho_transacao" => $protocolRequest->getTransacao()->toArray(),
            "solicitar_protocolo" => $protocolRequest->toArray()
        ];

        $res = $this->sendRequest($token, $url, $data);

        if ($res->successful()) {
            return new ProtocolRequestResponse($res->json());
        }

        return $res->json();
    }

    public function complementProtocol(ProtocolComplement $protocolComplement, Token $token): array|ProtocolCAResponse
    {
        $url = env('URL_GPU') . "/complemento-protocolo";

        $data = [
            "cabecalho_transacao" => $protocolComplement->getTransacao()->toArray(),
            "pedido_complemento_protocolo" => $protocolComplement->toArray()
        ];

        $res = $this->sendRequest($token, $url, $data);

        if ($res->successful()) {
            return new ProtocolCAResponse($res->json());
        }

        return $res->json();
    }

    public function answerService(ProtocolAnswer $protocolAnswer, Token $token): array|ProtocolCAResponse
    {
        $url = env("URL_GPU") . '/resposta-atendimento';

        $data = [
            "cabecalho_transacao" => $protocolAnswer->getTransacao()->toArray(),
            "resposta_atendimento" => $protocolAnswer->toArray()
        ];

        $res = $this->sendRequest($token, $url, $data);

        if ($res->successful()) {
            return new ProtocolCAResponse($res->json());
        }

        return $res->json();
    }

    public function getProtocolStatus(ProtocolStatus $protocolStatus, Token $token): array|ProtocolStatusResponse
    {
        $url = env('URL_GPU') . "/consulta-status";

        $data = [
            "cabecalho_transacao" => $protocolStatus->getTransacao()->toArray(),
            "consulta_status_protocolo" => $protocolStatus->toArray()
        ];

        $res = $this->sendRequest($token, $url, $data);

        if ($res->successful()) {
            return new ProtocolStatusResponse($res->json());
        }

        return $res->json();
    }

    public function getProtocolHistory(ProtocolHistory $protocolHistory, Token $token): array|ProtocolHistoryResponse
    {

        $url = env('URL_GPU') . "/consulta-historico";

        $data = [
            "cabecalho_transacao" => $protocolHistory->getTransacao()->toArray(),
            "consulta_historico" => $protocolHistory->toArray()
        ];

        $res = $this->sendRequest($token, $url, $data);

        if ($res->successful()) {
            return new ProtocolHistoryResponse($res->json());
        }

        return $res->json();
    }

    public function cancelService(ProtocolCancel $protocolCancel, Token $token): array|ProtocolECResponse
    {
        $url = env('URL_GPU') . "/cancelamento";

        $data = [
            "cabecalho_transacao" => $protocolCancel->getTransacao()->toArray(true),
            "cancelamento" => $protocolCancel->toArray()
        ];

        $res = $this->sendRequest($token, $url, $data);

        if ($res->successful()) {
            return new ProtocolECResponse($res->json());
        }

        return $res->json();
    }

    public function sendExecution(ProtocolExecution $protocolExecution, Token $token): array|ProtocolECResponse
    {

        $url = env('URL_GPU') . '/encaminhar-execucao';

        $data = [
            "cabecalho_transacao" => $protocolExecution->getTransacao()->toArray(),
            "encaminhar_execucao" => $protocolExecution->toArray()
        ];

        $res = $this->sendRequest($token, $url, $data);

        if ($res->successful()) {
            return new ProtocolECResponse($res->json());
        }

        return $res->json();
    }

    private function sendRequest(Token $token, string $url, array $data)
    {
        return Http::withCookies(
            [
                'X-CSRF-TOKEN' => $token->getCookieX(),
                'BIGipServerPOOL_GIUAPI_PRD_80XX' => $token->getCookieBIG()
            ],
            'gpupainel.unimed.coop.br'
        )
            ->withToken($token->getAccess_token())
            ->post($url, $data);
    }
}

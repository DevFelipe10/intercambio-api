<?php

namespace App\Http\Controllers;

use App\Http\Requests\Protocol\ProtocolAnswerRequest;
use App\Http\Requests\Protocol\ProtocolCancelRequest;
use App\Http\Requests\Protocol\ProtocolComplementRequest;
use App\Http\Requests\Protocol\ProtocolExecutionRequest;
use App\Http\Requests\Protocol\ProtocolHistoryRequest;
use App\Http\Requests\Protocol\ProtocolCreateRequest;
use App\Http\Requests\Protocol\ProtocolStatusRequest;
use App\Http\Resources\ErrorResource;
use App\Models\Protocolo\Requesters\ProtocolAnswer;
use App\Models\Protocolo\Requesters\ProtocolCancel;
use App\Models\Protocolo\Requesters\ProtocolComplement;
use App\Models\Protocolo\Requesters\ProtocolExecution;
use App\Models\Protocolo\Requesters\ProtocolHistory;
use App\Models\Protocolo\Requesters\ProtocolRequest;
use App\Models\Protocolo\Requesters\ProtocolStatus;
use App\Services\Interfaces\IProtocolService;
use App\Services\Interfaces\ITokenService;

class ProtocolController extends Controller
{
    public function __construct(
        protected ITokenService $tokenService,
        protected IProtocolService $protocolService
    ) {
    }

    /**
     * Create Protocol Endpoint
     */
    public function create(ProtocolCreateRequest $request)
    {
        $protocol = new ProtocolRequest($request->toArray());
        $token = $request->attributes->get('token');

        $res = $this->protocolService->createProtocol($protocol, $token);

        if (is_array($res)) {
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        /**
         * @body array{"cd_unimed": "0666", "id_benef": "0000000000006", "nr_protocolo": "32283120240724900006", "id_resposta": 3, "mensagem": "Resposta gerada automaticamente pelo sistema de contingência.", "id_sistema": 2}
         */
        return response($res->toArray());
    }

    /**
     *  Cancel Protocol Endpoint
     */
    public function cancel(ProtocolCancelRequest $request)
    {
        $protocol = new ProtocolCancel($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->protocolService->cancelService($protocol, $token);

        if (is_array($res)) {
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de cancelamento do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     * Send Execution Endpoint
     */
    public function sendExecution(ProtocolExecutionRequest $request)
    {
        $protocol = new ProtocolExecution($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->protocolService->sendExecution($protocol, $token);

        if (is_array($res)) {
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de execução - Unimed Brasil: {$res['mensagem']}"
            );
        }


        return response($res->toArray());
    }

    /**
     * Answer Service Endpoint
     */
    public function answer(ProtocolAnswerRequest $request)
    {
        $protocol = new ProtocolAnswer($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->protocolService->answerService($protocol, $token);

        if (is_array($res)) {
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de resposta - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     * Get Protocol History Endpoint
     */
    public function history(ProtocolHistoryRequest $request)
    {
        $protocol = new ProtocolHistory($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->protocolService->getProtocolHistory($protocol, $token);

        if (is_array($res)) {
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de historico do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     * Get Protocol Status Endpoint
     */
    public function status(ProtocolStatusRequest $request)
    {
        $protocol = new ProtocolStatus($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->protocolService->getProtocolStatus($protocol, $token);

        if (is_array($res)) {
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de status do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     * Complement Protocol Endpoint
     */
    public function complement(ProtocolComplementRequest $request)
    {
        $protocol = new ProtocolComplement($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->protocolService->complementProtocol($protocol, $token);

        if (is_array($res)) {
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de complemento de protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }
}

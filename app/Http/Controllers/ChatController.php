<?php

namespace App\Http\Controllers;

use App\Http\Requests\Chat\ChatAddUserRequest;
use App\Http\Requests\Chat\ChatChangeStatusRequest;
use App\Http\Requests\Chat\ChatCreateRequest;
use App\Http\Requests\Chat\ChatFindRequest;
use App\Http\Requests\Chat\ChatLinkAndPendingRequest;
use App\Http\Requests\Chat\ChatLockUnlockRequest;
use App\Http\Requests\Chat\ChatMessageHistoryRequest;
use App\Http\Requests\Chat\ChatMultipleTransactionRequest;
use App\Http\Requests\Chat\ChatMultipleUserSearchRequest;
use App\Http\Requests\Chat\ChatOpenRequest;
use App\Http\Requests\Chat\ChatPendenceRoomRequest;
use App\Http\Requests\Chat\ChatSendMessageRequest;
use App\Http\Requests\Chat\ChatTransactionPanelRequest;
use App\Http\Requests\Chat\ChatUnitaryTransactionSearchRequest;
use App\Http\Requests\Chat\ChatUserRoomSearchAndComplementRequest;
use App\Http\Resources\ErrorResource;
use App\Models\Chat\Requesters\ChatAddUser;
use App\Models\Chat\Requesters\ChatChangeStatus;
use App\Models\Chat\Requesters\ChatCreate;
use App\Models\Chat\Requesters\ChatFind;
use App\Models\Chat\Requesters\ChatLinkAndPendence;
use App\Models\Chat\Requesters\ChatLockUnlock;
use App\Models\Chat\Requesters\ChatMessageHistory;
use App\Models\Chat\Requesters\ChatMultipleTransactionSearch;
use App\Models\Chat\Requesters\ChatMultipleUserSearch;
use App\Models\Chat\Requesters\ChatOpen;
use App\Models\Chat\Requesters\ChatPendenceRoomSearch;
use App\Models\Chat\Requesters\ChatSendMessage;
use App\Models\Chat\Requesters\ChatTransactionPanel;
use App\Models\Chat\Requesters\ChatUnitaryTransactionSearch;
use App\Models\Chat\Requesters\ChatUserRoomSearchAndComplement;
use App\Services\Interfaces\IChatService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ChatController extends Controller
{
    public function __construct(
        protected IChatService $chatService
    ) {
    }

    /**
     * Create Chat Endpoint
     */
    public function create(ChatCreateRequest $request)
    {
        $chat = new ChatCreate($request->toArray());

        $token = $request->attributes->get('token');
        // var_dump($token);
        // exit;
        $res = $this->chatService->createRoom($chat, $token);

        if (is_array($res)) {
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     *  Open Room Endpoint
     */
    public function open(ChatOpenRequest $request)
    {
        $chat = new ChatOpen($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->chatService->openRoom($chat, $token);

        if (is_array($res)) {
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     *  Lock/Unlock Room Endpoint
     */
    public function lockUnlock(ChatLockUnlockRequest $request)
    {
        $chat = new ChatLockUnlock($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->chatService->lockUnlock($chat, $token);

        if($res == 200){
            return response("Operação realizada com sucesso", Response::HTTP_NO_CONTENT);
        }

        return new ErrorResource(
           "Erro na requisição de criação do protocolo - Unimed Brasil: $res"
        );
    }

    /**
     *  Unitary User Search of a room Endpoint
     */
    public function unitaryUserSearch(ChatUserRoomSearchAndComplementRequest $request)
    {
        $chat = new ChatUserRoomSearchAndComplement($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->chatService->unitaryUserSearch($chat, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     *  Room Link Recover Endpoint
     */
    public function linkRecover(ChatLinkAndPendingRequest $request)
    {
        $chat = new ChatLinkAndPendence($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->chatService->linkRecover($chat, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     *  Find Room Endpoint
     */
    public function findRoom(ChatFindRequest $request)
    {
        $chat = new ChatFind($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->chatService->findRoom($chat, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     *  List Chat Messages Endpoint
     */
    public function messageHistory(ChatMessageHistoryRequest $request)
    {
        $chat = new ChatMessageHistory($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->chatService->messageHistory($chat, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     *  List Users Last Message in Rooms Messages Endpoint
     */
    public function multipleUserSearch(ChatMultipleUserSearchRequest $request)
    {
        $chat = new ChatMultipleUserSearch($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->chatService->multipleUserSearch($chat, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     *  Send Message Endpoint
     */
    public function sendMessage(ChatSendMessageRequest $request)
    {
        $chat = new ChatSendMessage($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->chatService->sendMessage($chat, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de envio de mensagem - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     *  Define Room Pendence Endpoint
     */
    public function defineRoomPendence(ChatLinkAndPendingRequest $request)
    {
        $chat = new ChatLinkAndPendence($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->chatService->defineRoomPendence($chat, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     *  Search/Create Room Endpoint
     */
    public function searchRoom(ChatUserRoomSearchAndComplementRequest $request)
    {
        $chat = new ChatUserRoomSearchAndComplement($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->chatService->searchRoom($chat, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     *  Add User to a Chat Endpoint
     */
    public function addUser(ChatAddUserRequest $request)
    {
        $chat = new ChatAddUser($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->chatService->addUser($chat, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     *  Unitary Transaction Search Endpoint
     */
    public function unitarySearchTransaction(ChatUnitaryTransactionSearchRequest $request)
    {
        $chat = new ChatUnitaryTransactionSearch($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->chatService->unitarySearchTransaction($chat, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     *  Complement Control Endpoint
     */
    public function complementControl(ChatUserRoomSearchAndComplementRequest $request)
    {
        $chat = new ChatUserRoomSearchAndComplement($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->chatService->complementControl($chat, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     *  Change Status Endpoint
     */
    public function changeStatus(ChatChangeStatusRequest $request)
    {
        $chat = new ChatChangeStatus($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->chatService->changeStatus($chat, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de criação do protocolo - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     *  Multiple Transaction Search Endpoint
     */
    public function multipleTransactionSearch(ChatMultipleTransactionRequest $request)
    {
        $chat = new ChatMultipleTransactionSearch($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->chatService->multipleTransactionSearch($chat, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de busca multipla de transações - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     *  Panel Transaction Search Endpoint
     */
    public function transactionPanel(ChatTransactionPanelRequest $request)
    {
        $chat = new ChatTransactionPanel($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->chatService->transactionPanel($chat, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de busca do painel transações - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }

    /**
     *  Room Pendence Search Endpoint
     */
    public function pendenceRoomSearch(ChatPendenceRoomRequest $request)
    {
        $chat = new ChatPendenceRoomSearch($request->toArray());

        $token = $request->attributes->get('token');

        $res = $this->chatService->pendenceRoomSearch($chat, $token);

        if(is_array($res)){
            /**
             * @status 400
             */
            return new ErrorResource(
                "Erro na requisição de consulta de salas pendentes - Unimed Brasil: {$res['mensagem']}"
            );
        }

        return response($res->toArray());
    }
}

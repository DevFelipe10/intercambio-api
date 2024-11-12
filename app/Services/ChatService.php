<?php

namespace App\Services;

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
use App\Models\Chat\Responses\ChatAddUserChangeStatusResponse;
use App\Models\Chat\Responses\ChatAttachControlResponse;
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
use App\Models\Token;
use App\Services\Interfaces\ITokenService;
use App\Services\Interfaces\IChatService;
use Illuminate\Support\Facades\Http;
use Symfony\Component\VarDumper\VarDumper;

class ChatService implements IChatService
{
    public function __construct(protected ITokenService $tokenService)
    {
    }

    public function openRoom(ChatOpen $chat, Token $token) : array|ChatOpenResponse
    {
        $url = env('URL_CHAT') . '/sala/abrirSala';

        $res = $this->sendRequestPost($token, $url, $chat->toArray());

        if ($res->successful()) {
            return new ChatOpenResponse($res->json());
        }

        return $res->json();
    }

    public function createRoom(ChatCreate $chat, Token $token): array|ChatCreateAndComplementControlResponse
    {
        $url = env('URL_CHAT') . '/salaautorizacao/criarSalaAutorizacao';

        $res = $this->sendRequestPost($token, $url, $chat->toArray());

        if ($res->successful()) {
            return new ChatCreateAndComplementControlResponse($res->json());
        }

        // var_dump($res->status());
        // exit;
        return $res->json();
    }

    public function lockUnlock(ChatLockUnlock $chat, Token $token): int
    {
        $url = env('URL_CHAT') . '/sala/bloqueareDesbloquearSala';

        $url .= "/{$chat->tipo_funcao}/{$chat->numero_transacao}/{$chat->cd_unimed_executora}";

        $res = $this->sendRequestPut($token, $url);

        return $res->status();
    }

    public function unitaryUserSearch(ChatUserRoomSearchAndComplement $chat, Token $token) : array|ChatUnitaryUserSearchResponse
    {
        $url = env('URL_CHAT') . '/sala/buscaUsuario';

        $url .= "/{$chat->numero_transacao}/{$chat->cd_unimed_executora}";

        $res = $this->sendRequestGet($token, $url);

        if($res->successful()){
            return new ChatUnitaryUserSearchResponse($res->json());
        }

        return $res->json();
    }

    public function linkRecover(ChatLinkAndPendence $chat, Token $token) : array|ChatLinkRecoverResponse
    {
        $url = env('URL_CHAT'). '/sala/recuperarLinkHistoricoSala';

        $url.= "/{$chat->numero_transacao}/{$chat->cd_unimed_executora}/{$chat->id_usuario}";

        $res = $this->sendRequestGet($token, $url);

        if($res->successful()){
            return new ChatLinkRecoverResponse($res->json());
        }

        return $res->json();
    }

    public function findRoom(ChatFind $chat, Token $token) : array|ChatOpenResponse
    {
        $url = env('URL_CHAT'). '/sala/findSala';

        $res = $this->sendRequestPost($token, $url, $chat->toArray());

        if($res->successful()){
            return new ChatOpenResponse($res->json());
        }

        return $res->json();
    }

    public function messageHistory(ChatMessageHistory $chat, Token $token) : array|ChatMessageHistoryResponse
    {
        $url = env('URL_CHAT'). '/HistoricoSala/mensagensHistoricoChat';

        $res = $this->sendRequestPost($token, $url, $chat->toArray());

        if($res->successful()){
            return new ChatMessageHistoryResponse($res->json());
        }

        return $res->json();
    }

    public function multipleUserSearch(ChatMultipleUserSearch $chat, Token $token) : array|ChatMultipleUserSearchResponse
    {
        $url = env('URL_CHAT'). '/sala/recuperarUsuariosUltimaMsgSala';

        $res = $this->sendRequestPost($token, $url, $chat->toArray());

        if($res->successful()){
            return new ChatMultipleUserSearchResponse($res->json());
        }

        return $res->json();
    }

    public function sendMessage(ChatSendMessage $chat, Token $token) : int|array|ChatSendMessageResponse
    {
        $url = env('URL_CHAT'). '/sala/enviarMensagem';
        
        $res = $this->sendRequestPost($token, $url, $chat->toArray());

        if($res->successful()){
            return new ChatSendMessageResponse($res->json());
        }

        return $res->status();
    }

    public function defineRoomPendence(ChatLinkAndPendence $chat, Token $token) : array|ChatPendingResponse
    {
        $url = env('URL_CHAT'). '/pendencia/definirSalaPendente';

        $res = $this->sendRequestPut($token, $url, $chat->toArray());

        if($res->successful()){
            return new ChatPendingResponse($res->json());
        }

        return $res->json();
    }

    public function searchRoom(ChatUserRoomSearchAndComplement $chat, Token $token) : array|ChatCreateAndComplementControlResponse
    {
        $url = env('URL_CHAT'). '/salaautorizacao/recuperarSalaAutorizacao';

        $url.= "/{$chat->numero_transacao}/{$chat->cd_unimed_executora}";

        $res = $this->sendRequestGet($token, $url);

        if($res->successful()){
            return new ChatCreateAndComplementControlResponse($res->json());
        }

        return $res->json();
    }

    public function unitarySearchTransaction(ChatUnitaryTransactionSearch $chat, Token $token) : array|ChatUnitaryTransactionSearchResponse
    {
        $url = env('URL_CHAT'). '/painelTransacoes/pesquisarTransacoesUni';

        $res = $this->sendRequestPost($token, $url, $chat->toArray());

        if($res->successful()){
            return new ChatUnitaryTransactionSearchResponse($res->json());
        }

        return $res->json();
    }

    public function addUser(ChatAddUser $chat, Token $token) : array|ChatAddUserChangeStatusResponse
    {
        $url = env('URL_CHAT'). '/usuario/adicionarUsuariosSala';

        $res = $this->sendRequestPut($token, $url, $chat->toArray());

        if($res->successful()){
            return new ChatAddUserChangeStatusResponse($res->json());
        }

        return $res->json();
    }

    public function complementControl(ChatUserRoomSearchAndComplement $chat, Token $token) : array|ChatCreateAndComplementControlResponse
    {
        $url = env('URL_CHAT'). "/complemento/controleComplementos/{$chat->numero_transacao}/{$chat->cd_unimed_executora}";

        $res = $this->sendRequestGet($token, $url);

        if($res->successful()){
            return new ChatCreateAndComplementControlResponse($res->json());
        }

        return $res->json();
    }

    public function changeStatus(ChatChangeStatus $chat, Token $token) : array|ChatAddUserChangeStatusResponse
    {
        $url = env('URL_CHAT'). "/usuario/AlterarStatus";

        $res = $this->sendRequestPut($token, $url, $chat->toArray());
        
        if($res->successful()){
            return new ChatAddUserChangeStatusResponse($res->json());
        }

        return $res->json();
    }

    public function multipleTransactionSearch(ChatMultipleTransactionSearch $chat, Token $token) : array|ChatMultipleTransactionAndPanelSearchResponse
    {
        $url = env('URL_CHAT'). "/painelTransacoes/pesquisarTransacoes";

        $res = $this->sendRequestPost($token, $url, $chat->toArray());
        
        if($res->successful()){
            return new ChatMultipleTransactionAndPanelSearchResponse($res->json());
        }

        return $res->json();
    }

    public function transactionPanel(ChatTransactionPanel $chat, Token $token) : array|ChatMultipleTransactionAndPanelSearchResponse
    {
        $url = env('URL_CHAT'). "/painelTransacoes/pesquisarTransacoesIntegracao";
        
        $res = $this->sendRequestPost($token, $url, $chat->toArray());
        
        if($res->successful()){
            return new ChatMultipleTransactionAndPanelSearchResponse($res->json());
        }

        return $res->json();
    }

    public function pendenceRoomSearch(ChatPendenceRoomSearch $chat, Token $token) : array|ChatPendenceRoomSearchResponse
    {
        $url = env('URL_CHAT'). "/pendencia/pesquisaSalaPendenteV2";
        
        $res = $this->sendRequestGet($token, $url, $chat->toArray());
        
        if($res->successful()){
            return new ChatPendenceRoomSearchResponse($res->json());
        }

        return $res->json();
    }

    private function sendRequestPost(Token $token, string $url, array $data)
    {
        return Http::withCookies(
            [
                'X-CSRF-TOKEN' => $token->getCookieX(),
                'BIGipServerPOOL_GIUAPI_PRD_80XX' => $token->getCookieBIG()
            ],
            env('DOMAIN_CHAT')
        )
            ->withToken($token->getAccess_token())
            ->post($url, $data);
    }

    private function sendRequestPut(Token $token, string $url, $data = [])
    {  
        return Http::withCookies(
            [
                'X-CSRF-TOKEN' => $token->getCookieX(),
                'BIGipServerPOOL_GIUAPI_PRD_80XX' => $token->getCookieBIG()
            ],
            env('DOMAIN_CHAT')
        )
            ->withToken($token->getAccess_token())
            ->put($url, $data);
    }

    private function sendRequestGet(Token $token, string $url, array $data = [])
    {
        return Http::withCookies(
            [
                'X-CSRF-TOKEN' => $token->getCookieX(),
                'BIGipServerPOOL_GIUAPI_PRD_80XX' => $token->getCookieBIG()
            ],
            env('DOMAIN_CHAT')
        )
            ->withToken($token->getAccess_token())
            ->withBody(json_encode($data))
            ->get($url);
    }
}

<?php

namespace App\Services\Interfaces;

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

interface IChatService
{
    public function openRoom(ChatOpen $chat, Token $token) : array|ChatOpenResponse;

    public function createRoom(ChatCreate $chat, Token $token) : array|ChatCreateAndComplementControlResponse;

    public function lockUnlock(ChatLockUnlock $chat, Token $token) : int;

    public function unitaryUserSearch(ChatUserRoomSearchAndComplement $chat, Token $token) : array|ChatUnitaryUserSearchResponse;

    public function linkRecover(ChatLinkAndPendence $chat, Token $token) : array|ChatLinkRecoverResponse;

    public function findRoom(ChatFind $chat, Token $token) : array|ChatOpenResponse;

    public function messageHistory(ChatMessageHistory $chat, Token $token) : array|ChatMessageHistoryResponse;

    public function multipleUserSearch(ChatMultipleUserSearch $chat, Token $token) : array|ChatMultipleUserSearchResponse;

    public function sendMessage(ChatSendMessage $chat, Token $token) : int|array|ChatSendMessageResponse;

    public function defineRoomPendence(ChatLinkAndPendence $chat, Token $token) : array|ChatPendingResponse;

    public function searchRoom(ChatUserRoomSearchAndComplement $chat, Token $token) : array|ChatCreateAndComplementControlResponse;

    public function unitarySearchTransaction(ChatUnitaryTransactionSearch $chat, Token $token) : array|ChatUnitaryTransactionSearchResponse;

    public function addUser(ChatAddUser $chat, Token $token) : array|ChatAddUserChangeStatusResponse;

    public function complementControl(ChatUserRoomSearchAndComplement $chat, Token $token) : array|ChatCreateAndComplementControlResponse;
    
    public function changeStatus(ChatChangeStatus $chat, Token $token) : array|ChatAddUserChangeStatusResponse;

    public function multipleTransactionSearch(ChatMultipleTransactionSearch $chat, Token $token) : array|ChatMultipleTransactionAndPanelSearchResponse;
    
    public function transactionPanel(ChatTransactionPanel $chat, Token $token) : array|ChatMultipleTransactionAndPanelSearchResponse;
    
    public function pendenceRoomSearch(ChatPendenceRoomSearch $chat, Token $token) : array|ChatPendenceRoomSearchResponse;
    
}

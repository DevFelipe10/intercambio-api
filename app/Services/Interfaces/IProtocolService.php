<?php

namespace App\Services\Interfaces;

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

interface IProtocolService
{
    public function createProtocol(ProtocolRequest $protocolRequest, Token $token): array|ProtocolRequestResponse;

    public function complementProtocol(ProtocolComplement $protocolComplement, Token $token): array|ProtocolCAResponse;

    public function answerService(ProtocolAnswer $protocolAnswer, Token $token): array|ProtocolCAResponse;

    public function getProtocolStatus(ProtocolStatus $protocolStatus, Token $token): array|ProtocolStatusResponse;

    public function getProtocolHistory(ProtocolHistory $protocolHistory, Token $token): array|ProtocolHistoryResponse;

    public function cancelService(ProtocolCancel $protocolCancel, Token $token): array|ProtocolECResponse;

    public function sendExecution(ProtocolExecution $protocolExecution, Token $token): array|ProtocolECResponse;
}

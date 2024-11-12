<?php

namespace App\Models\Chat\Responses;


class ChatMessageHistoryResponse
{
    /**
     * Array de mensagens da conversa
     * @var ChatMessage[] $messages
     */
    public $messages;

    public function __construct(array $arrayIn)
    {
        $array = $arrayIn['mensagensHistorico']['mensagens'];
        foreach($array as $obj){
            $this->messages[] = new ChatMessage($obj);
        }
    }

    public function toArray(): array{

        $mensagensHistorico = ['mensagensHistorico' => []];

        foreach ($this->messages as $message) {
            $mensagensHistorico['mensagensHistorico'][] = $message->toArray();
        }

        return $mensagensHistorico;

    }

}

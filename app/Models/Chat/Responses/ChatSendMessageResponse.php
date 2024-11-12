<?php

namespace App\Models\Chat\Responses;


class ChatSendMessageResponse
{
    public $descricao;
    public $http_status_code;

    public function __construct(array $array)
    {
        $this->descricao = $array['descricao'];
        $this->http_status_code = $array['httpStatusCode'];
    }

    public function toArray(): array{
        return [
            'descricao' => $this->descricao,
            'httpStatusCode' => $this->http_status_code
        ];
    }

}

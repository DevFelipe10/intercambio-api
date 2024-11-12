<?php

namespace App\Models\Chat\Responses;

use App\Models\Chat\Responses\ChatTransaction;

class ChatUnitaryTransactionSearchResponse
{
    /**
     * @var ChatTransaction[] $busca_painel
     */
    public $busca_painel = null;

    public function __construct(array $array)
    {
        foreach($array['buscaPainel'] as $key){
            $this->busca_painel[] = new ChatTransaction($key);
        }
    }

    public function toArray(): array{
        return [
            'buscaPainel' => $this->busca_painel != null ? array_map(function (ChatTransaction $obj) { return $obj->toArray(); }
                , $this->busca_painel) : null
        ];
    }

}

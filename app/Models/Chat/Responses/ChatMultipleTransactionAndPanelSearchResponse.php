<?php

namespace App\Models\Chat\Responses;

/**
 * Class responsable to save data request from 
 * /pesquisarTransacoes and /pesquisarTransacoesIntegracao endpoints
 */
class ChatMultipleTransactionAndPanelSearchResponse
{
    /**
     * @var ChatTransactionPack[] $transacoes
     */
    private $transacoes = [];

    public function __construct(array $array)
    {
        foreach($array['buscaPainel'] as $block) {
            $this->transacoes[] = new ChatTransactionPack($block);
        }
    }

    public function toArray(): array{
        $array = [];
        
        if($this->transacoes != null){
            foreach($this->transacoes as $data){
                array_push($array, $data->toArray());
            }
        }

        return $array;
    }
}

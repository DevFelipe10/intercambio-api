<?php

namespace App\Models\Chat\Responses;


class ChatLinkRecoverResponse
{
    public $link_historico_sala;
 
    public function __construct(array $array)
    {
        $this->link_historico_sala = $array['linkHistoricoSala'];
    }

    public function toArray(): array{
        return [
            'linkHistoricoSala' => $this->link_historico_sala
        ];
    }

}

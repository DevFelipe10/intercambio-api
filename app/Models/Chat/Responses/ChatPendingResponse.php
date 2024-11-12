<?php

namespace App\Models\Chat\Responses;


class ChatPendingResponse
{
    public $cd_unimed;
    public $nm_unimed;

    public function __construct(array $arrayIn)
    {
        $array = $arrayIn['unimed'];
        $this->cd_unimed = $array['cdUnimed'] ?? null;
        $this->nm_unimed = $array['nmUnimed'] ?? null;
    }

    public function toArray(): array{
        return [
            "unimed" => [
                'cdUnimed' => $this->cd_unimed,
                'nmUnimed' => $this->nm_unimed
            ]
        ];
    }

}

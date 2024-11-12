<?php

namespace App\Models\Chat\Responses;

class ChatPendenceRoomSearchResponse
{
    /**
     * @var PendenceRoom[] $rooms
     */
    public $rooms = [];

    public function __construct(array $array)
    {
        foreach($array['pendenciaSala'] as $block){
            $this->rooms[] = new PendenceRoom($block);
        }
    }

    public function toArray(): array{
        $array = [
            'pendenciaSala' => []
        ];

        foreach($this->rooms as $block){
            $array['pendenciaSala'][] = $block->toArray();
        }

        return $array;
    }

}

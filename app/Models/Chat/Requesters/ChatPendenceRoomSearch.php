<?php

namespace App\Models\Chat\Requesters;

/**
 * Class responsable to save data request from /pesquisaSalaPendenteV2 endpoint
 */
class ChatPendenceRoomSearch
{
    /**
     * @var RoomPack[] $messages
     */
    private $salas = [];

    public function __construct(array $array)
    {
        foreach($array['salaPendenciaUsuario'] as $block) {
            $this->salas[] = new RoomPack($block);
        }
    }

    public function toArray(): array{
        $array = [
            'salaPendenciaUsuario' => []
        ];
        
        foreach($this->salas as $data){
            array_push($array['salaPendenciaUsuario'], $data->toArray());
        }

        return $array;
    }


}

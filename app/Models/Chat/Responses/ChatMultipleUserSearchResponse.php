<?php

namespace App\Models\Chat\Responses;


class ChatMultipleUserSearchResponse
{
    /**
     * Array de usuarios/sala encontrados
     * @var ChatUserList[] $usuariosSalas
     */
    public $usuariosSalas;

    public function __construct(array $arrayIn)
    {
        $array = $arrayIn['usuariosSalas'];
        foreach($array as $obj){
            $this->usuariosSalas[] = new ChatUserList($obj);
        }
    }

    public function toArray(): array{

        $salas = ['usuariosSalas' => []];

        foreach ($this->usuariosSalas as $res) {
            $salas['usuariosSalas'][] = $res->toArray();
        }

        return $salas;

    }

}

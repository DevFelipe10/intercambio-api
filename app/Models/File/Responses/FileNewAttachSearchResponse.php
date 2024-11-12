<?php

namespace App\Models\File\Responses;

/**
 * Class responsable to save attach file response data
 *  /consultarAnexosNovos
 */
class FileNewAttachSearchResponse
{
    /**
     * @var Attach[] $anexos
     */
    public $anexos = [];
    public $descricao;
    public $http_status_code;

    public function __construct(array $array)
    {
        $status = $array['status'];
        $this->descricao = $status['descricao'];
        $this->http_status_code = $status['httpStatusCode'];

        foreach($array['anexos'] as $block){
            $this->anexos[] = new Attach($block);
        }
    }

    public function toArray(): array
    {
        $array = [
            'status' =>[
                'descricao' => $this->descricao,
                'http_status_code' => $this->http_status_code,
            ],
            'anexos' => []
        ];

        foreach($this->anexos as $attach){
            array_push($array['anexos'], $attach->toArray());
        }
        
        return $array;
    }   
}

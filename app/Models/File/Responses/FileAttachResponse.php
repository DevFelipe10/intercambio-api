<?php

namespace App\Models\File\Responses;

/**
 * Class responsable to save attach file response data
 *  /anexarArquivo
 */
class FileAttachResponse
{
    public $idAnexos;
    public $descricao;
    public $http_status_code;

    public function __construct(array $array)
    {
        $status = $array['status'];
        $this->idAnexos = $array['idAnexos'];
        $this->descricao = $status['descricao'];
        $this->http_status_code = $status['httpStatusCode'];
    }

    public function toArray(): array
    {
        return [
            'idAnexos' => $this->idAnexos,
            'status' =>[
                'descricao' => $this->descricao,
                'http_status_code' => $this->http_status_code,
            ]
        ];
    }
}

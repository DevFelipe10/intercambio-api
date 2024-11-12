<?php

namespace App\Models\File\Requesters;

use Illuminate\Http\UploadedFile;

/**
 * Class responsable to save body request from /baixarAnexos endpoint
 */
class FileDownload
{
    /**
     * @var array $id_anexos
     */
    public $id_anexos;
    public $id_usuario;

    public function __construct(array $array)
    {
        $this->id_anexos = $array['idAnexos'];
        $this->id_usuario = $array['idUsuario'];
    }

    public function toArray(){
        return [
            'idUsuario' => $this->id_usuario,
            'idAnexos' => $this->id_anexos
        ];
    }
}

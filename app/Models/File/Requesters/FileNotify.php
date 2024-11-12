<?php

namespace App\Models\File\Requesters;

use Illuminate\Http\UploadedFile;

/**
 * Class responsable to save body request from /anexarArquivo endpoint
 */
class FileNotify
{
    public $id_anexos;
    public $dt_envio;
    public $nm_arquivo;
    public $nm_usuario;
    public $cd_unimed_usuario;
    public $cd_unimed_exec;
    public $num_trans;

    public function __construct(array $array)
    {
        $this->id_anexos = $array['idAnexos'];
        $this->dt_envio = $array['dtEnvio'];
        $this->nm_arquivo = $array['nmArquivo'];
        $this->nm_usuario = $array['nmUsuario'];
        $this->cd_unimed_usuario = $array['cdUnimedUsuario'];
        $this->cd_unimed_exec = $array['cdUnimedExec'];
        $this->num_trans = $array['numTrans'];
    }

    public function toArray(): array{
        return [
            'idAnexos' => $this->id_anexos,
            'dtEnvio' => $this->dt_envio,
            'nmArquivo' => $this->nm_arquivo,
            'nmUsuario' => $this->nm_usuario,
            'cdUnimedUsuario' => $this->cd_unimed_usuario,
            'cdUnimedExec' => $this->cd_unimed_exec,
            'numTrans' => $this->num_trans,
        ];
    }
}

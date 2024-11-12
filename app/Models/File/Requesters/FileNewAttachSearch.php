<?php

namespace App\Models\File\Requesters;

/**
 * Class responsable to save body request from /consultarAnexosNovos endpoint
 */
class FileNewAttachSearch
{
    public $data_inicio_envio;
    public $data_fim_envio;
    public $id_usuario;
    public $cd_unimed_exec;
    public $num_trans;
    public function __construct(array $array)
    {
        $this->data_inicio_envio = $array['dtInicioEnvio'];
        $this->data_fim_envio = $array['dtFimEnvio'];
        $this->id_usuario = $array['idUsuario'];
        $this->cd_unimed_exec = $array['cdUnimedExec'];
        $this->num_trans = $array['numTrans'];
    }

    public function toArray(): array{
        return [
            'dtInicioEnvio' => $this->data_inicio_envio,
            'dtFimEnvio' => $this->data_fim_envio,
            'idUsuario' => $this->id_usuario,
            'numTrans' => $this->num_trans,
            'cdUnimedExec' => $this->cd_unimed_exec
        ];
    }
}

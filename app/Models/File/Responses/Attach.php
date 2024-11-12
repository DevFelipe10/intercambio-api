<?php

namespace App\Models\File\Responses;


class Attach
{
    public $id_anexo;
    public $dt_envio;
    public $nm_arquivo;
    public $nm_usuario;
    public $cd_unimed_usuario;
    public $cd_unimed_exec;
    public $num_trans;

    public function __construct(array $array)
    {
        $this->id_anexo = $array['idAnexo'];
        $this->dt_envio = $array['dtEnvio'];
        $this->nm_arquivo = $array['nmArquivo'];
        $this->nm_usuario = $array['nmUsuario'];
        $this->cd_unimed_usuario = $array['cdUnimedUsuario'];
        $this->cd_unimed_exec = $array['cdUnimedExecutora'];
        $this->num_trans = $array['numTrans'];
    }

    public function toArray(): array
    {
        return [
            'idAnexo' => $this->id_anexo,
            'dtEnvio' => $this->dt_envio,
            'nmArquivo' => $this->nm_arquivo,
            'nmUsuario' => $this->nm_usuario,
            'cdUnimedUsuario' => $this->cd_unimed_usuario,
            'cdUnimedExecutora' => $this->cd_unimed_exec,
            'numTrans' => $this->num_trans
        ];
    }
}

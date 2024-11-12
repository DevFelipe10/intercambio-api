<?php

namespace App\Models\File\Requesters;

use Illuminate\Http\UploadedFile;

/**
 * Class responsable to save body request from /anexarArquivo endpoint
 */
class FileAttach
{
    /**
     * @var UploadedFile $arquivo
     */
    public $arquivo;
    public $cd_unimed_executora;
    public $numero_transacao;
    public $id_usuario;

    public function __construct(array $array)
    {
        $this->arquivo = $array['arquivo'];
        $this->cd_unimed_executora = $array['cdUnimedExecutora'];
        $this->numero_transacao = $array['numeroTransacao'];
        $this->id_usuario = $array['idUsuario'];
    }

}

<?php

namespace App\Models\Chat\Requesters;

/**
 * Class responsable to save body request from /bloqueareDesbloquearSala endpoint
 */
class ChatLockUnlock
{
    public $tipo_funcao;
    public $cd_unimed_executora;
    public $numero_transacao;

    public function __construct(array $array)
    {
        $this->tipo_funcao = $array['tipoFuncao'];
        $this->cd_unimed_executora = $array['cdUnimedExecutora'];
        $this->numero_transacao = $array['numeroTransacao'];
    }
}

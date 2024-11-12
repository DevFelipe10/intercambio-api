<?php

namespace App\Models\Chat\Requesters;

/**
 * Class responsable to save data request from /buscaUsuario , /recuperarSalaAutorizacao 
 * and endpoint
 */
class ChatUserRoomSearchAndComplement
{
    public $cd_unimed_executora;
    public $numero_transacao;

    public function __construct(array $array)
    {
        $this->numero_transacao = $array['numeroTransacao'];
        $this->cd_unimed_executora = $array['cdUnimedExecutora'];
    }

}

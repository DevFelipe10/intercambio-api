<?php

namespace App\Models\Chat\Requesters;

/**
 * Class responsable to save data request from /recuperarUsuariosUltimaMsgSala endpoint
 */
class ChatMultipleUserSearch
{
    public $cd_unimed_executora;
    public $lista_nu_transacao;

    public function __construct(array $array)
    {
        $this->cd_unimed_executora = $array['cdUnimedExecutora'];
        $this->lista_nu_transacao = $array['listaNuTransacao'];
    }

    public function toArray(): array{
        return [
            'listaNuTransacao' => $this->lista_nu_transacao,
            'cdUnimedExecutora' => $this->cd_unimed_executora
        ];
    }


}

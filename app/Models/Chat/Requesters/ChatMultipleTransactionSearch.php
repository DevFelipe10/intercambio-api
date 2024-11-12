<?php

namespace App\Models\Chat\Requesters;

/**
 * Class responsable to save body request from /adicionarUsuariosSala endpoint
 */
class ChatMultipleTransactionSearch
{
    public $id_usuario_logado;

    /**
     * @var TransactionsNumbers[] $numeros_transacao_unimeds
     */
    public $numeros_transacao_unimeds;

    public function __construct(array $array)
    {
        $this->id_usuario_logado = $array['idUsuarioLogado'];
        foreach($array['numerosTransacaoUnimeds'] as $block)
            $this->numeros_transacao_unimeds[] = new TransactionsNumbers($block);
    }

    public function toArray(): array{
        $array = [
            'idUsuarioLogado' => $this->id_usuario_logado,
            'numerosTransacaoUnimeds' => []
        ];

        foreach ($this->numeros_transacao_unimeds as $obj) {
            array_push($array['numerosTransacaoUnimeds'], $obj->toArray());
        }

        return $array;
    }
}

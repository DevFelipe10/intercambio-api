<?php

namespace App\Models\Chat\Requesters;

/**
 * Class responsable to save body request from /pesquisarTransacoesIntegracao endpoint
 */
class ChatTransactionPanel
{
    public $id_usuario_logado;
    public $numero_transacao;
    public $codigo_unimed_origem;
    public $codigo_unimed_executora;
    public $pagina_atual;
    public $quantidade_itens_pag;

    public function __construct(array $array)
    {
        $this->id_usuario_logado = $array['idUsuarioLogado'];
        $this->numero_transacao = $array['numeroTransacao'];
        $this->codigo_unimed_origem = $array['codigoUnimedOrigem'];
        $this->codigo_unimed_executora = $array['codigoUnimedExecutora'];
        $this->pagina_atual = $array['paginaAtual'];
        $this->quantidade_itens_pag = $array['quantidadeItensPag'];
    }

    public function toArray(): array{
        return [
            'idUsuarioLogado' => $this->id_usuario_logado,
            'numeroTransacao' => $this->numero_transacao,
            'codigoUnimedOrigem' => $this->codigo_unimed_origem,
            'codigoUnimedExecutora' => $this->codigo_unimed_executora,
            'paginaAtual' => $this->pagina_atual,
            'quantidadeItensPag' => $this->quantidade_itens_pag,
        ];
    }
}

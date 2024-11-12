<?php

namespace App\Models\Chat\Requesters;

/**
 * Class responsable to save body request from /pesquisarTransacoesUni endpoint
 */
class ChatUnitaryTransactionSearch
{

    public $id_usuario_logado;
    public $numero_transacao;
    public $cod_unimed_origem;
    public $cod_unimed_executora;
    public $codigo_beneficiario;
    public $tipo_solicitacao;
    public $dt_atualizacao_inicio;
    public $dt_pedido_inicio;
    public $dt_pedido_fim;
    public $numero_transacao_inicial;
    public $id_usuario_responsavel;
    public $pendencia;
    public $vencimento;
    public $codigo_unimed_admin;

    public function __construct(array $array)
    {
        $this->id_usuario_logado = $array['idUsuarioLogado'] ?? null;
        $this->numero_transacao = $array['numeroTransacao'] ?? null;
        $this->cod_unimed_origem = $array['codUnimedOrigem'] ?? null;
        $this->cod_unimed_executora = $array['codUnimedExecutora'] ?? null;
        $this->codigo_beneficiario = $array['codigoBeneficiario'] ?? null;
        $this->tipo_solicitacao = $array['tipoSolicitacao'] ?? null;
        $this->dt_atualizacao_inicio = $array['dtAtualizacaoInicio'] ?? null;
        $this->dt_pedido_inicio = $array['dtPedidoInicio'] ?? null;
        $this->dt_pedido_fim = $array['dtPedidoFim'] ?? null;
        $this->numero_transacao_inicial = $array['numeroTransacaoInicial'] ?? null;
        $this->id_usuario_responsavel = $array['idUsuarioResponsavel'] ?? null;
        $this->pendencia = $array['pendencia'] ?? null;
        $this->vencimento = $array['vencimento'] ?? null;
        $this->codigo_unimed_admin = $array['codigoUnimedAdmin'] ?? null;
    }

    public function toArray(): array
    {
        return [
            'idUsuarioLogado' => $this->id_usuario_logado,
            'numeroTransacao' => $this->numero_transacao,
            'codUnimedOrigem' => $this->cod_unimed_origem,
            'codUnimedExecutora' => $this->cod_unimed_executora,
            'codigoBeneficiario' => $this->codigo_beneficiario,
            'tipoSolicitacao' => $this->tipo_solicitacao,
            'dtAtualizacaoInicio' => $this->dt_atualizacao_inicio,
            'dtPedidoInicio' => $this->dt_pedido_inicio,
            'dtPedidoFim' => $this->dt_pedido_fim,
            'numeroTransacaoInicial' => $this->numero_transacao_inicial,
            'idUsuarioResponsavel' => $this->id_usuario_responsavel,
            'pendencia' => $this->pendencia,
            'vencimento' => $this->vencimento,
            'codigoUnimedAdmin' => $this->codigo_unimed_admin,
        ];
    }
}

<?php

namespace App\Models\Chat\Requesters;

/**
 * Class responsable to save body request from /criarSalaAutorizacao endpoint
 */
class ChatFind
{

    public $id_usuario;
    public $numero_transacao;
    public $cod_unimed_origem;
    public $cod_unimed_executora;
    public $tipo_solicitacao;
    public $codigo_beneficiario;
    public $dt_criacao_autorizacao;
    public $cod_chat;
    public $array_usuarios_conversa;
    public $nr_trans_ref;

    public function __construct(array $array)
    {
        $this->id_usuario = $array['idUsuario'];
        $this->cod_unimed_origem = $array['codUnimedOrigem'];
        $this->cod_unimed_executora = $array['codUnimedExecutora'];
        $this->numero_transacao = $array['numeroTransacao'];
        $this->tipo_solicitacao = $array['tipoSolicitacao'];
        $this->codigo_beneficiario = $array['codigoBeneficiario'];
        $this->dt_criacao_autorizacao = $array['dtCriacaoAutorizacao'];
        $this->cod_chat = $array['codChat'];
        $this->array_usuarios_conversa = $array['arrayIdUsuariosAdicionadosNaConvesa'];
        $this->nr_trans_ref = $array['nrTransRef'];
    }

    public function toArray(): array
    {
        return [
            'idUsuario' => $this->id_usuario,
            'numeroTransacao' => $this->numero_transacao,
            'codUnimedOrigem' => $this->cod_unimed_origem,
            'codUnimedExecutora' => $this->cod_unimed_executora,
            'tipoSolicitacao' => $this->tipo_solicitacao,
            'codigoBeneficiario' => $this->codigo_beneficiario,
            'dtCriacaoAutorizacao' => $this->dt_criacao_autorizacao,
            'codChat' => $this->cod_chat,
            'arrayIdUsuariosAdicionadosNaConvesa' => $this->array_usuarios_conversa,
            'nrTransRef' => $this->nr_trans_ref
        ];
    }
}

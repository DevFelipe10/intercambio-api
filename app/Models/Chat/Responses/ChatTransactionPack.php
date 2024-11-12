<?php

namespace App\Models\Chat\Responses;

/**
 * Class responsable to save data request from /pesquisarTransacoes endpoint
 */
class ChatTransactionPack
{
    public $numero_transacao;
    public $nr_trans_ref;
    public $codigo_beneficiario_formatado;
    public $codigo_unimed_executora;
    public $codigo_unimed_origem;
    public $tipo_solicitacao;
    public $data_transacao;
    public $data_ultima_atualizacao;
    public $usuario_ultima_atualizacao;
    public $status_outra_unimed;
    public $status_anexo;
    public $status_mensagem;
    public $status_encerramento;
    public $usuario_responsavel_minha_unimed;
    public $cor_fundo_vencimento;

    public function __construct(array $array)
    {
        $this->numero_transacao = $array['numeroTransacao'];
        $this->nr_trans_ref = $array['nrTransRef'];
        $this->codigo_beneficiario_formatado = $array['codigoBeneficiarioFormatado'];
        $this->codigo_unimed_executora = $array['codigoUnimedExecutora'];
        $this->codigo_unimed_origem = $array['codigoUnimedOrigem'];
        $this->tipo_solicitacao = $array['tipoSolicitacao'];
        $this->data_transacao = $array['dataTransacao'];
        $this->data_ultima_atualizacao = $array['dataUltimaAtualizacao'];
        $this->usuario_ultima_atualizacao = $array['usuarioUltimaAtualizacao'];
        $this->status_outra_unimed = $array['statusOutraUnimed'];
        $this->status_anexo = $array['statusAnexo'];
        $this->status_mensagem = $array['statusMensagem'];
        $this->status_encerramento = $array['statusEncerramento'];
        $this->usuario_responsavel_minha_unimed = $array['usuarioResponsavelMinhaUnimed'];
        $this->cor_fundo_vencimento = $array['corFundoVencimento'];
    }

    public function toArray(): array
    {
        return [
            'numeroTransacao' => $this->numero_transacao,
            'nrTransRef' => $this->nr_trans_ref,
            'codigoBeneficiarioFormatado' => $this->codigo_beneficiario_formatado,
            'codigoUnimedExecutora' => $this->codigo_unimed_executora,
            'codigoUnimedOrigem' => $this->codigo_unimed_origem,
            'tipoSolicitacao' => $this->tipo_solicitacao,
            'dataTransacao' => $this->data_transacao,
            'dataUltimaAtualizacao' => $this->data_ultima_atualizacao,
            'usuarioUltimaAtualizacao' => $this->usuario_ultima_atualizacao,
            'statusOutraUnimed' => $this->status_outra_unimed,
            'statusAnexo' => $this->status_anexo,
            'statusMensagem' => $this->status_mensagem,
            'statusEncerramento' => $this->status_encerramento,
            'usuarioResponsavelMinhaUnimed' => $this->usuario_responsavel_minha_unimed,
            'corFundoVencimento' => $this->cor_fundo_vencimento
        ];
    }
}
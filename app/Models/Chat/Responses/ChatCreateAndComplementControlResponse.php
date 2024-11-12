<?php

namespace App\Models\Chat\Responses;


class ChatCreateAndComplementControlResponse
{
    /**
     * @var ChatUser $usuario
     */
    public $usuario;
    public $codigo;
    public $numero_transacao;
    public $data_criacao;
    public $data_ultima_conversa;
    public $status_sala;
    public $codigo_unimed_solicitante;
    public $codigo_unimed_atendente;
    public $tipo_solicitacao;
    public $codigo_beneficiario;
    public $dt_criacao_autorizacao;
    public $nr_trans_ref;

    public function __construct(array $arrayIn)
    {
        isset($arrayIn['sala']) ? $array = $arrayIn['sala'] : $array = $arrayIn['salaAutorizacao'];
        if($array != []){
            $criador = $array['criador'];
            $this->codigo = $array['codigo'];
            $this->numero_transacao = $array['numeroTransacao'];
            $this->data_criacao = $array['dataCriacao'];
            $this->data_ultima_conversa = $array['dataUltimaConversa'];
            $this->usuario = new ChatUser($criador);
            $this->status_sala = $array['statusSala'];
            $this->codigo_unimed_solicitante = $array['codigoUnimedSolicitante'];
            $this->codigo_unimed_atendente = $array['codigoUnimedAtendente'];
            $this->tipo_solicitacao = $array['tipoSolicitacao'];
            $this->codigo_beneficiario = $array['codigoBeneficiario'];
            $this->dt_criacao_autorizacao = $array['dtCriacaoAutorizacao'];
            $this->nr_trans_ref = $array['nrTransRef'];
        }
    }

    public function toArray(): array{
        return [
            'codigo' => $this->codigo,
            'numeroTransacao' => $this->numero_transacao,
            'dataCriacao' => $this->data_criacao,
            'dataUltimaConversa' => $this->data_ultima_conversa,
            'statusSala' => $this->status_sala,
            'codigoUnimedSolicitante' => $this->codigo_unimed_solicitante,
            'codigoUnimedAtendente' => $this->codigo_unimed_atendente,
            'tipoSolicitacao' => $this->tipo_solicitacao,
            'codigoBeneficiario' => $this->codigo_beneficiario,
            'dtCriacaoAutorizacao' => $this->dt_criacao_autorizacao,
            'nrTransRef' => $this->nr_trans_ref,
            'usuario' => $this->usuario != null ? $this->usuario->toArray() : null
        ];
    }

}

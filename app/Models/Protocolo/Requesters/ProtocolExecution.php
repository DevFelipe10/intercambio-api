<?php

namespace App\Models\Protocolo\Requesters;

/**
 * Class responsable to save body request from /encaminhar-execucao endpoint
 */
class ProtocolExecution
{
    /**
     * @var Transaction $transacao
     */
    private $transacao;
    public $cd_unimed = null;
    public $id_benef = null;
    public $nome = null;
    public $cd_cpf = null;
    public $ddd = null;
    public $telefone = null;
    public $email = null;
    public $tp_manifestacao = null;
    public $tp_categoria_manifestacao = null;
    public $nr_transacao_intercambio = null;
    public $nr_protocolo_anterior = null;
    public $mensagem = null;

    public function __construct(array $array)
    {
        $exec = $array['encaminhar_execucao'];
        $this->transacao = new Transaction($array['cabecalho_transacao']);
        $this->cd_unimed = isset($exec['cd_unimed']) ? $exec['cd_unimed'] : null;
        $this->id_benef = isset($exec['id_benef']) ? $exec['id_benef'] : null ;
        $this->nome = $exec['nome'];
        $this->cd_cpf = isset($exec['cd_cpf']) ? $exec['cd_cpf'] : null;
        $this->ddd = $exec['ddd'];
        $this->telefone = $exec['telefone'];
        $this->email = $exec['email'];
        $this->tp_manifestacao = $exec['tp_manifestacao'];
        $this->tp_categoria_manifestacao = $exec['tp_categoria_manifestacao'];
        $this->nr_transacao_intercambio = $exec['nr_transacao_intercambio'];
        $this->nr_protocolo_anterior = $exec['nr_protocolo_anterior'];
        $this->mensagem = $exec['mensagem'];
    }

    public function toArray(): array{
        return [
            'cd_unimed' => $this->cd_unimed,
            'id_benef' => $this->id_benef,
            'nome' => $this->nome,
            'cd_cpf' => $this->cd_cpf,
            'ddd' => $this->ddd,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'tp_manifestacao' => $this->tp_manifestacao,
            'tp_categoria_manifestacao' => $this->tp_categoria_manifestacao,
            'nr_transacao_intercambio' => $this->nr_transacao_intercambio,
            'nr_protocolo_anterior' => $this->nr_protocolo_anterior,
            'mensagem' => $this->mensagem,
        ];
    }

    public function getTransacao()
    {
        return $this->transacao;
    }

}

<?php

namespace App\Models\Protocolo\Requesters;


/**
 * Class responsable to save body request from /solicitar-protocolo endpoint
 */
class ProtocolRequest
{
    /**
     * @var Transaction $transacao
     */
    private $transacao;
    public string $nome;
    public $cd_unimed;
    public $id_benef;
    public $cd_cpf;
    public $ddd;
    public $telefone;
    public $email;
    public $cd_uf;
    public $cd_cidade;
    public $cd_uni_atendimento;
    public $tp_manifestacao;
    public $tp_categoria_manifestacao;
    public $id_resposta;
    public $nr_transacao_intercambio;
    public $nr_protocolo_anterior;
    public $mensagem;
    public $id_sistema;

    public function __construct(array $array)
    {
        $solicitar = $array['solicitar_protocolo'];
        $this->transacao = new Transaction($array['cabecalho_transacao']);
        $this->nome = $solicitar['nome'];
        $this->cd_unimed = $solicitar['cd_unimed'];
        $this->id_benef = $solicitar['id_benef'];
        $this->cd_cpf = $solicitar['cd_cpf'];
        $this->ddd = $solicitar['ddd'];
        $this->telefone = $solicitar['telefone'];
        $this->email = $solicitar['email'];
        $this->cd_uf = $solicitar['cd_uf'];
        $this->cd_cidade = $solicitar['cd_cidade'];
        $this->cd_uni_atendimento = $solicitar['cd_uni_atendimento'];
        $this->tp_manifestacao = $solicitar['tp_manifestacao'];
        $this->tp_categoria_manifestacao = $solicitar['tp_categoria_manifestacao'];
        $this->id_resposta = isset($solicitar['id_resposta']) ? $solicitar['id_resposta'] : null;
        $this->nr_transacao_intercambio = $solicitar['nr_transacao_intercambio'];
        $this->nr_protocolo_anterior = $solicitar['nr_protocolo_anterior'];
        $this->mensagem = $solicitar['mensagem'];
        $this->id_sistema = isset($solicitar['id_sistema']) ? $solicitar['id_sistema'] : null;
    }

    public function toArray(): array
    {
        $array = [
            'nome' => $this->nome,
            'cd_unimed' => $this->cd_unimed,
            'id_benef' => $this->id_benef,
            'cd_cpf' => $this->cd_cpf,
            'ddd' => $this->ddd,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'cd_uf' => $this->cd_uf,
            'cd_cidade' => $this->cd_cidade,
            'cd_uni_atendimento' => $this->cd_uni_atendimento,
            'tp_manifestacao' => $this->tp_manifestacao,
            'tp_categoria_manifestacao' => $this->tp_categoria_manifestacao,
            // 'id_resposta' => $this->id_resposta,
            'nr_transacao_intercambio' => $this->nr_transacao_intercambio,
            'nr_protocolo_anterior' => $this->nr_protocolo_anterior,
            'mensagem' => $this->mensagem,
            'id_sistema' => $this->id_sistema,
        ];
        if ($this->id_resposta != null) {
            $array['id_resposta'] = $this->id_resposta;
        }
        return $array;
    }

    public function getTransacao()
    {
        return $this->transacao;
    }

}

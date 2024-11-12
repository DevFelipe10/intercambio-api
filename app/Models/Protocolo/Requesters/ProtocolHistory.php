<?php

namespace App\Models\Protocolo\Requesters;

/**
 * Class responsable to save body request from /consulta-historico endpoint
 */
class ProtocolHistory
{
    /**
     * @var Transaction $transacao
     */
    private $transacao;
    public $cd_unimed;
    public $id_benef;
    public $dt_inicio_historico;
    public $dt_fim_historico;

    public function __construct(array $array)
    {
        $consulta = $array['consulta_historico'];
        $this->transacao = new Transaction($array['cabecalho_transacao']);
        $this->id_benef = $consulta['id_benef'];
        $this->cd_unimed = $consulta['cd_unimed'];
        $this->dt_inicio_historico = $consulta['dt_inicio_historico'];
        $this->dt_fim_historico = $consulta['dt_fim_historico'];
    }

    public function toArray(): array{
        return [
            'id_benef' => $this->id_benef,
            'cd_unimed' => $this->cd_unimed,
            'dt_inicio_historico' => $this->dt_inicio_historico,
            'dt_fim_historico' => $this->dt_fim_historico,
        ];
    }

    public function getTransacao(): Transaction{
        return $this->transacao;
    }

}

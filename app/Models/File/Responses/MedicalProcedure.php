<?php

namespace App\Models\File\Responses;


class MedicalProcedure
{
    public $grupo_servico;
    public $tipo;
    public $cbhpm;
    public $amb;
    public $descricao;
    public $valor;
    public $numero_auxiliares;
    public $porte_anestesico;
    public $documentacao_obrigatoria;

    public function __construct(array $array)
    {
        $this->grupo_servico = $array['grupoServico'];
        $this->tipo = $array['tipo'];
        $this->cbhpm = $array['cbhpm'];
        $this->amb = $array['amb'];
        $this->descricao = $array['descricao'];
        $this->valor = $array['valor'];
        $this->numero_auxiliares = $array['numeroAuxiliares'];
        $this->porte_anestesico = $array['porteAnestesico'];
        $this->documentacao_obrigatoria = $array['documentacaoObrigatoria'];
    }

    public function toArray(): array
    {
        return [
            'grupoServico' => $this->grupo_servico,
            'tipo' => $this->tipo,
            'cbhpm' => $this->cbhpm,
            'amb' => $this->amb,
            'descricao' => $this->descricao,
            'valor' => $this->valor,
            'numeroAuxiliares' => $this->numero_auxiliares,
            'porteAnestesico' => $this->porte_anestesico,
            'documentacaoObrigatoria' => $this->documentacao_obrigatoria,
        ];
    }
}

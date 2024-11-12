<?php

namespace App\Models\File\Responses;

class FileAttachControlResponse
{
    /**
     * @var MedicalProcedure[] $procedimento_medico
     */
    public $procedimento_medico;
    public $qtd_anexos_sala;
    public $mensagem;

    public function __construct(array $array)
    {
        foreach ($array['procedimentoMedico'] as $key) {
            $this->procedimento_medico[] = new MedicalProcedure($key);
        }
        $this->qtd_anexos_sala = $array['qtdAnexosSala'];
        $this->mensagem = $array['mensagem'];
    }

    public function toArray(): array
    {
        return [
            'procedimentoMedico' => array_map(function ($obj) {return $obj->toArray();}
            , $this->procedimento_medico),
            'qtdAnexosSala' => $this->qtd_anexos_sala,
            'mensagem' => $this->mensagem,
        ];
    }
}

<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CabecalhoTransacaoRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $validator = Validator::make($value, [
            'cd_transacao' => 'required|string|size:3',
            'tp_cliente' => 'required|string|in:PORTAL,UNIMED,CONTINGENCIA,GUIA_MEDICO,WHATSAPP',
            'cd_uni_origem' => 'required|string|size:4',
            'cd_uni_destino' => 'required_without:nr_ans|string|size:4',
            'nr_ans' => 'required_without:cd_uni_destino|string|size:6',
            'nr_transacao_prestadora' => 'required|string|size:10',
            'dt_cancelamento' => 'sometimes|required|date_format:Y-m-d H:i:s',
            'dt_manifestacao' => 'sometimes|required|date_format:Y-m-d H:i:s',
            'id_usuario' => 'required|string|max:100',
            'nr_versao_protocolo' => 'required|string|size:3',
        ]);

        if ($validator->fails()) {
            $fail($validator->messages());
        }
    }
}

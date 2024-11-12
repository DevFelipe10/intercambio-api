<?php

namespace App\Http\Requests\Protocol;

use App\Rules\CabecalhoTransacaoRule;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProtocolHistoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            /**
             * @var array{"cd_transacao": "009", "tp_cliente": "UNIMED", "cd_uni_origem": "0137", "cd_uni_destino": "0667", "nr_ans": "337188", "nr_transacao_prestadora": "0000046846", "dt_cancelamento": "2020-08-01 12:00:00", "id_usuario": "teste", "nr_versao_protocolo": "001"}
             */
            'cabecalho_transacao' => ['required', new CabecalhoTransacaoRule],

            /**
             * Consulta historico do protocolo em um periodo
             * @example {"cd_unimed" : "0137", "id_benef": "0000000000006", "dt_inicio_historico": "2024-01-01 00:00:00", "dt_fim_historico": "2024-02-01 00:00:00"}
             */
            'consulta_historico' => 'required',
            'consulta_historico.cd_unimed' => 'required|string|size:4',
            'consulta_historico.id_benef' => 'required|string|size:13',
            'consulta_historico.dt_inicio_historico' => 'required|date_format:Y-m-d H:i:s',
            'consulta_historico.dt_fim_historico' => 'required|date_format:Y-m-d H:i:s',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()
                ->json(['errors' => $validator->errors()], 422)
        );
    }
}

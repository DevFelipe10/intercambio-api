<?php

namespace App\Http\Requests\Protocol;

use App\Rules\CabecalhoTransacaoRule;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProtocolCancelRequest extends FormRequest
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
             * @example{"cd_transacao": "011", "tp_cliente": "UNIMED", "cd_uni_origem": "0137", "cd_uni_destino": "0667", "nr_ans": "337188", "nr_transacao_prestadora": "0000046846", "dt_cancelamento": "2020-08-01 12:00:00", "id_usuario": "teste", "nr_versao_protocolo": "001"}
             * @var array{"cd_transacao": "011", "tp_cliente": "UNIMED", "cd_uni_origem": "0137", "cd_uni_destino": "0667", "nr_ans": "337188", "nr_transacao_prestadora": "0000046846", "dt_cancelamento": "2020-08-01 12:00:00", "id_usuario": "teste", "nr_versao_protocolo": "001"}
             */
            'cabecalho_transacao' => ['required', new CabecalhoTransacaoRule],

            /**
             * Cancelar protocolo
             * @example{"cd_unimed": "0666", "id_benef": "0000000000006", "nr_protocolo": "00000000000000000000", "motivo_cancelamento": "Teste"}
             */
            'cancelamento' => 'required',
            'cancelamento.cd_unimed' => 'required|string|size:4',
            'cancelamento.id_benef' => 'required|string|size:13',
            'cancelamento.nr_protocolo' => 'required|string|size:20',
            'cancelamento.motivo_cancelamento' => 'required|string|max:1000',
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

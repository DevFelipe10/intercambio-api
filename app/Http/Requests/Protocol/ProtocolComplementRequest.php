<?php

namespace App\Http\Requests\Protocol;

use App\Rules\CabecalhoTransacaoRule;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProtocolComplementRequest extends FormRequest
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
             * @var array{"cd_transacao": "003", "tp_cliente": "UNIMED", "cd_uni_origem": "0137", "cd_uni_destino": "0667", "nr_ans": "337188", "nr_transacao_prestadora": "0000046846", "dt_cancelamento": "2020-08-01 12:00:00", "id_usuario": "teste", "nr_versao_protocolo": "001"}
             */
            'cabecalho_transacao' => ['required', new CabecalhoTransacaoRule],

            /**
             * @example{"nome": "teste", "cd_unimed": "0666", "id_benef": "0000000000006", "nr_protocolo": "00000000000000000000", "nr_transacao_intercambio": "0000054545",  "nr_protocolo": "00000000000000000000", "mensagem": "Teste", "id_resposta": 3}
             */
            'pedido_complemento_protocolo' => 'required',
            'pedido_complemento_protocolo.cd_unimed' => 'required|string|size:4',
            'pedido_complemento_protocolo.id_benef' => 'required|string|size:13',
            'pedido_complemento_protocolo.nr_protocolo' => 'required|string|size:20',
            'pedido_complemento_protocolo.mensagem' => 'required|string|max:1000',
            'pedido_complemento_protocolo.nr_transacao_intercambio' => 'required|string|size:10',
            'pedido_complemento_protocolo.id_resposta' => 'required|int'
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

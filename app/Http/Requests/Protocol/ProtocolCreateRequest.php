<?php

namespace App\Http\Requests\Protocol;

use App\Models\Protocolo\Requesters\ProtocolRequest;
use App\Rules\CabecalhoTransacaoRule;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProtocolCreateRequest extends FormRequest
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
             * Cabeçalho de transação
             * @example{"cd_transacao": "001", "tp_cliente": "UNIMED", "cd_uni_origem": "0137", "cd_uni_destino": "0667", "nr_ans": "322831", "nr_transacao_prestadora": "0000046846", "dt_manifestacao": "2020-08-01 12:00:00", "id_usuario": "teste", "nr_versao_protocolo": "001"}
             * @var array{"cd_transacao": "001", "tp_cliente": "UNIMED", "cd_uni_origem": "0137", "cd_uni_destino": "0667", "nr_ans": "322831", "nr_transacao_prestadora": "0000046846", "dt_manifestacao": "2020-08-01 12:00:00", "id_usuario": "teste", "nr_versao_protocolo": "001"}
             */
            'cabecalho_transacao' => ['required', new CabecalhoTransacaoRule],

            /**
             * Solicitar protocolo
             * @example{"nome": "teste", "cd_unimed": "0666", "id_benef": "0000000000006", "cd_cpf": "09520811990", "ddd": "11", "telefone": "988887777", "email": "teste@teste.com", "cd_uf": "SC", "cd_cidade": "4205407", "cd_uni_atendimento": "0025", "tp_manifestacao": "7", "tp_categoria_manifestacao": [ 18 ], "id_resposta": 3, "nr_transacao_intercambio": "0000054545", "nr_protocolo_anterior": "00000000000000000000", "mensagem": "Teste"}
             */
            'solicitar_protocolo' => 'required',
            'solicitar_protocolo.nome' => 'required|string|max:70',
            'solicitar_protocolo.cd_unimed' => 'required|string|size:4',
            'solicitar_protocolo.id_benef' => 'required|string|size:13',
            'solicitar_protocolo.cd_cpf' => 'required|string|size:11',
            'solicitar_protocolo.ddd' => 'required|string|max:4',
            'solicitar_protocolo.telefone' => 'required|string|size:9',
            'solicitar_protocolo.email' => 'required|string|max:70',
            'solicitar_protocolo.cd_uf' => 'required|string|size:2',
            'solicitar_protocolo.cd_cidade' => 'required|string|max:70',
            'solicitar_protocolo.cd_uni_atendimento' => 'required|string|size:4',
            'solicitar_protocolo.tp_manifestacao' => 'required|string|size:1',
            'solicitar_protocolo.tp_categoria_manifestacao' => 'required|array|size:1',
            'solicitar_protocolo.id_resposta' => 'required|int|min:1|max:3',
            'solicitar_protocolo.nr_transacao_intercambio' => 'required|string|size:10',
            'solicitar_protocolo.nr_protocolo_anterior' => "sometimes|required|size:20",
            'solicitar_protocolo.mensagem' => 'required|string|max:4000',
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

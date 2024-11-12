<?php

namespace App\Http\Requests\Protocol;

use App\Rules\CabecalhoTransacaoRule;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ProtocolExecutionRequest extends FormRequest
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
             * Cabeçalho transação
             * @var array{"cd_transacao": "013", "tp_cliente": "UNIMED", "cd_uni_origem": "0137", "cd_uni_destino": "0667", "nr_ans": "337188", "nr_transacao_prestadora": "0000046846", "dt_cancelamento": "2020-08-01 12:00:00", "id_usuario": "teste", "nr_versao_protocolo": "001"}
             */
            'cabecalho_transacao' => ['required', new CabecalhoTransacaoRule],

            /**
             * Encaminhar execução
             * @example{"nome": "teste", "cd_unimed": "0666", "id_benef": "0000000000006", "cd_cpf": "09520811990", "ddd": "11", "telefone": "988887777", "email": "teste@teste.com", "tp_manifestacao": "7", "tp_categoria_manifestacao": [ 18 ], "id_resposta": 3, "nr_transacao_intercambio": "0000054545", "nr_protocolo_anterior": "00000000000000000000", "mensagem": "Teste"}
             */
            'encaminhar_execucao' => 'required',
            'encaminhar_execucao.nome' => 'required|string|max:70',
            'encaminhar_execucao.cd_unimed' => 'required|string|size:4',
            'encaminhar_execucao.id_benef' => 'required|string|size:13',
            'encaminhar_execucao.cd_cpf' => 'required|string|size:11',
            'encaminhar_execucao.ddd' => 'required|string|max:4',
            'encaminhar_execucao.telefone' => 'required|string|size:9',
            'encaminhar_execucao.email' => 'required|string|max:70',
            'encaminhar_execucao.tp_manifestacao' => 'required|string|size:1',
            'encaminhar_execucao.tp_categoria_manifestacao' => 'required|array|size:1',
            'encaminhar_execucao.nr_transacao_intercambio' => 'required|string|size:10',
            'encaminhar_execucao.nr_protocolo_anterior' => 'required|string|size:20',
            'encaminhar_execucao.mensagem' => 'required|string|max:4000',
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

<?php

namespace App\Http\Requests\Chat;

use App\Rules\CabecalhoTransacaoRule;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ChatUnitaryTransactionSearchRequest extends FormRequest
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
            'idUsuarioLogado' => 'required|string|max:255',
            'numeroTransacao' => 'nullable|string|max:255',
            'cdUnimedorigem' => 'nullable|string|max:4',
            'cdUnimedExecutora' => 'nullable|string|max:4',
            'codigoBeneficiario' => 'nullable|string|max:16',
            'dtAtualizacaoInicio' => 'nullable|date_format:Y/m/dH:i:sP',
            'dtAtualizacaoFim' => 'nullable|date_format:Y/m/dH:i:sP',
            'dtPedidoInicio' => 'nullable|date_format:Y/m/dH:i:sP',
            'dtPedidoFim' => 'nullable|date_format:Y/m/dH:i:sP',
            'numeroTransacaoInicial' => 'nullable|string|max:255',
            'idusuarioResponsavel' => 'nullable|string|max:255',
            'pendencia' => 'nullable|string|max:255',
            'tipoSolicitacao' => 'nullable|string|max:255',
            'vencimento' => 'nullable|date_format:Y/m/dH:i:sP',
            'codigoUnimedAdmin' => 'nullable|string|max:255'
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

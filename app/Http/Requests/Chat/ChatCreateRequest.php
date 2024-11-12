<?php

namespace App\Http\Requests\Chat;

use App\Rules\CabecalhoTransacaoRule;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class ChatCreateRequest extends FormRequest
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
            'idUsuario' => 'required|string|size:15',
            'numeroTransacao' => 'required|string|size:15',
            'codUnimedOrigem' => 'required|string|size:4',
            'codUnimedExecutora' => 'required|string|size:4',
            'tipoSolicitacao' => 'required|string|max:30',
            'codigoBeneficiario' => 'required|string|size:16',
            'dtCriacaoAutorizacao' => 'required|string|date_format:Y-m-d\TH:i:s',
            'codChat' => 'required|int|in:1',
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

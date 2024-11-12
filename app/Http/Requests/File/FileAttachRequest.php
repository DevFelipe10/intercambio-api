<?php

namespace App\Http\Requests\File;

use App\Rules\CabecalhoTransacaoRule;
use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class FileAttachRequest extends FormRequest
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
             * @example {"arquivo: "attachFile", idUsuario: "08557428600-137", cdUnimedExecutora: "0666", "numeroTransacao": "000000000054545"}
            *  @var array{"arquivo: "attachFile", idUsuario: "08557428600-137", cdUnimedExecutora: "0666", "numeroTransacao": "000000000054545"}
             */
            'arquivo' => 'required|file',
            'idUsuario' => 'required|string|size:15',
            'cdUnimedExecutora' => 'required|string|size:4',
            'numeroTransacao' => 'required|string|size:15',
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

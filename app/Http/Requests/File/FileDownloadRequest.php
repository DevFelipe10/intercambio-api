<?php

namespace App\Http\Requests\File;

use Illuminate\Foundation\Http\FormRequest;
use \Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class FileDownloadRequest extends FormRequest
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
             * @example {"idAnexos: ["55077096", "55077268"], idUsuario: "08557428600-137"}
            *  @var array{"idAnexos: ["55077096", "55077268"], idUsuario: "08557428600-137"}
             */
            'idAnexos' => 'required|array|max:10',
            'idUsuario' => 'required|string|size:15',
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

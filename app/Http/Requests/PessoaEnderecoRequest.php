<?php

namespace App\Http\Requests;

use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

use Illuminate\Foundation\Http\FormRequest;

class PessoaEnderecoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'cd_pessoa' => 'required|integer|exists:pessoas,cd_pessoa',
            'id_principal' => 'required|integer|between:0,1',
            'id_tipo' => 'required|integer',
            'ds_endereco' => 'required|max:250',
            'nr_endereco' => 'integer',
            'ds_complemento' => 'max:250',
            'nm_bairro' => 'required|max:250',
            'nr_cep' => 'required|max:8',
            'cd_cidade' => 'required|integer|exists:cidades,cd_cidade',
        ];
    }

    /**
     * @param Validator $validator
     */
    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        throw new HttpResponseException(
            response()->json(['error' => $errors], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}

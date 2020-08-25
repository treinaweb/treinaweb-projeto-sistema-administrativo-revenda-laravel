<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class EmpresaRequest extends FormRequest
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
            'tipo' => ['required', Rule::in(['cliente', 'fornecedor'])],
            'nome' => ['required', 'max:255'],
            'razao_social' => ['max:255'],
            'documento' => ['required'],
            'nome_contato' => ['required', 'max:255'],
            'celular' => ['required', 'size:11'],
            'email' => ['required', 'email'],
            'telefone' => ['size:10'],
            'cep' => ['required', 'size:8'],
            'logradouro' => ['required', 'max:255'],
            'bairro' => ['required', 'max:50'],
            'cidade' => ['required', 'max:50'],
            'estado' => ['required', 'size:2']
        ];
    }
}

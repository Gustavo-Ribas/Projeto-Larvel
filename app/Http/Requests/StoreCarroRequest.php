<?php

namespace App\Http\Requests;

use App\Models\Carro;
use Illuminate\Foundation\Http\FormRequest;

class StoreCarroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create', Carro::class);
    }

    public function rules(): array
    {
        return [
            'marca_id' => 'required|exists:marcas,id',
            'modelo'   => 'required|string|min:2',
            'ano'      => 'required|integer|min:1950|max:' . (date('Y') + 1),
            'preco'    => 'required|numeric|min:0',
            'cor'      => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'marca_id.required' => 'Selecione uma marca.',
            'marca_id.exists'   => 'A marca selecionada é inválida.',
            'modelo.required'   => 'Informe o modelo do carro.',
            'ano.required'      => 'Informe o ano do carro.',
            'preco.required'    => 'Informe o preço do carro.',
            'cor.required'      => 'Informe a cor do carro.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'code' => ['required', 'string', 'size:2'],
            'name' => ['required', 'string', 'max:52'],
            'population' => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Поле «Код» не може бути порожнім.',
            'code.size' => 'Код має містити рівно 2 символи.',
            'name.required' => 'Поле «Назва» не може бути порожнім.',
            'name.max' => 'Назва не може бути довшою за 52 символи.',
            'population.required' => 'Поле «Населення» не може бути порожнім.',
            'population.integer' => 'Населення має бути цілим числом.',
            'population.min' => 'Населення не може бути від\'ємним.',
        ];
    }
}

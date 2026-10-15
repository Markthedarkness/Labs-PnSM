<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле «Ім\'я» не може бути порожнім.',
            'name.min' => 'Ім\'я має містити щонайменше 2 символи.',
            'email.required' => 'Поле «Email» не може бути порожнім.',
            'email.email' => 'Email введено некоректно.',
            'message.required' => 'Поле «Повідомлення» не може бути порожнім.',
            'message.min' => 'Повідомлення має містити щонайменше 10 символів.',
        ];
    }
}

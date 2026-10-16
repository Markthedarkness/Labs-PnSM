<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PatientRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $patientId = $this->route('patient')?->id;

        return [
            'first_name' => ['required', 'string', 'min:2', 'max:50'],
            'last_name' => ['required', 'string', 'min:2', 'max:50'],
            'birth_date' => ['required', 'date', 'before:today'],
            'phone' => ['required', 'string', 'max:20', 'regex:/^\+?[0-9\s\-]{10,20}$/'],
            'email' => [
                'required', 'email', 'max:100',
                Rule::unique('patients', 'email')->ignore($patientId),
            ],
            'diagnosis' => ['nullable', 'string', 'max:255'],
            'gender' => ['required', Rule::in(['M', 'F'])],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => 'Поле «Ім\'я» не може бути порожнім.',
            'first_name.min' => 'Ім\'я має містити щонайменше 2 символи.',
            'last_name.required' => 'Поле «Прізвище» не може бути порожнім.',
            'birth_date.required' => 'Вкажіть дату народження.',
            'birth_date.before' => 'Дата народження не може бути в майбутньому.',
            'phone.required' => 'Вкажіть номер телефону.',
            'phone.regex' => 'Телефон введено некоректно. Формат: +380XXXXXXXXX.',
            'email.required' => 'Поле «Email» не може бути порожнім.',
            'email.email' => 'Email введено некоректно.',
            'email.unique' => 'Пацієнт із таким email уже існує.',
            'gender.required' => 'Оберіть стать.',
            'gender.in' => 'Стать має бути M або F.',
            'last_name.required' => 'Поле «Прізвище» не може бути порожнім.',
            'last_name.min' => 'Прізвище має містити щонайменше 2 символи.',
        ];
    }
}

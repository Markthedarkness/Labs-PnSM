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
            'doctor' => ['required', 'string', 'in:Терапевт,Кардіолог,Невролог,Педіатр,Дерматолог'],
            'appointment_date' => ['required', 'date', 'date_format:Y-m-d', 'after_or_equal:today'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Поле «Ім\'я» не може бути порожнім.',
            'name.min' => 'Ім\'я має містити щонайменше 2 символи.',
            'email.required' => 'Поле «Email» не може бути порожнім.',
            'email.email' => 'Email введено некоректно.',
            'doctor.required' => 'Будь ласка, оберіть лікаря.',
            'doctor.in' => 'Обраний лікар недоступний. Оберіть зі списку.',
            'appointment_date.required' => 'Будь ласка, оберіть дату прийому.',
            'appointment_date.date' => 'Дата введена некоректно.',
            'appointment_date.date_format' => 'Дата має бути у форматі РРРР-ММ-ДД.',
            'appointment_date.after_or_equal' => 'Дата прийому не може бути в минулому.',
        ];
    }
}

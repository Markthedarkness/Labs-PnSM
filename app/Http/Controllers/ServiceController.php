<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;

class ServiceController extends Controller
{
    public function index()
    {
        $services = [
            [
                'title' => 'Консультація терапевта',
                'price' => '450 грн',
                'duration' => '30 хв',
                'description' => 'Загальний огляд, консультація щодо скарг та призначення лікування.',
            ],
            [
                'title' => 'Консультація кардіолога',
                'price' => '650 грн',
                'duration' => '40 хв',
                'description' => 'Обстеження серцево-судинної системи, розшифрування ЕКГ.',
            ],
            [
                'title' => 'УЗД-діагностика',
                'price' => '700 грн',
                'duration' => '30 хв',
                'description' => 'Ультразвукове дослідження внутрішніх органів.',
            ],
            [
                'title' => 'Лабораторні аналізи',
                'price' => 'від 200 грн',
                'duration' => '15 хв',
                'description' => 'Забір крові, сечі та інших біоматеріалів для дослідження.',
            ],
        ];

        $pageTitle = 'Наші послуги';
        $clinicPhone = '+38 (044) 123-45-67';

        return view('service.index', compact('services', 'pageTitle', 'clinicPhone'));
    }

    public function contact()
    {
        return view('service.contact');
    }

    public function contactStore(ContactRequest $request)
    {
        return view('service.contact-confirm', $request->validated());
    }
}

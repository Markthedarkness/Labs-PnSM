<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    public function run(): void
    {
        $doctors = [
            ['name' => 'Іваненко Олег Петрович',   'specialty' => 'Терапевт',   'phone' => '+380501110011'],
            ['name' => 'Петренко Марія Іванівна',  'specialty' => 'Кардіолог',  'phone' => '+380671112222'],
            ['name' => 'Коваленко Сергій Олегович','specialty' => 'Невролог',   'phone' => '+380632223333'],
            ['name' => 'Шевченко Олена Василівна', 'specialty' => 'Педіатр',    'phone' => '+380954444444'],
            ['name' => 'Мельник Андрій Петрович',  'specialty' => 'Дерматолог', 'phone' => '+380675555555'],
        ];

        foreach ($doctors as $doctor) {
            Doctor::firstOrCreate(['name' => $doctor['name']], $doctor);
        }
    }
}

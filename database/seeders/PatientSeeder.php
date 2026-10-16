<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatientSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('patients')->insert([
            [
                'first_name' => 'Марк', 'last_name' => 'Бабіцький',
                'birth_date' => '2003-05-12', 'phone' => '+380501234567',
                'email' => 'mark@example.com', 'diagnosis' => 'Гіпертонія',
                'gender' => 'M',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'first_name' => 'Олена', 'last_name' => 'Петренко',
                'birth_date' => '1985-11-23', 'phone' => '+380671112233',
                'email' => 'olena.p@example.com', 'diagnosis' => 'Астма',
                'gender' => 'F',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'first_name' => 'Іван', 'last_name' => 'Коваленко',
                'birth_date' => '1978-02-08', 'phone' => '+380632223344',
                'email' => 'ivan.k@example.com', 'diagnosis' => 'Діабет II типу',
                'gender' => 'M',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'first_name' => 'Марія', 'last_name' => 'Шевченко',
                'birth_date' => '1992-07-30', 'phone' => '+380954445566',
                'email' => 'maria.sh@example.com', 'diagnosis' => 'Мігрень',
                'gender' => 'F',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'first_name' => 'Андрій', 'last_name' => 'Мельник',
                'birth_date' => '2000-03-15', 'phone' => '+380675556677',
                'email' => 'andriy.m@example.com', 'diagnosis' => null,
                'gender' => 'M',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'first_name' => 'Софія', 'last_name' => 'Бондаренко',
                'birth_date' => '1995-09-02', 'phone' => '+380936667788',
                'email' => 'sofia.b@example.com', 'diagnosis' => 'Алергія',
                'gender' => 'F',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'first_name' => 'Олег', 'last_name' => 'Ткаченко',
                'birth_date' => '1988-12-19', 'phone' => '+380507778899',
                'email' => 'oleg.t@example.com', 'diagnosis' => 'Артрит',
                'gender' => 'M',
                'created_at' => now(), 'updated_at' => now(),
            ],
            [
                'first_name' => 'Наталія', 'last_name' => 'Кравченко',
                'birth_date' => '1980-06-25', 'phone' => '+380668889900',
                'email' => 'natalia.k@example.com', 'diagnosis' => 'Гіпотиреоз',
                'gender' => 'F',
                'created_at' => now(), 'updated_at' => now(),
            ],
        ]);
    }
}

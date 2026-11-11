<?php

namespace Database\Seeders;

use App\Models\Filter;
use Illuminate\Database\Seeder;

class FilterSeeder extends Seeder
{
    public function run(): void
    {
        $names = [
            'PHP',
            'Laravel',
            'JavaScript',
            'Vue.js',
            'React',
            'Node.js',
            'CSS',
            'HTML',
            'SQL',
            'Git',
            'Docker',
            'Linux',
        ];

        foreach ($names as $name) {
            Filter::firstOrCreate(['filter_name' => $name]);
        }
    }
}

<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\PatientTranslation;
use Illuminate\Database\Seeder;

class PatientTranslationSeeder extends Seeder
{
    public function run(): void
    {
        $patients = Patient::orderBy('id')->take(7)->get();

        foreach ($patients as $i => $patient) {
            // Переклад українською (основна мова)
            PatientTranslation::updateOrCreate(
                [
                    'patient_id' => $patient->id,
                    'locale' => 'uk',
                ],
                [
                    'diagnosis' => $patient->diagnosis ?? 'Не вказано',
                    'notes' => 'Нотатки українською для ' . $patient->full_name,
                ]
            );

            // Переклад англійською
            $englishDiagnosis = [
                'Гіпертонія' => 'Hypertension',
                'Астма' => 'Asthma',
                'Діабет II типу' => 'Type 2 diabetes',
                'Мігрень' => 'Migraine',
                'Алергія' => 'Allergy',
                'Артрит' => 'Arthritis',
                'Гіпотиреоз' => 'Hypothyroidism',
            ];

            PatientTranslation::updateOrCreate(
                [
                    'patient_id' => $patient->id,
                    'locale' => 'en',
                ],
                [
                    'diagnosis' => $englishDiagnosis[$patient->diagnosis] ?? ($patient->diagnosis ?? 'Not specified'),
                    'notes' => 'English notes for ' . $patient->full_name,
                ]
            );
        }
    }
}

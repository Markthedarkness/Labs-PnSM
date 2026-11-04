<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Patient extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'birth_date',
        'phone',
        'email',
        'diagnosis',
        'gender',
    ];

    protected $casts = [
        'birth_date' => 'date',
    ];

    public function translations(): HasMany
    {
        return $this->hasMany(PatientTranslation::class, 'patient_id', 'id');
    }

    public function translation(?string $locale = null): ?PatientTranslation
    {
        $locale = $locale ?? app()->getLocale();

        return $this->translations->firstWhere('locale', $locale);
    }

    public function getFullNameAttribute(): string
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getAgeAttribute(): int
    {
        return $this->birth_date->age;
    }

    /**
     * Діагноз з урахуванням перекладу.
     * Fallback: якщо перекладу немає — повертаємо основний (українською).
     */
    public function getTranslatedDiagnosisAttribute(): string
    {
        $locale = request()->query('lang', 'uk');

        $translation = $this->translation($locale);
        $translated = $translation?->diagnosis;

        return $translated ?? $this->diagnosis ?? '—';
    }

    public function getTranslatedNotesAttribute(): ?string
    {
        $locale = request()->query('lang', 'uk');

        $translation = $this->translation($locale);

        return $translation?->notes ?? $this->diagnosis;
    }
}

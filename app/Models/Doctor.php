<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Doctor extends Model
{
    protected $fillable = ['name', 'specialty', 'phone'];

    public function patients(): BelongsToMany
    {
        return $this->belongsToMany(
            Patient::class,
            'doctor_patient',
            'doctor_id',
            'patient_id'
        );
    }
}

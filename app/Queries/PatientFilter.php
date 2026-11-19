<?php

namespace App\Queries;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Builder;

class PatientFilter
{
    private const SORTABLE = [
        'lastName' => 'patients.last_name',
        'firstName' => 'patients.first_name',
        'birthDate' => 'patients.birth_date',
        'created' => 'patients.created_at',
    ];

    public function apply(array $input): Builder
    {
        $query = Patient::query()
            ->withCount('doctors')
            ->with('doctors')
            ->select('patients.*');

        $query->when(
            $input['search'] ?? null,
            fn (Builder $q, $value) => $q->where(function ($q) use ($value) {
                $q->where('last_name', 'like', "%{$value}%")
                    ->orWhere('first_name', 'like', "%{$value}%");
            })
        );

        $query->when(
            $input['gender'] ?? null,
            fn (Builder $q, $value) => $q->where('gender', $value)
        );

        $query->when(
            $input['doctor_id'] ?? null,
            fn (Builder $q, $value) => $q->whereHas(
                'doctors',
                fn (Builder $related) => $related->whereKey($value)
            )
        );

        $query->when(
            $input['diagnosis'] ?? null,
            fn (Builder $q, $value) => $q->where('diagnosis', 'like', "%{$value}%")
        );

        return $this->sort($query, $input['sort'] ?? null);
    }

    private function sort(Builder $query, ?string $sort): Builder
    {
        $desc = str_starts_with($sort ?? '', '-');
        $field = $desc ? substr($sort, 1) : $sort;

        if (!isset(self::SORTABLE[$field])) {
            return $query
                ->orderBy('patients.last_name')
                ->orderBy('patients.first_name');
        }

        return $query
            ->orderBy(self::SORTABLE[$field], $desc ? 'desc' : 'asc')
            ->orderBy('patients.last_name');
    }
}

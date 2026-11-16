<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientRequest;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Models\Doctor;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $query = Patient::query()->withCount('doctors');

        // Фільтрація за статтю
        if ($request->filled('gender')) {
            $query->where('gender', $request->input('gender'));
        }

        // Пошук за прізвищем
        if ($request->filled('search')) {
            $query->where('last_name', 'like', '%' . $request->input('search') . '%');
        }

        $patients = $query
            ->orderBy('last_name')
            ->paginate(5)
            ->withQueryString(); // зберігає фільтри при пагінації

        return view('patient.index', compact('patients'));
    }

    public function create()
    {
        return view('patient.create', [
            'doctors' => Doctor::orderBy('name')->pluck('name', 'id'),
            'selectedDoctors' => [],
        ]);
    }

    public function store(PatientRequest $request)
    {
        Patient::create($request->validated());

        return redirect()->route('patient.index')
            ->with('success', 'Пацієнта успішно додано.');
    }

    public function show(Patient $patient)
    {
        return view('patient.show', compact('patient'));
    }

    public function edit(Patient $patient)
    {
        $patient->load('doctors');

        return view('patient.edit', [
            'patient' => $patient,
            'doctors' => Doctor::orderBy('name')->pluck('name', 'id'),
            'selectedDoctors' => $patient->doctors->pluck('id')->all(),
        ]);
    }

    public function update(PatientRequest $request, Patient $patient)
    {
        $data = $request->validated();

        $patient->update(\Illuminate\Support\Arr::except($data, ['doctors']));
        $patient->doctors()->sync($data['doctors'] ?? []);

        return redirect()->route('patient.index')
            ->with('success', 'Дані пацієнта оновлено.');
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()->route('patient.index')
            ->with('success', 'Пацієнта видалено.');
    }
}

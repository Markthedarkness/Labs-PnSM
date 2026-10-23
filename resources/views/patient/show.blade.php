@extends('layouts.app')

@section('title', $patient->full_name)

@section('content')
    <h1>{{ $patient->full_name }}</h1>

    <p><strong>Вік:</strong> {{ $patient->age }} років</p>
    <p><strong>Стать:</strong> {{ $patient->gender === 'M' ? 'Чоловіча' : 'Жіноча' }}</p>
    <p><strong>Дата народження:</strong> {{ $patient->birth_date->format('d.m.Y') }}</p>
    <p><strong>Телефон:</strong> {{ $patient->phone }}</p>
    <p><strong>Email:</strong> {{ $patient->email }}</p>
    <p><strong>Діагноз:</strong> {{ $patient->diagnosis ?? '—' }}</p>

    <p><a href="{{ route('patient.edit', $patient) }}">Редагувати</a></p>

    <form method="POST" action="{{ route('patient.destroy', $patient) }}"
          onsubmit="return confirm('Видалити пацієнта?');">
        @csrf
        @method('DELETE')
        <button type="submit">Видалити</button>
    </form>

    <p><a href="{{ route('patient.index') }}">← Повернутися до списку</a></p>
@endsection

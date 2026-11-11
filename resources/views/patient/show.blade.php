@extends('layouts.app')

@section('title', $patient->full_name)

@section('content')
    @php
        $lang = request()->query('lang', 'uk');
    @endphp

    <h1>{{ $patient->full_name }}</h1>

    <p>
        <strong>Мова відображення:</strong>
        <a href="{{ route('patient.show', ['patient' => $patient, 'lang' => 'uk']) }}">🇺🇦 Українська</a>
        |
        <a href="{{ route('patient.show', ['patient' => $patient, 'lang' => 'en']) }}">🇬🇧 English</a>
    </p>

    <p><strong>Вік:</strong> {{ $patient->age }} років</p>
    <p><strong>Стать:</strong> {{ $patient->gender === 'M' ? 'Чоловіча' : 'Жіноча' }}</p>
    <p><strong>Дата народження:</strong> {{ $patient->birth_date->format('d.m.Y') }}</p>
    <p><strong>Телефон:</strong> {{ $patient->phone }}</p>
    <p><strong>Email:</strong> {{ $patient->email }}</p>

    <hr>

    <h2>
        @if ($lang === 'en') Diagnosis @else Діагноз @endif
    </h2>
    @if ($patient->doctors->isNotEmpty())
        <p>
            <strong>Лікарі:</strong>
            @foreach ($patient->doctors as $doctor)
                <span class="blog-category">{{ $doctor->name }} ({{ $doctor->specialty }})</span>
            @endforeach
        </p>
    @endif
    <p>{{ $patient->translated_diagnosis }}</p>

    <h2>
        @if ($lang === 'en') Notes @else Нотатки @endif
    </h2>
    <p>{{ $patient->translated_notes }}</p>

    <hr>

    <p><a href="{{ route('patient.edit', $patient) }}">Редагувати</a></p>

    <form method="POST" action="{{ route('patient.destroy', $patient) }}"
          onsubmit="return confirm('Видалити пацієнта?');">
        @csrf
        @method('DELETE')
        <button type="submit">Видалити</button>
    </form>

    <p><a href="{{ route('patient.index') }}">← Повернутися до списку</a></p>
@endsection

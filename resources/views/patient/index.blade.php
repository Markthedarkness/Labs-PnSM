@extends('layouts.app')

@section('title', 'Пацієнти')

@section('content')
    <h1>Пацієнти</h1>

    @if (session('success'))
        <div class="flash-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('patient.index') }}" class="filter-form">
        <div class="filter-row">
            <label for="search">Пошук</label>
            <input type="text" id="search" name="search"
                   placeholder="Ім'я або прізвище"
                   value="{{ request('search') }}">
        </div>

        <div class="filter-row">
            <label for="gender">Стать</label>
            <select id="gender" name="gender">
                <option value="">Усі</option>
                <option value="M" @selected(request('gender') === 'M')>Чоловіча</option>
                <option value="F" @selected(request('gender') === 'F')>Жіноча</option>
            </select>
        </div>

        <div class="filter-row">
            <label for="doctor_id">Лікар</label>
            <select id="doctor_id" name="doctor_id">
                <option value="">Усі лікарі</option>
                @foreach ($doctors as $id => $name)
                    <option value="{{ $id }}" @selected(request('doctor_id') == $id)>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="filter-row">
            <label for="diagnosis">Діагноз</label>
            <input type="text" id="diagnosis" name="diagnosis"
                   placeholder="Пошук за діагнозом"
                   value="{{ request('diagnosis') }}">
        </div>

        <input type="hidden" name="sort" value="{{ request('sort') }}">

        <button type="submit">Застосувати</button>
        <a href="{{ route('patient.index') }}">Скинути</a>
    </form>

    <p><a href="{{ route('patient.create') }}">Додати пацієнта</a></p>

    @php
        $currentSort = request('sort');
        $sortUrl = function (string $field) use ($currentSort) {
            $nextSort = $currentSort === $field ? '-' . $field : $field;
            return route('patient.index', array_merge(
                request()->except('sort', 'page'),
                ['sort' => $nextSort]
            ));
        };
        $sortArrow = function (string $field) use ($currentSort) {
            if ($currentSort === $field) return ' ↑';
            if ($currentSort === '-' . $field) return ' ↓';
            return '';
        };
    @endphp

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>
                <a href="{{ $sortUrl('lastName') }}">
                    ПІБ{!! $sortArrow('lastName') !!}
                </a>
            </th>
            <th>Вік</th>
            <th>Стать</th>
            <th>
                <a href="{{ $sortUrl('birthDate') }}">
                    Дата народження{!! $sortArrow('birthDate') !!}
                </a>
            </th>
            <th>Діагноз</th>
            <th>Лікарів</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($patients as $i => $patient)
            <tr>
                <td>{{ $patients->firstItem() + $i }}</td>
                <td>
                    <a href="{{ route('patient.show', $patient) }}">
                        {{ $patient->full_name }}
                    </a>
                </td>
                <td>{{ $patient->age }}</td>
                <td>{{ $patient->gender === 'M' ? 'Ч' : 'Ж' }}</td>
                <td>{{ $patient->birth_date->format('d.m.Y') }}</td>
                <td>{{ $patient->translated_diagnosis }}</td>
                <td>{{ $patient->doctors_count }}</td>
                <td>
                    <a href="{{ route('patient.edit', $patient) }}">Редагувати</a>
                </td>
            </tr>
        @empty
            <tr><td colspan="8">Пацієнтів не знайдено.</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $patients->links() }}
@endsection

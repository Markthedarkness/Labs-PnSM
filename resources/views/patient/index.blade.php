@extends('layouts.app')

@section('title', 'Пацієнти')

@section('content')
    <h1>Пацієнти</h1>

    @if (session('success'))
        <div class="flash-success">{{ session('success') }}</div>
    @endif

    <form method="GET" action="{{ route('patient.index') }}" class="filter-form">
        <input type="text" name="search" placeholder="Пошук за прізвищем"
               value="{{ request('search') }}">

        <select name="gender">
            <option value="">Усі статі</option>
            <option value="M" {{ request('gender') === 'M' ? 'selected' : '' }}>Чоловіча</option>
            <option value="F" {{ request('gender') === 'F' ? 'selected' : '' }}>Жіноча</option>
        </select>

        <button type="submit">Фільтрувати</button>
        <a href="{{ route('patient.index') }}">Скинути</a>
    </form>

    <p>
        <a href="{{ route('patient.create') }}">Додати пацієнта</a>
    </p>

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>ПІБ</th>
            <th>Вік</th>
            <th>Стать</th>
            <th>Телефон</th>
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
                <td>{{ $patient->phone }}</td>
                <td>
                    <a href="{{ route('patient.edit', $patient) }}">Редагувати</a>
                </td>
            </tr>
        @empty
            <tr><td colspan="6">Пацієнтів не знайдено.</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $patients->links() }}
@endsection

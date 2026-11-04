@extends('layouts.app')

@section('title', 'Статистика за методами')

@section('content')
    <h1>Статистика за HTTP-методами</h1>

    <p>
        <a href="{{ route('stats.pages') }}">← Повернутися до зведення</a>
    </p>

    <table>
        <thead>
        <tr>
            <th>Метод</th>
            <th>Звернень</th>
            <th>Унікальних IP</th>
            <th>Останній візит</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($rows as $row)
            <tr>
                <td><strong>{{ $row->method }}</strong></td>
                <td>{{ $row->hits }}</td>
                <td>{{ $row->visitors }}</td>
                <td>{{ $row->last_visit ? \Carbon\Carbon::parse($row->last_visit)->format('d.m.Y H:i:s') : '—' }}</td>
            </tr>
        @empty
            <tr><td colspan="4">Записів немає.</td></tr>
        @endforelse
        </tbody>
    </table>
@endsection

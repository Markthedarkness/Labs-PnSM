@extends('layouts.app')

@section('title', 'Статистика відвідувань')

@section('content')
    <h1>Статистика відвідувань</h1>

    <p>
        <a href="{{ route('stats.pages', ['type' => 'page']) }}">За сторінками</a>
        <a href="{{ route('stats.pages', ['type' => 'ip']) }}">За IP-адресами</a>
        <a href="{{ route('stats.methods') }}">За методами</a>
    </p>

    <p>
        <strong>Групування:</strong>
        {{ $type === 'page' ? 'за сторінками' : 'за IP-адресами' }}
    </p>

    <table>
        <thead>
        <tr>
            <th>{{ $type === 'page' ? 'Сторінка' : 'IP-адреса' }}</th>
            <th>Звернень</th>
            <th>Унікальних IP</th>
            <th>Останній візит</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($rows as $row)
            <tr>
                <td>
                    <a href="{{ route('stats.detail', ['type' => $type, 'item' => $row->{$type}]) }}">
                        {{ $row->{$type} }}
                    </a>
                </td>
                <td>{{ $row->hits }}</td>
                <td>{{ $row->visitors }}</td>
                <td>{{ $row->last_visit ? \Carbon\Carbon::parse($row->last_visit)->format('d.m.Y H:i:s') : '—' }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="4">Записів немає.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
@endsection

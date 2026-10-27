@extends('layouts.app')

@section('title', 'Детальна статистика')

@section('content')
    <h1>Детальна статистика</h1>

    <p>
        <strong>Фільтр:</strong>
        {{ $type }} = {{ $item }}
    </p>

    <p>
        <a href="{{ route('stats.pages', ['type' => $type]) }}">← Повернутися до зведення</a>
    </p>

    <table>
        <thead>
        <tr>
            <th>#</th>
            <th>Час</th>
            <th>Сторінка</th>
            <th>IP</th>
            <th>Код</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($rows as $i => $row)
            <tr>
                <td>{{ $rows->firstItem() + $i }}</td>
                <td>{{ $row->visited_at->format('d.m.Y H:i:s') }}</td>
                <td>{{ $row->page }}</td>
                <td>{{ $row->ip }}</td>
                <td>{{ $row->status }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $rows->links() }}
@endsection

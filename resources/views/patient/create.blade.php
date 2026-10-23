@extends('layouts.app')

@section('title', 'Додати пацієнта')

@section('content')
    <h1>Додати пацієнта</h1>

    <form method="POST" action="{{ route('patient.store') }}">
        @csrf
        @include('patient._form')
        <button type="submit">Зберегти</button>
    </form>

    <p><a href="{{ route('patient.index') }}">← Повернутися до списку</a></p>
@endsection

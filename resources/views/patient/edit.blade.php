@extends('layouts.app')

@section('title', 'Редагування пацієнта')

@section('content')
    <h1>Редагування пацієнта: {{ $patient->full_name }}</h1>

    <form method="POST" action="{{ route('patient.update', $patient) }}">
        @csrf
        @method('PUT')
        @include('patient._form')
        <button type="submit">Зберегти зміни</button>
    </form>

    <p><a href="{{ route('patient.index') }}">← Повернутися до списку</a></p>
@endsection

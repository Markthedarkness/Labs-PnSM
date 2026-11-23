@extends('layouts.app')

@section('title', 'Панель керування')

@section('content')
    <h1>Вітаємо, {{ auth()->user()->name }}!</h1>
    <p>Ви успішно увійшли в систему MedCare.</p>

    <p>
        <strong>Email:</strong> {{ auth()->user()->email }}
    </p>

    <p>
        <a href="{{ route('blog.admin') }}">Адміністрування блогу</a>
    </p>

    <p>
        <a href="{{ route('patient.index') }}">Пацієнти</a>
    </p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Вийти</button>
    </form>
@endsection

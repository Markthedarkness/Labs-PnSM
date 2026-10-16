@extends('layouts.app')

@section('title', 'Заявку прийнято')

@section('content')
    <h1>Заявку прийнято</h1>

    <p>
        Дякуємо за звернення! Наш адміністратор зв'яжеться з вами
        найближчим часом для підтвердження запису.
    </p>

    <h2>Деталі запису</h2>
    <ul>
        <li><strong>Ім'я:</strong> {{ $name }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Лікар:</strong> {{ $doctor }}</li>
        <li><strong>Бажана дата прийому:</strong> {{ $appointment_date }}</li>
    </ul>

    <p>
        <a href="{{ route('appointment.index') }}">← Повернутися до послуг</a>
    </p>
@endsection

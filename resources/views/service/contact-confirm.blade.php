@extends('layouts.app')

@section('title', 'Заявку прийнято')

@section('content')
    <h1>Заявку прийнято</h1>

    <p>
        Дякуємо за звернення! Наш адміністратор зв'яжеться з вами
        найближчим часом.
    </p>

    <h2>Ваші дані</h2>
    <ul>
        <li><strong>Ім'я:</strong> {{ $name }}</li>
        <li><strong>Email:</strong> {{ $email }}</li>
        <li><strong>Повідомлення:</strong> {{ $message }}</li>
    </ul>

    <p>
        <a href="{{ route('service.index') }}">← Повернутися до послуг</a>
    </p>
@endsection

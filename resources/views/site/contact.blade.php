@extends('layouts.app')

@section('title', 'Контакти')

@section('content')
    <h1>Контакти</h1>

    <p>Зв'язатися з нами можна такими способами:</p>

    <ul>
        <li><strong>Адреса:</strong> м. Київ, вул. Медична, 1</li>
        <li><strong>Телефон:</strong> +38 (044) 123-45-67</li>
        <li><strong>Email:</strong> info@medcare.ua</li>
        <li><strong>Години роботи:</strong> Пн–Пт, 8:00–20:00</li>
    </ul>

    <p>
        Для звернення до адміністрації системи скористайтеся
        <a href="{{ route('entry.form') }}">формою зворотного зв'язку</a>.
    </p>
@endsection

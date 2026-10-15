@extends('layouts.app')

@section('title', 'Запис на прийом')

@section('content')
    <h1>Запис на прийом</h1>

    <p>
        Заповніть форму, і наш адміністратор зв'яжеться з вами
        найближчим часом для підтвердження запису.
    </p>

    @if ($errors->any())
        <div class="errors-box">
            <strong>Будь ласка, виправте такі помилки:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('service.contact.store') }}" class="contact-form">
        @csrf

        <div class="form-group">
            <label for="name">Ім'я та прізвище</label>
            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name') }}"
                placeholder="Наприклад: Іван Петренко"
            >
            @error('name')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input
                type="text"
                id="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="you@example.com"
            >
            @error('email')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="message">Повідомлення</label>
            <textarea
                id="message"
                name="message"
                rows="6"
                placeholder="Опишіть, на яку послугу ви хочете записатися та зручний час..."
            >{{ old('message') }}</textarea>
            @error('message')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit">Надіслати заявку</button>
    </form>

    <style>
        .contact-form { margin-top: 20px; }
        .form-group { margin-bottom: 18px; }
        .form-group label {
            display: block;
            font-weight: 600;
            color: #1f2d3d;
            margin-bottom: 6px;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #c9d9e6;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
        }
        .form-group input:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #1488d8;
            box-shadow: 0 0 0 3px rgba(20, 136, 216, 0.15);
        }
        .error {
            color: #c0392b;
            font-size: 13px;
            margin-top: 4px;
        }
        .errors-box {
            background-color: #fdecea;
            border-left: 4px solid #c0392b;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            color: #7a2418;
        }
        .errors-box ul { margin: 8px 0 0 20px; }
        button[type="submit"] {
            background-color: #0b6fb8;
            color: #fff;
            border: none;
            padding: 12px 24px;
            border-radius: 6px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        button[type="submit"]:hover {
            background-color: #1488d8;
        }
    </style>
@endsection

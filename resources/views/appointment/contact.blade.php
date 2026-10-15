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

    <form method="POST" action="{{ route('appointment.contact.store') }}" class="contact-form">
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
            <label for="doctor">Оберіть лікаря</label>
            <select id="doctor" name="doctor">
                <option value="" disabled {{ old('doctor') ? '' : 'selected' }}>
                    — Оберіть зі списку —
                </option>
                <option value="Терапевт" {{ old('doctor') === 'Терапевт' ? 'selected' : '' }}>
                    Терапевт
                </option>
                <option value="Кардіолог" {{ old('doctor') === 'Кардіолог' ? 'selected' : '' }}>
                    Кардіолог
                </option>
                <option value="Невролог" {{ old('doctor') === 'Невролог' ? 'selected' : '' }}>
                    Невролог
                </option>
                <option value="Педіатр" {{ old('doctor') === 'Педіатр' ? 'selected' : '' }}>
                    Педіатр
                </option>
                <option value="Дерматолог" {{ old('doctor') === 'Дерматолог' ? 'selected' : '' }}>
                    Дерматолог
                </option>
            </select>
            @error('doctor')
            <p class="error">{{ $message }}</p>
            @enderror
        </div>

        <div class="form-group">
            <label for="appointment_date">Бажана дата прийому</label>
            <input
                type="date"
                id="appointment_date"
                name="appointment_date"
                value="{{ old('appointment_date') }}"
                min="{{ date('Y-m-d') }}"
            >
            @error('appointment_date')
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
        .form-group select {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #c9d9e6;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
            background-color: #ffffff;
        }
        .form-group input:focus,
        .form-group select:focus {
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

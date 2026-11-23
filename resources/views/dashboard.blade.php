@extends('layouts.app')

@section('title', 'Особистий кабінет')

@section('content')
    <h1>Вітаємо, {{ auth()->user()->name }}!</h1>
    <p>Ви успішно увійшли в систему MedCare.</p>

    <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
    <p><strong>Дата реєстрації:</strong> {{ auth()->user()->created_at->format('d.m.Y') }}</p>

    <hr>

    <h2>Ваші записи блогу</h2>

    @php
        $myBlogs = \App\Models\Blog::where('user_id', auth()->id())
            ->orderByDesc('dt_created')
            ->limit(5)
            ->get();
    @endphp

    @forelse ($myBlogs as $blog)
        <div class="blog-card" style="margin-bottom: 16px;">
            <div class="blog-card-body">
                <h3>
                    <a href="{{ route('blog.show', $blog) }}">{{ $blog->title }}</a>
                </h3>
                <p class="blog-meta">
                    {{ $blog->dt_created->format('d.m.Y H:i') }}
                </p>
            </div>
        </div>
    @empty
        <p>У вас ще немає записів. <a href="{{ route('blog.create') }}">Створити перший</a></p>
    @endforelse

    <p>
        <a href="{{ route('blog.create') }}">Додати новий запис</a>
    </p>

    <hr>

    <h2>Швидкі дії</h2>
    <ul>
        <li><a href="{{ route('blog.admin') }}">Адміністрування блогу</a></li>
        <li><a href="{{ route('patient.index') }}">Пацієнти</a></li>
        <li><a href="{{ route('stats.pages') }}">Статистика</a></li>
    </ul>

    <hr>

    <h2>Профіль</h2>
    <p>
        <a href="{{ route('profile.edit') }}">Редагувати профіль</a>
    </p>

    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Вийти</button>
    </form>
@endsection

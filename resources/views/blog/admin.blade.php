@extends('layouts.app')

@section('title', 'Адміністрування блогу')

@section('content')
    <h1>Адміністрування блогу</h1>

    <p><a href="{{ route('blog.create') }}">Додати запис</a></p>

    <form method="GET" action="{{ route('blog.admin') }}" class="filter-form">
        <input
            type="text"
            name="search"
            placeholder="Пошук за заголовком"
            value="{{ request('search') }}"
        >
        <select name="category_id">
            <option value="">Усі категорії</option>
            @foreach ($categories as $id => $name)
                <option
                    value="{{ $id }}"
                    @selected(request('category_id') == $id)
                >
                    {{ $name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Знайти</button>
        <a href="{{ route('blog.admin') }}">Скинути</a>
    </form>

    <table>
        <thead>
        <tr>
            <th>№</th>
            <th>Заголовок</th>
            <th>Категорія</th>
            <th>Створено</th>
            <th>Дії</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($blogs as $i => $blog)
            <tr>
                <td>{{ $blogs->firstItem() + $i }}</td>
                <td>
                    <a href="{{ route('blog.show', $blog) }}">{{ $blog->title }}</a>
                </td>
                <td>{{ $blog->category?->category_name ?? '—' }}</td>
                <td>{{ $blog->dt_created->format('d.m.Y H:i') }}</td>
                <td>
                    <a href="{{ route('blog.edit', $blog) }}">Редагувати</a>
                    <form method="POST" action="{{ route('blog.destroy', $blog) }}"
                          onsubmit="return confirm('Видалити запис?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Видалити</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="5">Записів немає.</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $blogs->links() }}
@endsection

@extends('layouts.app')

@section('title', 'Адміністрування блогу')

@section('content')
    <h1>Адміністрування блогу</h1>

    <p><a href="{{ route('blog.create') }}">Додати запис</a></p>

    {{-- Case3: форма пошуку з усіма фільтрами --}}
    <form method="GET" action="{{ route('blog.admin') }}" class="filter-form">
        <div class="filter-row">
            <label for="title">Заголовок</label>
            <input
                type="text"
                id="title"
                name="title"
                value="{{ request('title') }}"
                placeholder="Пошук за заголовком"
            >
        </div>

        <div class="filter-row">
            <label for="categoryName">Назва категорії</label>
            <input
                type="text"
                id="categoryName"
                name="categoryName"
                value="{{ request('categoryName') }}"
                placeholder="Назва категорії"
            >
        </div>

        <div class="filter-row">
            <label for="category_id">Категорія</label>
            <select id="category_id" name="category_id">
                <option value="">Усі категорії</option>
                @foreach ($categories as $id => $name)
                    <option value="{{ $id }}" @selected(request('category_id') == $id)>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="filter-row">
            <label for="filter_id">Мітка</label>
            <select id="filter_id" name="filter_id">
                <option value="">Усі мітки</option>
                @foreach ($filters as $id => $name)
                    <option value="{{ $id }}" @selected(request('filter_id') == $id)>
                        {{ $name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Приховане поле, щоб зберегти поточне сортування при пошуку --}}
        <input type="hidden" name="sort" value="{{ request('sort') }}">

        <button type="submit">Застосувати</button>
        <a href="{{ route('blog.admin') }}">Скинути фільтри</a>
    </form>

    {{-- Case2: сортування за кліком на заголовок --}}
    @php
        $currentSort = request('sort');

        $sortUrl = function (string $field) use ($currentSort) {
            $nextSort = $currentSort === $field ? '-' . $field : $field;

            return route('blog.admin', array_merge(
                request()->except('sort', 'page'),
                ['sort' => $nextSort]
            ));
        };

        $sortArrow = function (string $field) use ($currentSort) {
            if ($currentSort === $field) return ' ↑';
            if ($currentSort === '-' . $field) return ' ↓';
            return '';
        };
    @endphp

    <table>
        <thead>
        <tr>
            <th>№</th>
            <th>
                <a href="{{ $sortUrl('title') }}">
                    Заголовок{!! $sortArrow('title') !!}
                </a>
            </th>
            <th>
                <a href="{{ $sortUrl('categoryName') }}">
                    Категорія{!! $sortArrow('categoryName') !!}
                </a>
            </th>
            <th>Мітки</th>
            <th>
                <a href="{{ $sortUrl('created') }}">
                    Створено{!! $sortArrow('created') !!}
                </a>
            </th>
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
                <td>
                    @forelse ($blog->filters as $filter)
                        <span class="tag">{{ $filter->filter_name }}</span>
                    @empty
                        —
                    @endforelse
                </td>
                <td>{{ $blog->dt_created->format('d.m.Y H:i') }}</td>
                <td>
                    <a href="{{ route('blog.edit', $blog) }}">Редагувати</a>
                    <form method="POST" action="{{ route('blog.destroy', $blog) }}"
                          onsubmit="return confirm('Видалити запис?');"
                          style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Видалити</button>
                    </form>
                </td>
            </tr>
        @empty
            <tr><td colspan="6">Записів немає.</td></tr>
        @endforelse
        </tbody>
    </table>

    {{ $blogs->links() }}
@endsection

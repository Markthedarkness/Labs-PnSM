@extends('layouts.app')

@section('title', 'Блог')

@section('content')
    <h1>Блог</h1>

    <p><a href="{{ route('blog.admin') }}">Адміністрування</a></p>

    <nav class="blog-filters">
        <a href="{{ route('blog.index') }}"
           class="{{ !$filterId ? 'active' : '' }}">
            Усі записи
        </a>
        @foreach ($filters as $id => $name)
            <a href="{{ route('blog.index', ['filter' => $id]) }}"
               class="{{ $filterId == $id ? 'active' : '' }}">
                {{ $name }}
            </a>
        @endforeach
    </nav>

    <div class="blog-grid">
        @forelse ($blogs as $blog)
            @include('blog._item', ['blog' => $blog])
        @empty
            <p>Записів поки немає.</p>
        @endforelse
    </div>

    {{ $blogs->links() }}
@endsection

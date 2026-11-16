@extends('layouts.app')

@section('title', $blog->title)

@section('content')
    <div class="blog-post">
        <div class="blog-header">
            <span class="blog-category">
                {{ $blog->category?->category_name ?? 'Без категорії' }}
            </span>

            <h1>{{ $blog->title }}</h1>

            <p class="blog-meta">
                Автор: {{ $blog->author?->name ?? 'Редакція' }}
                &middot;
                {{ $blog->dt_created->format('d.m.Y H:i') }}
            </p>
        </div>

        <img
            src="{{ asset('images/blog-placeholder.jpg') }}"
            alt="{{ $blog->title }}"
            class="blog-post-image"
        >

        @if ($blog->description)
            <p class="blog-lead">
                <em>{{ $blog->description }}</em>
            </p>
        @endif

        @if ($blog->text)
            <div class="blog-text">
                {{ $blog->text }}
            </div>
        @endif

        <hr>

        <p>
            <a href="{{ route('blog.index') }}">← До всіх записів</a>
            <a href="{{ route('blog.edit', $blog) }}">Редагувати</a>
            <a href="{{ route('blog.tags', $blog) }}">Керувати мітками</a>
        </p>
    </div>

    @if ($blog->filters->isNotEmpty())
        <p>
            <strong>Мітки:</strong>
            @foreach ($blog->filters as $filter)
                <span class="blog-category">{{ $filter->filter_name }}</span>
            @endforeach
        </p>
    @endif
@endsection

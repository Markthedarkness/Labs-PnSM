@extends('layouts.app')

@section('title', 'Блог')

@section('content')
    <h1>Блог</h1>

    <p><a href="{{ route('blog.admin') }}">Адміністрування</a></p>

    <div class="blog-grid">
        @forelse ($blogs as $blog)
            @include('blog._item', ['blog' => $blog])
        @empty
            <p>Записів поки немає.</p>
        @endforelse
    </div>

    {{ $blogs->links() }}
@endsection

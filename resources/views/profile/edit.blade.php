@extends('layouts.app')

@section('title', 'Редагування профілю')

@section('content')
    <h1>Редагування профілю</h1>

    <p>
        <a href="{{ route('dashboard') }}">← Повернутися до кабінету</a>
    </p>

    <div class="profile-section" style="margin-top: 24px;">
        @include('profile.partials.update-profile-information-form')
    </div>

    <div class="profile-section" style="margin-top: 24px;">
        @include('profile.partials.update-password-form')
    </div>

    <div class="profile-section" style="margin-top: 24px;">
        @include('profile.partials.delete-user-form')
    </div>
@endsection

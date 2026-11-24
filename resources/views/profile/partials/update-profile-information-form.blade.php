<section>
    <header>
        <h2>{{ __('Profile Information') }}</h2>
        <p>{{ __("Update your account's profile information and email address.") }}</p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" style="margin-top: 16px;">
        @csrf
        @method('patch')

        <div style="margin-bottom: 16px;">
            <label for="name">{{ __('Name') }}</label>
            <input
                id="name"
                name="name"
                type="text"
                value="{{ old('name', $user->name) }}"
                required
                autofocus
                autocomplete="name"
            >
            @error('name') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div style="margin-bottom: 16px;">
            <label for="email">{{ __('Email') }}</label>
            <input
                id="email"
                name="email"
                type="email"
                value="{{ old('email', $user->email) }}"
                required
                autocomplete="username"
            >
            @error('email') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div style="display: flex; align-items: center; gap: 16px;">
            <button type="submit">Зберегти</button>

            @if (session('status') === 'profile-updated')
                <p style="color: #1e7a4d; font-size: 14px;">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

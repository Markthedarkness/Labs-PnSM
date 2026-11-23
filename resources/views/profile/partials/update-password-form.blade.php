<section>
    <header>
        <h2>{{ __('Update Password') }}</h2>
        <p>{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>
    </header>

    <form method="post" action="{{ route('password.update') }}" style="margin-top: 16px;">
        @csrf
        @method('put')

        <div style="margin-bottom: 16px;">
            <label for="update_password_current_password">{{ __('Current Password') }}</label>
            <input
                id="update_password_current_password"
                name="current_password"
                type="password"
                autocomplete="current-password"
            >
            @error('current_password') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div style="margin-bottom: 16px;">
            <label for="update_password_password">{{ __('New Password') }}</label>
            <input
                id="update_password_password"
                name="password"
                type="password"
                autocomplete="new-password"
            >
            @error('password') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div style="margin-bottom: 16px;">
            <label for="update_password_password_confirmation">{{ __('Confirm Password') }}</label>
            <input
                id="update_password_password_confirmation"
                name="password_confirmation"
                type="password"
                autocomplete="new-password"
            >
            @error('password_confirmation') <p class="error">{{ $message }}</p> @enderror
        </div>

        <div style="display: flex; align-items: center; gap: 16px;">
            <button type="submit">Зберегти</button>

            @if (session('status') === 'password-updated')
                <p style="color: #1e7a4d; font-size: 14px;">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

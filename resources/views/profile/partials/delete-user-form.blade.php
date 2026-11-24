<section>
    <header>
        <h2>{{ __('Delete Account') }}</h2>
        <p>{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}</p>
    </header>

    <button
        type="button"
        onclick="document.getElementById('confirm-user-deletion').showModal()"
        style="background-color: #c0392b; color: #fff; border: none; padding: 10px 20px; border-radius: 6px; font-size: 14px; font-weight: 600; cursor: pointer; margin-top: 16px;"
    >
        {{ __('Delete Account') }}
    </button>

    <dialog id="confirm-user-deletion" style="border: 1px solid #e1eef8; border-radius: 12px; padding: 24px; max-width: 500px;">
        <form method="post" action="{{ route('profile.destroy') }}">
            @csrf
            @method('delete')

            <h2>{{ __('Are you sure you want to delete your account?') }}</h2>
            <p>{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}</p>

            <div style="margin: 16px 0;">
                <label for="password">{{ __('Password') }}</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    placeholder="{{ __('Password') }}"
                >
                @error('password', 'userDeletion') <p class="error">{{ $message }}</p> @enderror
            </div>

            <div style="display: flex; gap: 12px; justify-content: flex-end;">
                <button type="button" onclick="document.getElementById('confirm-user-deletion').close()">
                    {{ __('Cancel') }}
                </button>
                <button type="submit" style="background-color: #c0392b;">
                    {{ __('Delete Account') }}
                </button>
            </div>
        </form>
    </dialog>
</section>

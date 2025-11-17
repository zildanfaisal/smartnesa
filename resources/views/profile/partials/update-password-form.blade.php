<section class="p-4" data-aos="fade-up">
    <div class="card" style="border:1px solid #e9ecef; border-radius:8px; background:#fff; padding:20px;">
        <div class="card-body">
            <h3 class="mb-3">{{ __('Update Password') }}</h3>
            <p class="text-muted" style="color:#6c757d; margin-bottom:16px;">{{ __('Ensure your account is using a long, random password to stay secure.') }}</p>

            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="current_password" class="form-label">{{ __('Current Password') }}</label>
                    <input id="current_password" name="current_password" type="password" class="form-control" autocomplete="current-password">
                    @if($errors->updatePassword)
                        @error('current_password', 'updatePassword')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    @endif
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('New Password') }}</label>
                    <input id="password" name="password" type="password" class="form-control" autocomplete="new-password">
                    @if($errors->updatePassword)
                        @error('password', 'updatePassword')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    @endif
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">{{ __('Confirm Password') }}</label>
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" autocomplete="new-password">
                    @if($errors->updatePassword)
                        @error('password_confirmation', 'updatePassword')<div class="text-danger mt-1">{{ $message }}</div>@enderror
                    @endif
                </div>

                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-primary w-auto">{{ __('Save') }}</button>

                    @if (session('status') === 'password-updated')
                        <div class="ms-3 text-success">{{ __('Saved.') }}</div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>

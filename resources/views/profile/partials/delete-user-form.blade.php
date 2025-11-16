<section class="p-4" data-aos="fade-up">
    <div class="card" style="border:1px solid #e9ecef; border-radius:8px; background:#fff; padding:20px;">
        <div class="card-body">
            <h3 class="mb-3">{{ __('Delete Account') }}</h3>
            <p class="text-muted" style="color:#6c757d; margin-bottom:16px;">{{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}</p>

            <form method="post" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                @csrf
                @method('delete')

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input id="password" name="password" type="password" class="form-control" placeholder="{{ __('Password') }}">
                    @error('password', 'userDeletion') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-secondary me-2 w-auto mr-2" onclick="history.back()">{{ __('Cancel') }}</button>
                    <button type="submit" class="btn btn-danger w-auto">{{ __('Delete Account') }}</button>
                </div>
            </form>
        </div>
    </div>
</section>

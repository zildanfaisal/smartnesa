<section class="p-4" data-aos="fade-up">
    <div class="card" style="border:1px solid #e9ecef; border-radius:8px; background:#fff; padding:20px;">
        <div class="card-body">
            <h3 class="mb-3" style="margin-bottom:12px;">{{ __('Profile Information') }}</h3>
            <p class="text-muted" style="color:#6c757d; margin-bottom:16px;">{{ __("Update your account's profile information and email address.") }}</p>

            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>

            <form method="post" action="{{ route('profile.update') }}">
                @csrf
                @method('patch')

                <div class="mb-3">
                    <label for="nama" class="form-label">{{ __('Name') }}</label>
                    <input id="nama" name="nama" type="text" class="form-control" value="{{ old('nama', $user->nama) }}" required autofocus>
                    @error('nama') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">{{ __('Username') }}</label>
                    <input id="username" name="username" type="text" class="form-control" value="{{ old('username', $user->username) }}" required>
                    @error('username') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input id="email" name="email" type="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                    @error('email') <div class="text-danger mt-1">{{ $message }}</div> @enderror

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div class="mt-2">
                            <p class="small text-muted">{{ __('Your email address is unverified.') }}
                                <button form="send-verification" class="btn btn-link p-0 ms-2">{{ __('Click here to re-send the verification email.') }}</button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <div class="alert alert-success mt-2">{{ __('A new verification link has been sent to your email address.') }}</div>
                            @endif
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="univ" class="form-label">{{ __('Universitas') }}</label>
                    <input id="univ" name="univ" type="text" class="form-control" value="{{ old('univ', $user->univ) }}">
                    @error('univ') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="jurusan" class="form-label">{{ __('Jurusan') }}</label>
                    <input id="jurusan" name="jurusan" type="text" class="form-control" value="{{ old('jurusan', $user->jurusan) }}">
                    @error('jurusan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mb-3">
                    <label for="angkatan" class="form-label">{{ __('Angkatan') }}</label>
                    <input id="angkatan" name="angkatan" type="text" class="form-control" value="{{ old('angkatan', $user->angkatan) }}">
                    @error('angkatan') <div class="text-danger mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="d-flex align-items-center">
                    <button type="submit" class="btn btn-primary w-auto">{{ __('Save') }}</button>

                    @if (session('status') === 'profile-updated')
                        <div class="ms-3 text-success">{{ __('Saved.') }}</div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>

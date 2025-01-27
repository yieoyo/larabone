@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <span>{{ __('global.login') }}</span>
                        <a href="{{ route('register') }}" class="btn btn-sm btn-secondary">{{ __('global.register') }}</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">{{ __('pages.users.fields.email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">{{ __('pages.users.fields.password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('global.remember_me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('global.login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link text-danger" href="{{ route('password.request') }}">
                                            {{ __('global.forgot_password') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                        <div class="row mb-3">
                            <div class="col-md-8 offset-md-4">
                                <!-- Add button to login with Google -->
                                <a href="#" class="btn btn-secondary">
                                    {{ __('global.google_login') }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8 mt-5">
                <div class="card">
                    <div class="card-header">{{ __('Click to fill Credentials') }}</div>

                    <div class="card-body">
                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="button" onclick="fillForm('super@bunk3r.net', 'secret')"
                                        class="btn btn-dark">
                                    Super Admin
                                </button>
                                <button type="button" onclick="fillForm('admin@bunk3r.net', 'secret')"
                                        class="btn btn-dark">
                                    Admin
                                </button>

                                <button type="button" onclick="fillForm('manager@bunk3r.net', 'secret')"
                                        class="btn btn-dark">
                                    Manager
                                </button>

                                <button type="button" onclick="fillForm('users@bunk3r.net', 'secret')"
                                        class="btn btn-dark">
                                    User
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>
        function fillForm(email, password) {
            // Set values for email and password fields
            document.getElementById('email').value = email;
            document.getElementById('password').value = password;
        }
    </script>
@endpush

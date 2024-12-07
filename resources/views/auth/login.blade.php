@extends('design.index')

@section('content')
    <style>
        .btn-primary:hover {
            background-color: #0056b3;
            /* Darker blue */
            transition: 0.3s;
        }

        a.text-decoration-none:hover {
            color: #0056b3;
            text-decoration: underline;
        }
    </style>
    <div class="container" style="margin-top: 100px; margin-bottom: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-lg">
                    <div class="card-header text-center bg-primary text-white" style="font-size: 1.5rem;">
                        {{ __('Login') }}
                    </div>

                    <div class="card-body p-4">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Field -->
                            <div class="mb-3">
                                <label for="email" class="form-label">{{ __('Email Address') }}</label>
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus
                                    placeholder="Enter your email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Password Field -->
                            <div class="mb-3">
                                <label for="password" class="form-label">{{ __('Password') }}</label>
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password" required
                                    autocomplete="current-password" placeholder="Enter your password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="mb-3 form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                    {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>

                            <!-- Submit Button -->
                            <div class="d-flex justify-content-between align-items-center">
                                <button type="submit" class="btn btn-primary px-4">
                                    {{ __('Login') }}
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="text-decoration-none" href="{{ route('password.request') }}">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

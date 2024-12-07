@extends('design.index')

@section('content')
<style>
    .btn-success:hover {
        background-color: #218838; /* Darker green */
        transition: 0.3s;
    }
</style>
<div class="container" style="margin-top: 100px; margin-bottom: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg">
                <div class="card-header bg-success text-white text-center" style="font-size: 1.5rem;">
                    {{ __('Register') }}
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name Field -->
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __('Name') }}</label>
                            <input id="name" type="text" 
                                   class="form-control @error('name') is-invalid @enderror" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   required 
                                   autocomplete="name" 
                                   autofocus 
                                   placeholder="Enter your full name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __('Email Address') }}</label>
                            <input id="email" type="email" 
                                   class="form-control @error('email') is-invalid @enderror" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required 
                                   autocomplete="email" 
                                   placeholder="Enter your email address">
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
                                   class="form-control @error('password') is-invalid @enderror" 
                                   name="password" 
                                   required 
                                   autocomplete="new-password" 
                                   placeholder="Create a password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <!-- Confirm Password Field -->
                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" type="password" 
                                   class="form-control" 
                                   name="password_confirmation" 
                                   required 
                                   autocomplete="new-password" 
                                   placeholder="Confirm your password">
                        </div>

                        <!-- Submit Button -->
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-success px-5">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

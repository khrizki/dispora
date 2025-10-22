@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center fs-4 fw-semibold">
                    {{ __('Register') }}
                </div>

                <div class="card-body p-4">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">{{ __('Name') }}</label>
                            <input id="name" 
                                   type="text" 
                                   class="form-control form-control-lg @error('name') is-invalid @enderror" 
                                   name="name" 
                                   value="{{ old('name') }}" 
                                   required 
                                   autocomplete="name" 
                                   autofocus>

                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">{{ __('Email Address') }}</label>
                            <input id="email" 
                                   type="email" 
                                   class="form-control form-control-lg @error('email') is-invalid @enderror" 
                                   name="email" 
                                   value="{{ old('email') }}" 
                                   required 
                                   autocomplete="email">

                            @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">{{ __('Password') }}</label>
                            <input id="password" 
                                   type="password" 
                                   class="form-control form-control-lg @error('password') is-invalid @enderror" 
                                   name="password" 
                                   required 
                                   autocomplete="new-password">

                            @error('password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        {{-- Confirm Password --}}
                        <div class="mb-4">
                            <label for="password-confirm" class="form-label fw-semibold">{{ __('Confirm Password') }}</label>
                            <input id="password-confirm" 
                                   type="password" 
                                   class="form-control form-control-lg" 
                                   name="password_confirmation" 
                                   required 
                                   autocomplete="new-password">
                        </div>

                        {{-- Submit Button --}}
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg rounded-3 fw-semibold">
                                {{ __('Register') }}
                            </button>
                        </div>

                        {{-- Login Link --}}
                        <div class="text-center mt-3">
                            <p class="mb-0">
                                {{ __('Already have an account?') }}
                                <a href="{{ route('login') }}" class="text-decoration-none fw-semibold">
                                    {{ __('Login here') }}
                                </a>
                            </p>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

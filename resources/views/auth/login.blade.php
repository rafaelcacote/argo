@extends('layouts.auth') <!-- Use o layout auth.blade.php -->

@section('content')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" placeholder="Email" aria-label="Email" required autocomplete="email"
                autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="mb-3">
            <input id="password" type="password"
                class="form-control form-control-lg @error('password') is-invalid @enderror" name="password"
                placeholder="Password" aria-label="Password" required autocomplete="current-password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">Remember me</label>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Sign in</button>
        </div>
    </form>
@endsection

@extends('layouts.template')

@section('title', 'Amazing E-Grocery | Login')

@section('content')

    <div class="d-flex flex-column justify-content-center align-items-center content-container">
        @if (session()->has("loginError"))
        <div class="alert alert-danger alert-text" role="alert">{{ session('loginError')}}</div>
        @endif

        <div class="card d-flex justify-content-center shadow bg-white rounded card-container">
            <h5 class="text-center form-title">{{ __('guest.login') }}</h5>
            <form action="/login" method="POST" class="mx-4">
                @csrf
                {{-- Email --}}
                <div class="mb-4 mt-3">
                    <label for="email" class="form-label">{{ __('guest.email') }}</label>
                    <input type="email" name="email" id="email" class="form-control" aria-describedby="emailHelp"
                        value="{{Cookie::get('userEmail') !== null ? Cookie::get('userEmail'): ""}}">
                    @if ($errors->has("email"))
                    <strong class="text-danger">{{ $errors->first("email")}}</strong>
                    @endif
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label for="password" class="form-label">{{ __('guest.pass') }}</label>
                    <input type="password" name="password" id="password" class="form-control"
                        value="{{Cookie::get('userPassword') !== null ? Cookie::get('userPassword'): ""}}">
                    @if ($errors->has("password"))
                    <strong class="text-danger">{{ $errors->first("password")}}</strong>
                    @endif
                </div>

                {{-- Checkbox Remember Me --}}
                <div class="mb-4 form-check">
                    <input type="checkbox" name="rememberMe" id="rememberMe" class="form-check-input">
                    <label class="form-check-label" for="rememberMe">{{ __('guest.remember') }}</label>
                </div>

                {{-- Login Button --}}
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn" style="background-color : #FADF54; width: 100%" >{{ __('guest.Submit') }}</button>
                </div>

                <p class="mt-3">{{ __('guest.lcheck1') }}
                    <a class="btn btn-link text-decoration-none" href="/register">
                        {{ __('guest.lcheck2') }}
                    </a>
                </p>

            </form>
        </div>
    </div>

@endsection

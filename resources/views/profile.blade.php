{{-- Ini profil page --}}
@extends('layouts.template')

@section('title', 'Amazing E-Grocery | Profile')

@section('content')
    @if (session()->has('success'))
        <div class="row justify-content-center">
            <div class="alert alert-success alert-dismissible fade show col col-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 style="background-color : #FADF54;">{{ __('profile.mprofile') }}</h4>
                        <img class="d-flex justify-content-center" style="margin:auto; width:20%; height:20%;"
                            src="{{ url('images/' . $user['image']) }}" alt="">
                        <table class="table">

                            <tbody>
                                <tr>
                                    <td>{{ __('profile.fname') }}</td>
                                    <td width="10">:</td>
                                    <td>{{ $user->first_name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('profile.lname') }}</td>
                                    <td width="10">:</td>
                                    <td>{{ $user->last_name }}</td>
                                </tr>
                                <tr>
                                    <td>{{ __('profile.email') }}</td>
                                    <td>:</td>
                                    <td>{{ $user->email }}</td>
                                </tr>

                            </tbody>

                        </table>
                    </div>
                </div>
            </div>

            {{-- Untuk Edit Profile --}}
            <div class="col-md-12 mt-2">
                <div class="card">
                    <div class="card-body">
                        <h4 style="background-color : #FADF54;">{{ __('profile.uprofile') }}</h4>
                        <form method="POST" action="{{ url('profile') }}" enctype="multipart/form-data">
                            @csrf

                            {{-- Edit first Name --}}
                            <div class="form-group row mt-4">
                                <label for="first_name"
                                    class="col-md-2 col-form-label text-md-right">{{ __('profile.fname') }}</label>

                                <div class="col-md-6">
                                    <input id="first_name" type="text"
                                        class="form-control  @error('first_name') is-invalid @enderror" name="first_name"
                                        value="{{ $user->first_name }}" required autocomplete="first_name" autofocus>

                                    @error('first_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Edit last Name --}}
                            <div class="form-group row mt-4">
                                <label for="last_name"
                                    class="col-md-2 col-form-label text-md-right">{{ __('profile.lname') }}</label>

                                <div class="col-md-6">
                                    <input id="last_name" type="text"
                                        class="form-control  @error('last_name') is-invalid @enderror" name="last_name"
                                        value="{{ $user->last_name }}" required autocomplete="first_name" autofocus>

                                    @error('last_name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Edit Email --}}
                            <div class="form-group row mt-4">
                                <label for="email"
                                    class="col-md-2 col-form-label text-md-right">{{ __('profile.email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ $user->email }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            {{-- Gender --}}
                            <div class="form-group row mt-4">
                                <label for="gender_id"
                                    class="col-md-2 col-form-label text-md-right">{{ __('profile.gender') }}</label>

                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender_id" value="1">
                                        <input type="hidden" name="gender_id" id="gender_id" value="{{ $user['gender_id'] }}">
                                        <label class="form-check-label" for="1">{{ __('profile.male') }}</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender_id" value="2">
                                        <input type="hidden" name="gender_id" id="gender_id" value="{{ $user['gender_id'] }}">
                                        <label class="form-check-label" for="2">{{ __('profile.female') }}</label>
                                    </div>
                                    <input type="hidden" name="gender_id" id="gender_id" value="{{ $user['gender_id'] }}">
                                </div>

                                @if ($errors->has('gender_id'))
                                    <p><strong class="text-danger">{{ $errors->first('gender_id') }}</strong></p>
                                @endif
                            </div>

                            {{-- Role --}}

                            <div class="form-group row mt-4">
                                <label
                                    for="role_id"class="col-md-2 col-form-label text-md-right">{{ __('profile.role') }}</label>
                                <div class="col-md-6">
                                    <select name="role_id" id="role_id">
                                        <option value="1">Admin</option>
                                        <option value="2">Member</option>
                                    </select>
                                </div>
                            </div>

                            {{-- Display picture --}}
                            <div class="form-group row mt-4">
                                <label
                                    for="image"class="col-md-2 col-form-label text-md-right">{{ __('profile.img') }}</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control-file" id="image" name="image">
                                </div>
                                @if ($errors->has('image'))
                                    <strong class="text-danger">{{ $errors->first('image') }}</strong>
                                @endif
                            </div>

                            {{-- Password --}}
                            <div class="form-group row mt-4">
                                <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('profile.npass') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control  @error('password') is-invalid @enderror" name="password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <label for="password-confirm"
                                    class="col-md-2 col-form-label text-md-right">{{ __('profile.cpass') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control "
                                        name="password_confirmation">
                                </div>
                            </div>

                            {{-- Edit profile button --}}
                            <div class="form-group row mb-0 mt-4">
                                <div class="col-md-6 offset-md-2">
                                    <button type="submit" class="btn "
                                        style="background-color : #FADF54; width: 100%">
                                        {{ __('profile.save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

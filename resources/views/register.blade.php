@extends('layouts.template')

@section('title', 'Amazing E-Grocery | Register')

@section('content')
    @if (session()->has('success'))
        <div class="row justify-content-center">
            <div class="alert alert-success alert-dismissible fade show col col-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="d-flex justify-content-center align-items-center content-container">
        <div class="card d-flex justify-content-center shadow bg-white rounded card-container">
            <h4 class="text-center" style="font-weight: 600; margin-top:20px">{{ __('guest.registerTitle') }}</h4>
            <form action="/register" method="POST" class="mx-4" enctype="multipart/form-data">
                @csrf

                {{-- First Name --}}
                <div class="mb-4 mt-3">
                    <label for="firstname" class="form-label">{{ __('guest.fname') }}</label>
                    <input type="text" name="first_name" id="Firstname" class="form-control">
                    @if ($errors->has('first_name'))
                        <strong class="text-danger">{{ $errors->first('first_name') }}</strong>
                    @endif
                </div>

                {{-- Last Name --}}
                <div class="mb-4 mt-3">
                    <label for="lastname" class="form-label">{{ __('guest.lname') }}</label>
                    <input type="text" name="last_name" id="Lastname" class="form-control">
                    @if ($errors->has('last_name'))
                        <strong class="text-danger">{{ $errors->first('last_name') }}</strong>
                    @endif
                </div>

                {{-- Email --}}
                <div class="mb-4">
                    <label for="email" class="form-label">{{ __('guest.email') }}</label>
                    <input type="email" name="email" id="email" class="form-control" aria-describedby="emailHelp">
                    @if ($errors->has('email'))
                        <strong class="text-danger">{{ $errors->first('email') }}</strong>
                    @endif
                </div>

                {{-- Display picture --}}
                <div class="mb-4">
                    <label for="image" class="form-label">{{ __('guest.img') }}</label><br>
                    <input type="file" class="form-control-file" id="image" name="image">
                    @if ($errors->has('image'))
                        <strong class="text-danger">{{ $errors->first('image') }}</strong>
                    @endif
                </div>

                {{-- Gender --}}
                <div class="mb-4">
                    <label class="form-label d-block">{{ __('guest.gender') }}</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender_id" value="1">
                        <label class="form-check-label" for="1">{{ __('guest.male') }}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gender_id" value="2">
                        <label class="form-check-label" for="2">{{ __('guest.female') }}</label>
                    </div>
                    @if ($errors->has('gender_id'))
                        <p><strong class="text-danger">{{ $errors->first('gender_id') }}</strong></p>
                    @endif
                </div>

                {{-- Role --}}
                <div class="mb-4">
                    <label class="form-label d-block">{{ __('guest.role') }}</label>
                    <select name="role_id" id="role_id">
                        <option value="1">Admin</option>
                        <option value="2">Member</option>
                    </select>
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <label for="password" class="form-label">{{ __('guest.pass') }}</label>
                    <input type="password" name="password" id="password" class="form-control">
                    @if ($errors->has('password'))
                        <strong class="text-danger">{{ $errors->first('password') }}</strong>
                    @endif
                </div>

                {{-- Confirm Password --}}
                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">{{ __('guest.cpass') }}</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control"
                        class="form-control">
                    @if ($errors->has('password_confirmation'))
                        <strong class="text-danger">{{ $errors->first('password_confirmation') }}</strong>
                    @endif
                </div>


                {{-- Register Button --}}
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn" style=" background-color : #FADF54; width: 100%">{{ __('guest.register') }}</button>
                </div>

                <p class="mt-3">{{ __('guest.check1') }}
                    <a class="btn btn-link text-decoration-none" href="/login">
                        {{ __('guest.check2') }}
                    </a>
                </p>

            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    </body>

    </html>

@endsection

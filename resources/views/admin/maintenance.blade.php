@extends('layouts.template')

@section('title', 'Amazing E-Grocery | Account Maintenance')

@section('content')

@if (session()->has('success'))
<div class="row justify-content-center">
    <div class="alert alert-success alert-dismissible fade show col col-4" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
@endif

<div class="container-fluid">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">{{ __('accmain.fname') }}</th>
        <th scope="col">{{ __('accmain.lname') }}</th>
        <th scope="col">{{ __('accmain.role') }}</th>
        <th scope="col">{{ __('accmain.action') }}</th>
      </tr>
    </thead>
    @foreach ($user as $u)
      <tbody>
        <tr>
          <td><p class="font-weight-600">{{ $u->first_name }}</p></td>
          <td><p class="font-weight-600">{{ $u->last_name }}</p></td>
          @foreach ($roles as $user)
            @if ($user->id == $u->role_id)
            <td><p class="padding-btm-20">{{ $user->name}}</p></td>
            @endif
          @endforeach

          <td>
            <a href="/updateRole/{{ $u->id }}">
              <button class="btn btn-primary mb-2">{{ __('accmain.urole') }}</button>
            </a>
            <form action="/deleteAccount/{{ $u->id }}" method="POST">
              {{ method_field('DELETE') }}
              @csrf
              <button type="submit" class="btn btn-danger">{{ __('accmain.dacc') }}</button>
            </form>
          </td>
        </tr>
      </tbody>
    @endforeach
  </table>
</div>
@endsection

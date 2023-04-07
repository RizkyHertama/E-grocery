@extends('layouts.template')

@section('title', 'Amazing E-Grocery | Homepage')

@section('content')


    @auth
    <div class="container">
        <div style="font-size: 20px" class="circle-guest">
            {{ __('cart.success') }}
        </div>
    </div>
    @endauth

@endsection

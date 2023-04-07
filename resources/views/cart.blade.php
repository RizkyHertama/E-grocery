
@extends('layouts.template')

@section('title', 'Amazing E-Grocery | Cart')
@section('content')

    <div class="container cart">
        <div class="card row">
            <h4 class="text-center mb-4 form-title">{{ __('cart.mcart') }}</h4>

            {{-- Jika gaada produk di cart --}}
            @if (count($cartItems) == 0)
            <div class="d-flex align-items-center justify-content-center mx-4 margin-btm-20">
                {{ __('cart.noitem') }}
            </div>

            @else

            <div class="mt-2 mx-4 d-block">
                @foreach ($cartItems as $cartItem)
                <div class="mt-5 mx-4 d-flex justify-content-start">
                    <div class="justify-content-center mx-4 cart-img-container">
                            <img src="{{ $cartItem->items->first()->item_image}}" class="rounded mx-auto d-block" width="20%">
                    </div>

                    {{-- <div class="d-flex justify-content-end"> --}}
                    <form class="mx-4 cart-form-55 " action="/updateCart" method="POST">
                        {{ method_field('PUT') }}
                        @csrf

                        {{-- Item Data --}}
                        <div class="mb-1">
                            <h5>{{ $cartItem->items->first()->item_name }}</h5>

                            <p>
                            <div>{{ __('cart.price') }} : Rp. {{ number_format($cartItem->items->first()->item_price) }}</div>
                            <div>{{ __('cart.stotal') }} : Rp. {{ number_format($cartItem->price) }}</div>
                            <div>{{ __('cart.qty') }} : {{ $cartItem['quantity'] }} pc(s)</div>
                                {{ $cartItem->items->first()->item_description }}
                            </p>
                        </div>
                    </form>

                    {{-- Delete Button --}}
                    <form action="/DeleteItemCart/{{ $cartItem->items->first()->id }}" method="POST">
                        {{ method_field('DELETE') }}
                        @csrf
                            <table>
                                <tr>
                                    <td><button type="submit" class="btn mt-3 btn-danger ">{{ __('cart.del') }}</button></td>
                                </tr>
                            </table>
                        <input type="hidden" name="item_id" id="item_id" value="{{ $cartItem['item_id'] }}">
                    </form>

                </div>
                @endforeach
                <div>{{ __('cart.tprice') }} : Rp. {{ number_format($totalPrice) }}</div>
            </div>
            @endif

            {{-- Checkout Button --}}
            @if (count($cartItems) > 0)
            <div class="d-flex justify-content-center">
                {{-- create css for all button --}}
                <form action="/checkout" method="POST">
                    {{ method_field('DELETE') }}
                    @csrf
                    <button type="submit" class="btn mt-3 mb-3" style="background-color : #FADF54;">{{ __('cart.cout') }}</button>
                </form>
            </div>
            @endif
        </div>
    </div>

@endsection


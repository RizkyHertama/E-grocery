@extends('layouts.template')

@section('title', 'Amazing E-Grocery | Item Detail')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-1">
                <form action="/addItemToCart" method="POST">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="{{ $item->item_image }}" class="rounded mx-auto d-block" width="50%">
                                </div>

                                <div class="col-md-6 mt-5">
                                    <h2>{{ $item->item_name }}</h2>
                                    <table class="table">
                                        <h4 style="font-weight: bold;">{{ __('item.price') }} : Rp. {{ number_format($item->item_price) }}
                                        </h4>
                                        <hr>
                                        <p>{{ $item->item_description }}</p>

                                        <div class="d-flex">
                                            <h6 class="font-weight-600">{{ __('item.qty') }}</h6>
                                            <input type="number" min="0" name="quantity" id="quantity" class="mx-3 width-100">
                                        </div>
                                        @if ($errors->has('quantity'))
                                            <strong class="text-danger">{{ $errors->first('quantity') }}</strong>
                                            @endif
                                        <input type="hidden" name="item_id" id="item_id" value="{{ $item['id'] }}">
                                        <div class="d-flex justify-content-center mt-4">
                                            <button type="submit" class="btn  add-to-cart-btn"
                                                style="width: 100%; background-color : #FADF54;">
                                                {{ __('item.buy') }}
                                            </button>
                                        </div>

                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </form>


        </div>

    </div>
    </div>
    </div>
@endsection

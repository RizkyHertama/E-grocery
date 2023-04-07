@extends('layouts.template')

@section('title', 'Amazing E-Grocery | Homepage')

@section('content')


    @guest
        <div class="container">
            <div class="circle-guest">
                {{-- Find and Buy Your Grocery Here! --}}
                {{ __('guest.title') }}
            </div>
        </div>
    @endguest

    @auth
        {{-- card itees --}}
        <div class="container">
            <div class="row justify-content-center">

                @foreach ($item as $i)
                    <div class="col-lg-3 col-md-3 col-sm-12">
                        <div class="card mt-5 mb-5" style="width: 15rem">
                            <img src={{$i->item_image}} class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $i->item_name}}</h5>
                                <p class="card-text">Rp {{ number_format($i->item_price) }}</p>
                                <a href="/viewItemDetail/{{ $i['id'] }}" class="btn btn-primary">{{ __('general.ViewDetail') }} </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Paginate links (App\Http\Providers\AppServiceProvider.php) --}}
        <div class="d-flex justify-content-center">
            {{ $item->links() }}
        </div>

    @endauth

@endsection

@extends('layouts.main')

@section('container')
    <div class="container my-3">
        <h2 class="fs-2 fw-bold text-center" style="padding-bottom: 1.5rem">My Cart</h2>

        <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-3">
                    <p class="fs-5 fw-bold text-center">Picture</p>
                </div>
                <div class="col-md-4">
                    <p class="fs-5 fw-bold text-center">Description</p>
                </div>
                <div class="col-md-2">
                    <p class="fs-5 fw-bold text-center">Price</p>
                </div>
                <div class="col-md-2">
                    {{-- <p class="fs-5 fw-bold text-center">Cancel</p> --}}
                </div>
            </div>
            @if (count($cartItems) > 0)
                @foreach ($cartItems as $item)
                    <div class="row align-items-center mb-2 justify-content-center">
                        <div class="col-md-3 text-center">
                            <img src="{{ $item['src'] }}" class="img-fluid" style="max-width: 15rem"
                                alt="{{ $item['title'] }}">
                        </div>
                        <div class="col-md-4" style="padding-top:1rem;">
                            <p class="fs-4">{{ $item['title'] }}</p>
                        </div>
                        <div class="col-md-2 text-center" style="padding-top:1rem;">
                            <p class="fs-4">Rp. {{ $item['price'] }}</p>
                        </div>
                        <div class="col-md-2 text-center">
                            <form action="{{ route('removeFromCart', $item['post_id']) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" style="width: 10rem;">Delete</button>
                            </form>
                        </div>
                    </div>
                @endforeach
                <hr>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-2 text-center p-3 rounded">
                            <form action="{{ route('checkout', $item['user_id']) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm fs-5" style="width: 12rem;"
                                    id="pay-button">Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <p class="fs-4 text-center">Your cart is empty.</p>
            @endif

        </div>
    </div>

    <script src="js/script.js"></script>
@endsection

@extends('layouts.main')

@section('container')
    <p class="fs-2 fw-bold">My Cart</p>
    <div class="container text-center">
        <div class="row align-items-center">
            <div class="border col-3">
                Picture
            </div>
            <div class="border col-4">
                Description
            </div>
            <div class="border col-2">
                Price
            </div>
            <div class="border col-1">
                Cancel
            </div>
        </div>
        <div class="container">
            @if (count($cartItems) > 0)
                    @foreach ($cartItems as $item)
                        
                        <div class="row align-items-center">
                            <div class="border col-3">
                                <img src="{{ $item['src'] }}" style="max-width: 10rem">
                            </div>
                            <div class="border col-4">
                                {{ $item['title'] }}
                            </div>
                            <div class="border col-2">
                                {{ $item['price'] }}
                            </div>
                            <div class="border col-1">
                                <div class="border col-1">
                                    <form action="{{ route('removeFromCart', $item['id']) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                {{-- Add checkout or continue shopping buttons --}}
            @else
                <p>Your cart is empty.</p>
            @endif
        </div>
    </div>
@endsection

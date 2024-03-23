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
                <p class="fs-4 text-center">Your cart is empty.</p>
            
        </div>
    </div>

    <script src="js/script.js"></script>
@endsection
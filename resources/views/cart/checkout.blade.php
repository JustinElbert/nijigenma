@extends('layouts.main')

@section('container')
    <div class="container my-3">
        <h2 class="fs-2 fw-bold text-center" style="padding-bottom: 1.5rem">Checkout</h2>

        <div class="container mt-3">
            <div class="row justify-content-center" style="margin-left: 100px;">
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
            @foreach ($cartItems as $item)
                <div class="row align-items-center mb-2 justify-content-center" style="padding-right:8rem; margin-left: 100px;">
                    <div class="col-md-3 mr-md-4 text-md-start">
                        <img src="{{ $item['src'] }}" class="img-fluid" style="max-width: 15rem; margin-left: -55px;"
                            alt="{{ $item['title'] }}">
                    </div>
                    <div class="col-md-4" style="padding-top:1rem;">
                        <p class="fs-4">{{ $item['title'] }}</p>
                    </div>
                    <div class="col-md-2 text-center" style="padding-top:1rem;">
                        <p class="fs-4">Rp. {{ $item['price'] }}</p>
                    </div>
                </div>
            @endforeach
            <hr>
            <div class="container">
              <div class="row">
                  <div class="col-md-12 text-center p-3 rounded">
                      <p class="fs-5">Total Price: Rp. {{$total_price}}</p>
                      <button class="btn btn-danger btn-sm fs-5" style="width: 12rem; " id="pay-button">Pay</button>
                  </div>
              </div>
          </div>
        </div>
    </div>




    
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    alert("payment success!");
                    console.log(result);
                    window.location.href = '/carl';
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("wating your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    /* You may add your own implementation here */
                    alert("payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('you closed the popup without finishing the payment');
                }
            })
        });
    </script>
@endsection

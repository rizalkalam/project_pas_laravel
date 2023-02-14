@extends('layouts.produk')
@section('content')
<section class="pt-5 pb-5">
    <div class="container">
      <div class="row w-100">
          <div class="col-lg-12 col-md-12 col-12">
            <h3 align="center">ini halaman checkout/order</h3>
            <br><br>
                <p>{{ $data }}</p>
                <button id="pay-button" class="btn mb-5 btn-lg pl-5 pr-5 tombol-checkout">Bayar</button>
          </div>
      </div>
    </div>
</section>


{{-- <form action="payment" method="post">
    @csrf
    <input type="hidden" name="json" id="json_callback">
</form> --}}

<script type="text/javascript">
  // For example trigger on button clicked, or any time you need
  var payButton = document.getElementById('pay-button');
  payButton.addEventListener('click', function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('{{ $snapToken }}', {
      onSuccess: function(result){
        /* You may add your own implementation here */
        alert("payment success!"); console.log(result);
      },
      onPending: function(result){
        /* You may add your own implementation here */
        alert("wating your payment!"); console.log(result);
      },
      onError: function(result){
        /* You may add your own implementation here */
        alert("payment failed!"); console.log(result);
      },
      onClose: function(){
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');
      }
    })
  });
</script>

    
@endsection
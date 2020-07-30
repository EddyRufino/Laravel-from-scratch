@extends('layouts.app')

@section('content')

<div class="container">
  <h3>Payment Details</h3>
  <h4 class="text-center"><strong>Total a pagar: </strong>{{ $order->total }}</h4>

  <div class="text-center mb-3">
    <form 
      class="d-inline" 
      action="{{ route('orders.payments.store', $order->id) }}"
      method="POST"
    >
    @csrf

      <button class="btn btn-success">Pay</button>

    </form>
  </div>

</div>

@endsection
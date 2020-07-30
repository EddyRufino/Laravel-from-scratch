@extends('layouts.app')

@section('content')
    <div class="container">
      @if (!isset($cart) || $cart->products->isEmpty())
      
      <h3>Don't have products in your cart.</h3>            
      
      @else
    
        <div class="row">
          <div class="col-md-3">
            <div class="card">
              <div class="card-body">
                <h5>Your Cart</h5>
                <p class="card-text">Your cart total <strong>{{ $cart->total }}</strong></p>
                <a class="btn btn-success mb-3" href="{{ route('orders.create') }}">Start Order</a>
              </div>
            </div>
          </div>

          <div class="col-md-9">
            <div class="row">
              @foreach ($cart->products as $product)
                @include('components.product-card')
              @endforeach
            </div>
          </div>

        </div>
      @endempty
    </div>
@endsection
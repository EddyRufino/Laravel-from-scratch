@extends('layouts.app')

@section('content')  

<div class="container">
  <div class="d-flex justify-content-around">
    <h3>Order Details</h3>
  </div>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Product</th>
          <th scope="col">Price</th>
          <th scope="col">Quantity</th>
          <th scope="col">Total</th>
        </tr>
      </thead>
      <tbody>
        <h4 class="text-center"><strong>Grand Total </strong>{{ $cart->total }}</h4>

        <div class="text-center mb-3">
          <form 
            class="d-inline" 
            action="{{ route('orders.store') }}"
            method="POST"
          >
          @csrf
          
            <button class="btn btn-success">Confirm Order</button>
          
          </form>
        </div>


        @foreach ($cart->products as $product)
          <tr>
            <td>
              <img src="{{ asset($product->images->first()->path) }}" alt="" width="80">
              {{ $product->title }}
            </td>
            <td>{{ $product->price }}</td>
            <td>{{ $product->pivot->quantity }}</td>
            <td>
              <strong>
                S/. {{ $product->total }}
              </strong>
            </td>
            
          </tr>
          @endforeach
        </tbody>
      </table>


    </div>
  </div>
  
@endsection
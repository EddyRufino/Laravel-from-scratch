@extends('layouts.app')

@section('content')

<div class="container">
  <form action="{{ route('products.update', $product) }}" method="POST">
    @csrf @method('PUT')

      @include('partials.formProducts')

  </form>
</div>

@endsection
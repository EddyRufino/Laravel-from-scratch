@extends('layouts.app')

@section('content')

<div class="container">
  <form action="{{ route('products.store') }}" method="POST">
    @csrf

      @include('partials.formProducts')

  </form>
</div>

@endsection
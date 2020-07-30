@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
        	{{-- @dump($products) --}}

            @foreach ($products as $product)
                @include('components.product-card')
            @endforeach

            {{-- @dump($products) --}}

            {{-- @dd(\DB::getQueryLog()) --}}
        </div>
    </div>
@endsection
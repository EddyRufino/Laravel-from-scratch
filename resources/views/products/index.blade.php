@extends('layouts.app')

@section('content')    

<div class="container">
  <div class="d-flex justify-content-around">
    <h3>List Products</h3>
    <a class="mb-4 btn btn-primary" href="{{ route('products.create') }}">New product</a>
  </div>
  <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Price</th>
          <th scope="col">Stock</th>
          <th scope="col">status</th>
          <th class="text-center">Actions</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($products as $product)
          <tr>
            <th>{{ $product->title }}</th>
            <td>{{ $product->price }}</td>
            <td>{{ $product->stock }}</td>
            <td>{{ $product->status }}</td>
            <td class="td-actions text-center">
              <a class="btn btn-outline-ligth btn-sm mr-1" href="{{ route('products.show', $product->title) }}">
                <span class="material-icons md-18 show">
                  info
                </span>
              </a>
              <a class="btn btn-outline-ligth btn-sm mr-1" href="{{ route('products.edit', $product) }}">
                <span class="material-icons md-18 edit">
                  edit
                </span>
              </a>
              <form method="POST" action="{{ route('products.destroy', $product) }}" style="display: inline">
                @csrf @method('DELETE')
                  <button class="btn btn-outline-ligth btn-sm"
                    onclick="return confirm('¿Seguro de querer eliminar el producto?')">
                    <i class="material-icons md-18 delete">delete</i>
                    {{-- <i class="fa fa-times"></i>  --}}
                    {{-- Eliminar --}}
                  </button>
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>

      {{ $products->links() }}

    </div>
  </div>
  
@endsection
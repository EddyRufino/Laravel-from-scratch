<div class="col-sm-12 col-md-12 col-lg-6">
  <div class="card mb-3" style="max-width: 540px;">
    <div class="row no-gutters">
      <div id="carousel{{ $product->id }}" class="carousel slide carousel-fade col-md-4">
          {{-- <img src="{{ asset($product->images->first()->path) }}" class="card-img" alt="..."> --}}
            @foreach ($product->images as $image)
              <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img class="d-block w-100 card-img-top"
                  src="{{ asset($image->path) }}">
              </div>
            @endforeach

            <a class="carousel-control-prev"
                href="#carousel{{ $product->id }}"
                role="button" data-slide="prev"
              >
              <span class="carousel-control-prev-icon bg-secondary"></span>
            </a>

            <a class="carousel-control-next"
                href="#carousel{{ $product->id }}"
                role="button" data-slide="next"
            >
              <span class="carousel-control-next-icon bg-secondary"></span>
            </a>

      </div>
      <div class="col-md-8">
          <div class="card-body">
          <h5 class="card-title">{{$product->title}}</h5>
          <p class="card-text">{{ $product->description }}</p>
          <p class="card-text d-flex justify-content-around">
              <small class="text-muted">S/. {{$product->price}}</small>
              <small class="text-muted">There are {{$product->stock}} products</small>
          </p>
          
          @if (isset($cart))
            <p class="card-text">
              {{ $product->pivot->quantity }} products selected.
            </p>
            <form 
              class="d-inline" 
              action="{{ route('products.carts.destroy', ['cart' => $cart->id, 'product' => $product->id]) }}"
              method="POST"
              >
              @csrf
              @method('DELETE')
              
              <button class="btn btn-warning">Remove product</button>
              
            </form>
              
          @else

            <form 
              class="d-inline" 
              action="{{ route('products.carts.store', $product->id) }}"
              method="POST"
              >
              @csrf
              
              <button class="btn btn-success">Add Cart</button>
              
            </form>
              
          @endif

          </div>
      </div>
      </div>
  </div>
</div>
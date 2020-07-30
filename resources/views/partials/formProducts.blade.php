<div class="col-md-6 col-lg-6">

  <div class="form-group">
    <label for="">Title: </label>
    <input class="form-control" value="{{old('title', $product->title)}}" name="title" type="text" required>
  </div>
  <div class="form-group">
    <label for="">Description:</label>
    <textarea class="form-control" name="description"cols="2" rows="2" required>
      {{old('description', $product->description)}}
    </textarea>
  </div>

  <div class="form-group">
    <label for="">Price: </label>
    <input class="form-control" value="{{old('price', $product->price)}}" name="price" type="number" min="1.00" step="0.01" required>
  </div>

  <div class="form-group">
    <label for="">Stock: </label>
    <input class="form-control" value="{{old('stock', $product->stock)}}" name="stock" type="number" min="0" required>
  </div>

  <div class="form-group">
    <label for="">Stock: </label>
    <select class="custom-select" name="status">
      <option {{ old('status') == 'available' ? 'selected' : '' }} value="available">Available</option>
      <option {{ old('status') == 'unavailable' ? 'selected' : '' }} value="unavailable">Unavailable</option>
    </select>
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">Agregar</button>
  </div>
  
</div>

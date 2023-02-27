@extends('layout')
@section('content')
<style>
    .container {
      max-width: 450px;
    }
    .push-top {
      margin-top: 50px;
    }
</style>
<div class="card push-top">
  <div class="card-header">
    Add Product
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('products.store') }}">
          <div class="form-group">
              @csrf
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" name="nombre"/>
          </div>
          <div class="form-group">
              <label for="descripcion">Descripción</label>
              <textarea class="form-control" name="descripcion"></textarea>
          </div>
          <div class="form-group">
              <label for="precio">Precio</label>
              <input type="number" step="0.01" class="form-control" name="precio"/>
          </div>
         
          <button type="submit" class="btn btn-block btn-danger">Create Product</button>
      </form>
  </div>
</div>
@endsection
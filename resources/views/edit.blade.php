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
    Actualizar Producto
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
      <form method="post" action="{{ route('products.update', $product->id) }}">
          <div class="form-group">
              @csrf
              @method('PATCH')
              <label for="nombre">Nombre</label>
              <input type="text" class="form-control" name="nombre" value="{{ $product->name }}"/>
          </div>
          <div class="form-group">
              <label for="descripcion">Descripción</label>
              <textarea class="form-control" name="descripcion">{{ $product->descripcion }}</textarea>
              
          </div>
          <div class="form-group">
              <label for="phone">Precio</label>
              <input type="number" step="0.01" class="form-control" name="precio" value="{{ $product->precio }}"/>
          </div>
          
          <button type="submit" class="btn btn-block btn-danger">Update User</button>
      </form>
  </div>
</div>
@endsection
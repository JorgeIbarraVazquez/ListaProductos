@extends('layout')
@section('content')

    @if (session()->get('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div><br />
    @endif



    <div class="row">
        <aside class="col-lg-8">
            <div class="card">
                <h3>Lista de Productos</h3>
                <div class="table-responsive">
                    <table class="table table-borderless table-shopping-cart">
                        <thead>
                            <tr class="table-info">
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Precio</th>
                                <th class="text-center">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($products)
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->nombre }}</td>
                                        <td>{{ $product->descripcion }}</td>
                                        <td>{{ $product->precio }}</td>
                                        <td class="text-center">
                                            <a href="{{ route('products.edit', $product->id) }}"
                                                class="btn btn-primary btn-sm">Editar</a>
                                            <form action="{{ route('products.destroy', $product->id) }}" method="post"
                                                style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endisset

                        </tbody>
                    </table>
                </div>
            </div>
        </aside>
        <aside class="col-lg-4">
            <div class="card mb-3">

                <a href="/products/create" class="btn btn-info"> Agregar nuevo producto</a>

            </div>
            <div class="card">
                <div class="card-body">
                    <h5>Filtros de búsqueda</h5>
                    <p>Buscar por:
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active"  href="#filterByNameLink" onclick="activaTab('filterByNameLink')">Nombre</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="#filterByRangeLink" onclick="activaTab('filterByRangeLink')">Rango de precios</a>
                        </li>

                    </ul>
                    <form method="post" action="/products/filters">
                        @csrf
                        <div id="filterByName">
                            <div class="form-group mt-3">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" name="nombre" />
                            </div>
                        </div>

                        <div id="filterByRange" style="display:none">
                            <div class="form-group mt-3">
                                <label for="nombre">Precio Minimo</label>
                                <input type="number" step="0.01" class="form-control" name="precio_minimo" />

                                <label for="nombre">Precio Máximo</label>
                                <input type="number" step="0.01" class="form-control" name="precio_maximo" />
                            </div>
                        </div>



                        <button type="submit" class="btn btn-block btn-primary">Buscar</button>
                        <a href="/products" class="btn btn-block btn-success">Mostrar todos</a>
                    </form>
                </div>
            </div>
        </aside>
    </div>

@endsection

@extends('layouts.tema') 
@section('titulo_contenido') Listado de Categorias @endsection
@section('subtitulo_contenido') Categorias Registrados en Sistema @endsection
@section('ruta_ref') <a href="{{ url('/categorias') }}">Categorias</a> @endsection

@section('contenido')
<a href="{{ route('categories.create')}}" class="btn btn-success btn-block mb-2">Nueva Categoria</a>
@if($categorias->count() == 0)
<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Algo anda mal!</strong> Parece que no hay categorias registradas en el sistema.
</div>
@endif
<div class="table table-bordered table-responsive">
  <table class="table table-hover">
    <thead>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>DESCRIPCION</th>
      <th>IMAGEN</th>
    </thead>
    <tbody>
      @foreach($categorias as $categoria)
        <tr>
          <td>
            <a class="btn btn-sm btn-info" href="{{ route('categories.show', $categoria->id) }}">{{ $categoria->id }}</a>
          </td>
          <td>{{ $categoria->name }}</td>
          <td>{{ $categoria->description }}</td>
          <td><img class="app-sidebar__user-avatar" src="{{url('/img/' . $categoria->icon )}}" width="50" height="50" alt="Image"/></td>
        </tr>
      @endforeach
    </tbody>
  </table> 
  {{ $categorias->links() }}
</div>
@endsection
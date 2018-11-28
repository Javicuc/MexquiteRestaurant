@extends('layouts.tema') 
@section('titulo_contenido') Listado de Clientes @endsection
@section('subtitulo_contenido') Clientes Registrados en Sistema @endsection
@section('ruta_ref') <a href="{{ url('/admin/clients') }}">Clientes</a> @endsection

@section('contenido')
<a href="{{ route('clients.create')}}" class="btn btn-success btn-block mb-2">Nuevo Cliente</a>
@if($clientes->count() == 0)
<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Algo anda mal!</strong> Parece que no hay clientes registrados en el sistema.
</div>
@endif
<div class="table table-bordered table-responsive">
  <table class="table table-hover">
    <thead>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>CORREO</th>
      <th>TELEFONO</th>
    </thead>
    <tbody>
      @foreach($clientes as $cliente)
        <tr>
          <td>
            <a class="btn btn-sm btn-info" href="{{ route('clients.show', $cliente->id) }}">{{ $cliente->id }}</a>
          </td>
          <td>{{ $cliente->name }}</td>
          <td>{{ $cliente->email }}</td>
          <td>{{ $cliente->phone }}</td>
        </tr>
      @endforeach
    </tbody>
  </table> 
  {{ $clientes->links() }}
</div>
@endsection
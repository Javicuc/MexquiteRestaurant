@extends('layouts.tema') 
@section('titulo_contenido') Listado de Usuarios @endsection
@section('subtitulo_contenido') Usuarios Registrados en Sistema @endsection
@section('ruta_ref') <a href="{{ url('/admin/users') }}">Usuarios</a> @endsection

@section('contenido')
<a href="{{ route('users.create')}}" class="btn btn-success btn-block mb-2">Nuevo Usuario</a>
@if($usuarios->count() == 0)
<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Algo anda mal!</strong> Parece que no hay usuarios registrados en el sistema.
</div>
@endif
<div class="table table-bordered table-responsive">
  <table class="table table-hover">
    <thead>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>CORREO</th>
      <th>FOTO</th>
      <th>TIPO</th>
      <th>ACCIONES</th>
    </thead>
    <tbody>
      @foreach($usuarios as $usuario)
      {!! Form::open(['route' => ['users.destroy', $usuario->id], 'method' => 'Delete']) !!}
        <tr>
          <td>
            <a class="btn btn-sm btn-info" href="{{ route('users.show', $usuario->id) }}">{{ $usuario->id }}</a>
          </td>
          <td>{{ $usuario->name }}</td>
          <td>{{ $usuario->email }}</td>
          <td>{{ $usuario->photo }}</td>
          <td>{{ $usuario->type }}</td>
          <td> {!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger']) !!} </td>
        </tr >
      @endforeach
    </tbody>
  </table> 
  {{ $usuarios->links() }}
</div>
@endsection
@extends('layouts.tema') 
@section('titulo_contenido') Listado de Platillos @endsection
@section('subtitulo_contenido') Platillos Registrados en Sistema @endsection
@section('ruta_ref') <a href="{{ url('/admin/dishes') }}">Platillos</a> @endsection

@section('contenido')
<a href="{{ route('dishes.create')}}" class="btn btn-success btn-block mb-2">Nuevo Platillo</a>
@if($platillos->count() == 0)
<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Algo anda mal!</strong> Parece que no hay platillos registrados en el sistema.
</div>
@endif
<div class="table table-bordered table-responsive">
  <table class="table table-hover">
    <thead>
      <th>ID</th>
      <th>NOMBRE</th>
      <th>DESCRIPCION</th>
      <th>ESTATUS</th>
      <th>CATEGORIA</th>
      <th>GALERIA</th>
      <th>PRECIO</th>
      <th>ACCIONES</th>
    </thead>
    <tbody>
      @foreach($platillos as $platillo)
      {!! Form::open(['route' => ['dishes.destroy', $platillo->id], 'method' => 'Delete']) !!}
        <tr>
          <td>
            <a class="btn btn-sm btn-info" href="{{ route('dishes.show', $platillo->id) }}">{{ $platillo->id }}</a>
          </td>
          <td>{{ $platillo->name }}</td>
          <td>{{ $platillo->description }}</td>
          <td>{{ $platillo->status }}</td>
          <td>{{ $platillo->category->name }}</td>
          <td>{{ $platillo->gallery->name }}</td>
          <td>{{ '$' . $platillo->price }}</td>
          <td> {!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger']) !!} </td>
        </tr >
      @endforeach
    </tbody>
  </table> 
  {{ $platillos->links() }}
</div>
@endsection
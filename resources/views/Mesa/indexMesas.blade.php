@extends('layouts.tema') 
@section('titulo_contenido') Listado de Mesas @endsection
@section('subtitulo_contenido') Mesas Registrados en Sistema @endsection
@section('ruta_ref') <a href="{{ url('/admin/tables') }}">Mesas</a> @endsection

@section('contenido')
<a href="{{ route('tables.create')}}" class="btn btn-success btn-block mb-2">Agregar Nueva Mesa</a>
@if($mesas->count() == 0)
<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Algo anda mal!</strong> Parece que no hay mesas registradas en el sistema.
</div>
@endif
<div class="table table-bordered table-responsive">
  <table class="table table-hover">
    <thead>
      <th>ID</th>
      <th>NUMERO</th>
      <th>PRECIO</th>
      <th>ESTATUS</th>
      <th>TAMAÑO</th>
      <th>ACCIONES</th>
    </thead>
    <tbody>
      @foreach($mesas as $mesa)
      {!! Form::open(['route' => ['tables.update', $mesa->id], 'method' => 'PATCH']) !!}
        <tr>
          <td>
            <a class="btn btn-sm btn-info" href="{{ route('tables.show', $mesa->id) }}">{{ $mesa->id }}</a>
          </td>
          <td>{{ $mesa->number }}</td>
          <td>{{ $mesa->price }}</td>
          <td>{{ $mesa->status }}</td>
          <td>{{ $mesa->size }}</td>
          <td> {!! Form::submit('Desocupar Mesa', ['class' => 'btn btn-sm btn-success']) !!} </td>
        </tr >
        {!! Form::close() !!}
      @endforeach
    </tbody>
  </table> 
  {{ $mesas->links() }}
</div>
@endsection
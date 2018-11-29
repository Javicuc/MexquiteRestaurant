@extends('layouts.tema')
@section('titulo_contenido') Listado de Reservaciones @endsection
@section('subtitulo_contenido') Reservaciones Registradas en Sistema @endsection
@section('ruta_ref') <a href="{{ url('/admin/categorias') }}">Categorias</a> @endsection
@section('contenido')
<a href="{{ route('clients.index')}}" class="btn btn-success btn-block mb-2">Comenzar Nueva Reservación</a>
@if($reservaciones->count() == 0)
<div class="alert alert-info">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <strong>Algo anda mal!</strong> Parece que no hay reservaciones registradas en el sistema.
</div>
@endif
<div class="table table-bordered table-responsive">
  <table class="table table-hover">
    <thead>
      <tr>
        <th>ID</th>
        <th>FECHA</th>
        <th>HORA</th>
        <th>QTY</th>
        <th>OCASIÓN</th>
        <th>MESA</th>
        <th>PAGO POR</th>
        <th>TOTAL</th>
        <th>DETALLE</th>
        <th>PEDIDO</th>
        <th>ACCIONES</th>
      </tr>
    </thead>
    <tbody>
      @foreach($reservaciones as $reservacion)
      {!! Form::open(['route' => ['reservations.destroy', $reservacion->id], 'method' => 'Delete']) !!}
      <tr>
        <td> <a class="btn btn-sm btn-info" href="{{ route('reservations.show', $reservacion->id) }}">{{ $reservacion->id }}</a> </td>
        <td> {{ $reservacion->date }} </td>>
        <td> {{ $reservacion->hour }} </td>
        <td> {{ $reservacion->clients_quantity }} </td>
        <td> {{ $reservacion->occasion }}</td>
        <td> {{ $reservacion->table->number }}</td>
        <td> {{ $reservacion->payment }}</td>
        <td> {{ '$' }} </td>
        <td> {{ $reservacion->details }}</td>
        <td> {{ $reservacion->created_at }}</td>
        <td> {!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger']) !!} </td>
      </tr>
      {!! Form::close() !!}
      @endforeach
    </tbody>
  </table>
  {{ $reservaciones->links() }}
</div>
@endsection
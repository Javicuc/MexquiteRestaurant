@extends('layouts.tema')
@section('titulo_contenido') Instancia de Reservacion @endsection
@section('subtitulo_contenido') Información Obtenida de la Reservación Registrado en el Sistema @endsection
@section('ruta_ref') <a href="{{ url('/admin/reservations') }}">Reservaciones</a> @endsection

@section('contenido')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-title-w-btn">
        <h3 class="title">{{$reservacion->id}}</h3>
        <div class="btn-group">
          <a class="btn btn-primary" href="{{ route('clients.index') }}"><i class="fa fa-lg fa-plus"></i></a>
          <a class="btn btn-primary" href="{{ route('clients.reservations.edit', $reservacion->client_id, $reservacion) }}"><i class="fa fa-lg fa-edit"></i></a>
        </div>
      </div>
      <div class="tile-body">
        <div class="table table-responsive">
          <table class="table table-hover">
            <thead>
              <th>FECHA</th>
              <th>HORA</th>
              <th>QTY</th>
              <th>PAGO POR</th>
              <th>CLIENTE</th>
              <th>MESA</th>
            </thead>
            <tbody>
              <tr>
                <td>{{ $reservacion->date }}</td>
                <td>{{ $reservacion->hour }}</td>
                <td>{{ $reservacion->quantity_clients }}</td>
                <td>{{ $reservacion->payment }}</td>
                <td>{{ $reservacion->client->name }}</td>
                <td>{{ $reservacion->table->number }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>
  
  <div class="col-md-12">
    <div class="tile">
      <h3 class="tile-title">Platillos de la Reservación</h3>
      <div class="table table-bordered table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>PLATILLO</th>
              <th>PRECIO</th>
              <th>DESCRIPCION</th>
              <th>CATEGORIA</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            @foreach($platillos as $platillo)
            {!! Form::open(['route' => ['reservations.dishes.+
            destroy', $cliente->id, $reservacion->id], 'method' => 'Delete']) !!}
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
    </div>
  </div>

</div>
@endsection
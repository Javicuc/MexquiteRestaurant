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
          <a class="btn btn-primary" href="{{ route('reservations.edit', $reservacion->id) }}"><i class="fa fa-lg fa-edit"></i></a>
           {!! Form::open(['route' => ['reservations.destroy', $reservacion->id], 'method' => 'Delete']) !!}
          {{ Form::button('<i class="fa fa-lg fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
          {!! Form::close() !!}
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
                <td>{{ $reservacion->clients_quantity }}</td>
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
  
  <div class="col-md-9">
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
            {!! Form::open(['route' => ['reservations.dishes.destroy', $reservacion->id, $platillo->id], 'method' => 'Delete']) !!}
            <tr>
              <td> <a class="btn btn-sm btn-info" href="{{ route('dishes.show', $platillo->id) }}">{{ $platillo->id }}</a> </td>
              <td> {{ $platillo->name }} </td>>
              <td> {{ '$' . $platillo->price }} </td>
              <td> {{ $platillo->description }} </td>
              <td> {{ $platillo->category->name }}</td>
              <td> {!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger']) !!} </td>
            </tr>
            {!! Form::close() !!}
            @endforeach
          </tbody>
        </table>
        {{ $platillos->links() }}
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="tile">
      <div class="tile-title-w-btn">
        <h3 class="title">Agregar Platillos</h3>
      </div>
      <div class="tile-body">
        <p>Agregar platillos a la Reservación seleccionada</p>
        <h4>Platillos</h4>
        {!! Form::open(['route' => ['reservations.dishes.store', $reservacion->id]]) !!}
        <div class="form-group">
          <select class="form-control" name="dishes">
            @foreach($platillosList as $platillo)
            <option value="{{ $platillo->id }}">{{ $platillo->name }}</option>
            @endforeach
          </select>
          <br>
          <div class="form-group">
            <h4>Cantidad</h4>
            {!! Form::number('quantity', '0', ['min' => '1', 'max' => '8', 'class' => 'form-control', 'placeholder' => 'Ingresa cantidad del platillo seleccionado']) !!}
          </div>
          {!! Form::submit('Agregar Platillo', ['class' => 'btn btn-block btn-primary btn-succesful']) !!}
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div>

</div>
@endsection
@extends('layouts.tema')
@section('titulo_contenido') Registrar Reservación en Cliente @endsection
@section('subtitulo_contenido') Registrar Reservación en Sistema para un Cliente Seleccionado @endsection
@section('ruta_ref') <a href="{{ url('/admin/clients') }}">Clientes</a> @endsection
@section('contenido')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      
      @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
      @endif
      
      
      <h3 class="tile-title">Rellene los Campos para Reservación</h3>
      <div class="tile-body">
        {!! Form::open(['route' => ['clients.reservations.store',  $cliente]]) !!}
        {{-- csrf_field() --}}
        
        <div class="form-group">
          <label for="date" class="control-label">Fecha</label>
          {!! Form::text('date', null, ['class' => 'form-control', 'placeholder' => 'Ingresa fecha de reservación']); !!}
        </div>
        
        <div class="form-group">
          <label for="hour" class="control-label">Hora</label>
          {!! Form::text('hour', null, ['class' => 'form-control', 'placeholder' => 'Ingresa hora de reservación']) !!}
        </div>
        <div class="form-group">
          <label for="clients_quantity" class="control-label">Personas</label>
          {!! Form::text('clients_quantity', null, ['class' => 'form-control', 'placeholder' => 'Ingresa cantidad de personas que asistiran']) !!}
        </div>
        <div class="form-group">
          <label for="table_id" class="control-label">Mesa</label>
          {!! Form::text('table_id', null, ['class' => 'form-control', 'placeholder' => 'Selecciona la mesa a reservar']) !!}
        </div>
        <div class="form-group">
          <label for="payment_id" class="control-label">Método de Pago</label>
          {!! Form::text('payment_id', null, ['class' => 'form-control', 'placeholder' => 'Selecciona el método de pago']) !!}
        </div>

        <div class="container">

          <h1>Laravel Bootstrap Datepicker</h1>

          <input class="date form-control" type="text">

        </div>

        <div class="tile-footer">
          <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>
        </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

    $('.date').datepicker({  

       format: 'mm-dd-yyyy'

     });  

</script>  

@stop
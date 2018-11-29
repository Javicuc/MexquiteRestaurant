@extends('layouts.tema') 

@section('titulo_contenido') Actualizar Reservación @endsection
@section('subtitulo_contenido') Actualizar Reservación Registrada en el Sistema @endsection
@section('ruta_ref') <a href="{{ url('/admin/reservations') }}">Reservaciones</a> @endsection

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

        @if(isset($reservacion))
          {!! Form::model($reservacion, ['route' => ['reservations.update', $reservacion->id], 'method' => 'PATCH']) !!}
        @else
          {{ redirect()->route('reservations.index') }}
        @endif 

        <div class="form-group">
          <label for="payment" class="control-label">Método de Pago</label>
          <select class="form-control" name="payment">
            @foreach($metodos as $metodo)
                <option value="{{ $metodo }}">{{ $metodo }}</option>
            @endforeach
          </select>
        </div>

        <div class="form-group">
            <label for="occasion" class="control-label">Motivo u ocasión especial</label>
            {!! Form::text('occasion', null, ['class' => 'form-control', 'placeholder' => 'Escriba motivo especial ej: Cumpleaños']); !!}
        </div>

        <div class="form-group">
          <label for="details" class="control-label">¿Agregar algún detalle?</label>
          {!! Form::textarea('details', null, ['class' => 'form-control', 'rows' => 2, 'maxlength' => '275', 'style' => 'resize:none']) !!}
        </div>

          <div class="tile-footer">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@stop
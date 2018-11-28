@extends('layouts.tema') 

@section('titulo_contenido') Registrar Reservación en Cliente @endsection
@section('subtitulo_contenido') Registrar Reservación en Sistema para un Cliente Seleccionado @endsection
@section('ruta_ref') <a href="{{ url('/clients') }}">Clientes</a> @endsection

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

        @if(isset($cliente))
          {!! Form::model($cliente, ['route' => ['clients.reservations.update', $cliente->id], 'method' => 'PATCH']) !!}
        @else
          {!! Form::open(['route' => ['clients.reservations.store']]) !!}
        @endif 
          {{-- csrf_field() --}}
          
          <div class="form-group">
            <label for="name" class="control-label">Nombre</label>
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre del cliente']); !!}
          </div>
          
          <div class="form-group">            
            <label for="email" class="control-label">Correo</label>
              {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'Ingresa un correo electrónico']) !!}
          </div>

          <div class="form-group">            
            <label for="phone" class="control-label">Telefono</label>
              {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => 'Ingresa un número de teléfono']) !!}
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
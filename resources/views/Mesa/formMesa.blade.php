@extends('layouts.tema') 

@section('titulo_contenido') Registrar Mesa @endsection
@section('subtitulo_contenido') Registrar Mesa en Sistema @endsection
@section('ruta_ref') <a href="{{ url('/admin/tables') }}">Mesas</a> @endsection

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
      
      
      <h3 class="tile-title">Rellene los Campos para Mesa</h3>
      <div class="tile-body">

        @if(isset($mesa))
          {!! Form::model($mesa, ['route' => ['tables.update', $mesa->id], 'method' => 'PATCH']) !!}
        @else
          {!! Form::open(['route' => ['tables.store']]) !!}
        @endif 
          {{-- csrf_field() --}}
          <div class="form-group">
            <label for="number" class="control-label">Número</label>
            {!! Form::text('number', null, ['class' => 'form-control', 'placeholder' => 'Escriba el número de la mesa']); !!}
          </div>
          
          <div class="form-group">            
            <label for="price" class="control-label">Precio</label>
              {!! Form::number('price', null, ['min' => '100', 'max' => '1000', 'step' => '0.1', 'class' => 'form-control', 'placeholder' => 'Ingresa el precio de la mesa']) !!}
          </div>

          <div class="form-group">
            <label for="size" class="control-label">Tamaño</label>
            {!! Form::number('size', null, ['min' => '1', 'max' => '8', 'class' => 'form-control', 'placeholder' => 'Ingresa cantidad de personas para la mesa']) !!}
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
@extends('layouts.tema') 

@section('titulo_contenido') Registrar Platillo @endsection
@section('subtitulo_contenido') Registrar Platillo en Sistema @endsection
@section('ruta_ref') <a href="{{ url('/admin/dishes') }}">Platillos</a> @endsection

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
      
      
      <h3 class="tile-title">Rellene los Campos para Platillo</h3>
      <div class="tile-body">

        @if(isset($platillo))
          {!! Form::model($alumno, ['route' => ['dishes.update', $alumno->id], 'method' => 'PATCH']) !!}
        @else
          {!! Form::open(['route' => 'dishes.store']) !!}
        @endif 
          {{-- csrf_field() --}}
          <div class="form-group">
            <label for="name" class="control-label">Nombre</label>
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre del platillo']); !!}
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
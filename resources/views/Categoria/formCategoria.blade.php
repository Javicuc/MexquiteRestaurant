@extends('layouts.tema') 

@section('titulo_contenido') Registrar Categoria @endsection
@section('subtitulo_contenido') Registrar Categoria en Sistema @endsection
@section('ruta_ref') <a href="{{ url('/categorias') }}">Categorias</a> @endsection

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
      
      
      <h3 class="tile-title">Rellene los Campos para Categoria</h3>
      <div class="tile-body">

        @if(isset($categoria))
          {!! Form::model($categoria, ['route' => ['categories.update', $categoria->id],  'files' => true, 'enctype' => 'multipart/form-data', 'method' => 'PATCH']) !!}
        @else
          {!! Form::open(['route' => ['categories.store'], 'files' => true, 'enctype' => 'multipart/form-data']) !!}
        @endif 
          {{-- csrf_field() --}}
          <div class="form-group">
            <label for="name" class="control-label">Nombre</label>
            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Escriba el nombre de la categoria']); !!}
          </div>
          <div class="form-group">            
            <label for="description" class="control-label">Descripción</label>
              {!! Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Ingresa la descripción de la categoria']) !!}
          </div>
          <div class="form-group">
            <label for="icon" class="control-label">Imagen</label>
              {!! Form::file('icon',['class' => 'form-control', 'placeholder' => 'Ingresa imagen de la categoria',  'files' => true ]) !!}
          </div>
          <div class="tile-footer">
            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar
            </button>
          </div>
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@stop
@extends('layouts.tema')
@section('titulo_contenido') Instancia de Mesa @endsection
@section('subtitulo_contenido') Información Obtenida de la Mesa Registrada en el Sistema @endsection
@section('ruta_ref') <a href="{{ url('/admin/tables') }}">Mesas</a> @endsection

@section('contenido')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-title-w-btn">
        <h3 class="title">{{$mesa->number}}</h3>
        <div class="btn-group">
          <a class="btn btn-primary" href="{{ route('tables.create') }}"><i class="fa fa-lg fa-plus"></i></a>
          <a class="btn btn-primary" href="{{ route('tables.edit', $mesa->id) }}"><i class="fa fa-lg fa-edit"></i></a>
          {!! Form::open(['route' => ['tables.destroy', $mesa->id], 'method' => 'Delete']) !!}
          {{ Form::button('<i class="fa fa-lg fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
          {!! Form::close() !!}
        </div>
      </div>
      <div class="tile-body">
        <div class="table table-responsive">
          <table class="table table-hover">
            <thead>
              <th>NÚMERO</th>
              <th>PRECIO</th>
              <th>STATUS</th>
              <th>TAMAÑO</th>
            </thead>
            <tbody>
              <tr>
                <td>{{ $mesa->number }}</td>
                <td>{{ $mesa->price }}</td>
                <td>{{ $mesa->status }}</td>
                <td>{{ $mesa->size}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
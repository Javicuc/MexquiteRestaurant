@extends('layouts.tema')
@section('titulo_contenido') Instancia de Categoria @endsection
@section('subtitulo_contenido') Información Obtenida de la Categoria Registrada en el Sistema @endsection
@section('ruta_ref') <a href="{{ url('/admin/categories') }}">Categorias</a> @endsection

@section('contenido')
<div class="row">
  <div class="col-md-12">
    <div class="tile">
      <div class="tile-title-w-btn">
        <h3 class="title">{{$categoria->name}}</h3>
        <div class="btn-group">
          <a class="btn btn-primary" href="{{ route('categories.create') }}"><i class="fa fa-lg fa-plus"></i></a>
          <a class="btn btn-primary" href="{{ route('categories.edit', $categoria) }}"><i class="fa fa-lg fa-edit"></i></a>
          {!! Form::open(['route' => ['categories.destroy', $categoria->id], 'method' => 'Delete']) !!}
          {{ Form::button('<i class="fa fa-lg fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-primary'] )  }}
          {!! Form::close() !!}
        </div>
      </div>
      <div class="tile-body">
        <div class="table table-responsive">
          <table class="table table-hover">
            <thead>
              <th>NOMBRE</th>
              <th>DESCRIPCIÓN</th>
              <th>IMAGEN</th>
            </thead>
            <tbody>
              <tr>
                <td>{{ $categoria->name }}</td>
                <td>{{ $categoria->description }}</td>
                <td> <img class="app-sidebar__user-avatar" src="{{url('/img/' . $categoria->icon )}}" width="50" height="50" alt="Image"/> </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  {{-- <div class="col-md-6">
    <div class="tile">
      <div class="tile-title-w-btn">
        <h3 class="title">Agregar Platillos</h3>
      </div>
      <div class="tile-body">
        <p>Agregar platillos a la categoria seleccionada</p>
        <h4>Platillos</h4>
        {!! Form::open(['route' => ['categories.dishes.store', $categoria->id]]) !!}
        <div class="form-group">
          <select class="form-control" name="dishes">
            @foreach($platillos as $platillo)
            <option value="{{ $platillo->id }}">{{ $platillo->name }}</option>
            @endforeach
          </select>
          <br>
          {!! Form::submit('Agregar Platillo', ['class' => 'btn btn-primary btn-succesful']) !!}
          {!! Form::close() !!}
        </div>
      </div>
    </div>
  </div> --}}

  <div class="clearfix"></div>
  
  <div class="col-md-6">
    <div class="tile">
      <h3 class="tile-title">Platillos de la Categoria</h3>
      <div class="table table-bordered table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>NOMBRE</th>
              <th>DESCRIPCIÓN</th>
              <th>PRECIO</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            @foreach($platillos as $platillo)
            {!! Form::open(['route' => ['categories.dishes.destroy', $categoria->id, $platillo->id], 'method' => 'Delete']) !!}
            <tr>
              <td> {{ $platillo->id }} </td>
              <td> {{ $platillo->name}} </td>>
              <td> {{ $platillo->description }} </td>
              <td> {{ '$' . $platillo->price }} </td>
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

  <div class="col-md-6">
    <div class="tile">
      <h3 class="tile-title">Galerias de la Categoria</h3>
      <div class="table table-bordered table-responsive">
        <table class="table table-hover">
          <thead>
            <tr>
              <th>ID</th>
              <th>NOMBRE</th>
              <th>DESCRIPCIÓN</th>
              <th>ACCIONES</th>
            </tr>
          </thead>
          <tbody>
            @foreach($galerias as $galeria)
            {!! Form::open(['route' => ['categories.galleries.destroy', $categoria->id, $galeria->id], 'method' => 'Delete']) !!}
            <tr>
              <td> {{ $galeria->id }} </td>
              <td> {{ $galeria->name}} </td>>
              <td> {{ $galeria->description }} </td>
              <td> {!! Form::submit('Eliminar', ['class' => 'btn btn-sm btn-danger']) !!} </td>
            </tr>
            {!! Form::close() !!}
            @endforeach
          </tbody>
        </table>
        {{ $galerias->links() }}
      </div>
    </div>
  </div>

</div>
@endsection
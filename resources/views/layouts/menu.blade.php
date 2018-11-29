<ul class="app-menu">
  
  <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-calendar"></i><span class="app-menu__label">Reservaciones</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item" href="{{ route('reservations.index') }}"><i class="icon fa fa-list-ol"></i>Listar Reservaciones</a></li>
    </ul>
  </li>

  <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-calendar"></i><span class="app-menu__label">Mesas</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item" href="{{ route('tables.index') }}"><i class="icon fa fa-list-ol"></i>Listar Mesas</a></li>
    </ul>
  </li>

  <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-cutlery"></i><span class="app-menu__label">Platillos</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item" href="{{ route('dishes.index') }}"><i class="icon fa fa-list-ol"></i>Listar Platillos</a></li>
      <li><a class="treeview-item" href="{{ route('dishes.create') }}"><i class="icon fa fa-pencil"></i>Crear Platillo</a></li>
    </ul>
  </li>

  {{-- <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-picture-o"></i><span class="app-menu__label">Galerias</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item" href="{{ route('galleries.index') }}"><i class="icon fa fa-list-ol"></i>Listar Galerias</a></li>
      <li><a class="treeview-item" href="{{ route('galleries.create') }}"><i class="icon fa fa-pencil"></i>Crear Galeria</a></li>
    </ul>
  </li> --}}

  <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-list-alt"></i><span class="app-menu__label">Categorias</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item" href="{{ route('categories.index') }}"><i class="icon fa fa-list-ol"></i>Listar Categorias</a></li>
      <li><a class="treeview-item" href="{{ route('categories.create') }}"><i class="icon fa fa-pencil"></i>Crear Categoria</a></li>
    </ul>
  </li>

  <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Clientes</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item" href="{{ route('clients.index') }}"><i class="icon fa fa-list-ol"></i>Listar Clientes</a></li>
      <li><a class="treeview-item" href="{{ route('clients.create') }}"><i class="icon fa fa-pencil"></i>Crear Cliente</a></li>
    </ul>
  </li>

  <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Usuarios</span><i class="treeview-indicator fa fa-angle-right"></i></a>
    <ul class="treeview-menu">
      <li><a class="treeview-item" href="{{ route('users.index') }}"><i class="icon fa fa-list-ol"></i>Listar Usuarios</a></li>
      <li><a class="treeview-item" href="{{ route('users.create') }}"><i class="icon fa fa-pencil"></i>Crear Usuario</a></li>
    </ul>
  </li>
</ul>
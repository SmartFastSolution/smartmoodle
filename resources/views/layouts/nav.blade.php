<!DOCTYPE html>
<html>


<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('titulo', 'SmartMoodle')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <!-- datatabes -->
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    @yield('css')

</head>

<body class="hold-transition sidebar-mini  layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- layout-navbar-fixed -->
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <ul class="navbar-nav ml-auto">
                @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                </li>
                @else
                <li class="nav-item dropdown">
                    <a class="nav-link" href="" role="button" id="dropdownMenuLink" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }}</a>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-in-alt"></i>Cerrar Sesión
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ url('/sistema') }}" class="brand-link">
                <img src=" {{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-4" style="opacity: .8">
                <span class="brand-text font-weight-light">SmartMoodle</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->


                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="true">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->




                        <li class="nav-header">ADMINISTRACIÓN</li>
                        <li class="nav-item">
                            @can('haveaccess', 'rol.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-lock"></i>
                                <p>
                                    Roles
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('roles.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lista de Roles</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        @endcan
                        @can('haveaccess', 'user.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-shield"></i>
                                <p>
                                    Usuarios
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('users.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lista de Usuarios</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                        @endcan
                        @can('haveaccess', 'menu.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-cog"></i>
                                <p>
                                    Menú
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('permissions.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lista de Permisos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('haveaccess', 'instituto.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-cog"></i>
                                <p>
                                    Instituto
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('institutos.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lista de Institutos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('haveaccess', 'curso.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-cog"></i>
                                <p>
                                    Cursos
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('cursos.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lista de Cursos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('haveaccess', 'nivel.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-cog"></i>
                                <p>
                                    Niveles
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('nivels.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lista de Niveles</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('haveaccess', 'materia.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-cog"></i>
                                <p>
                                    Materias
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('materias.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lista de Materias</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('haveaccess', 'contenido.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-cog"></i>
                                <p>
                                    Contenido
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('contenidos.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lista de Conteidos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('haveaccess', 'asignacion.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-cog"></i>
                                <p>
                                    Asignación M/C
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('distribucionmacus.index')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lista de Asignaciones</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan
                        @can('haveaccess', 'talleres.index')
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="fas fa-user-cog"></i>
                                <p>
                                   Talleres
                                    <i class="fas fa-angle-left right"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{route('admin.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Lista de Talleres</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endcan

                        <li class="nav-header">DOCENTE</li>
                        <li class="nav-item">
                            <a href="https://adminlte.io/docs/3.0" class="nav-link">
                                <i class="nav-icon fas fa-file"></i>
                                <p>Documentation</p>
                            </a>
                        </li>
                        <li class="nav-header">ESTUDIANTE</li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Level 1</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-circle"></i>
                                <p>
                                    Level 1
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Level 2</p>
                                    </a>
                                </li>
                                <li class="nav-item has-treeview">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>
                                            Level 2
                                            <i class="right fas fa-angle-left"></i>
                                        </p>
                                    </a>
                                    <ul class="nav nav-treeview">
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a href="#" class="nav-link">
                                                <i class="far fa-dot-circle nav-icon"></i>
                                                <p>Level 3</p>
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Level 2</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>Level 1</p>
                            </a>
                        </li>

                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-6">
                        <div class="col-sm-12">

                            @yield('encabezado')

                        </div>

                    </div>
                </div><!-- /.container-fluid -->
            </section>
            <section class="content">

                @yield('content')



            </section>
        </div>

    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>

    <!-- datatables script -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

    @yield('js')

</body>

</html>



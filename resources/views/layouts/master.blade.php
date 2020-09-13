<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> @yield('title', 'Administracion')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

    @yield('styles')
    


</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">


    <div class="wrapper" >
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-info navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>

            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" placeholder="Buscar"
                        aria-label="Buscar">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </div>
                </div>
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Messages Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-comments"></i>
                        <span class="badge badge-danger navbar-badge"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->

                            <div class="media">

                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">

                            </div>
                            <!-- Message End -->
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <!-- Message Start -->
                            <div class="media">

                            </div>
                            <!-- Message End -->
                        </a>
                    </div>
                </li>
                <!-- Notifications Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#">
                        <i class="fas fa-bell"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                        <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </li>

                <!-- aqui va la barra lateral pero como se le añade informacion-->
                <!--
                <li class="nav-item">
                    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" >
                        <i class="fas fa-th-large"></i>
                    </a>
                </li>
               -->

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-skin-blue-light elevation-4">

            <!-- Brand Logo -->

            <a href="{{ url('/') }}" class="brand-link">
                <img src="../img/escuela.png" alt="img/hombre.png" class="brand-image img-circle elevation-3"
                    style="opacity: .8">
                <span class="brand-text font-weight-blue">Sistema Educativo</span>
            </a>

            <!-- Sidebar -->
            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="../img/hombre.png" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">
                            @guest
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                            @else
                            {{ Auth::user()->name }}

                        </a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <!--  <i class="nav-icon fas fa-tachometer-alt"></i> -->
                                <i class="nav-icon fas fa-users"></i>
                                <p>
                                    Ingreso
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="./index.html" class="nav-link">
                                        <i class="fas fa-business-time"></i>
                                        <p>Perfil Administrador</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="./index2.html" class="nav-link ">
                                        <i class="fas fa-address-card"></i>
                                        <p>Perfil Docente</p>
                                    </a>
                                </li>

                            </ul>
                        </li>
                    </ul>
                </nav>
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
                            with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview menu-open">
                            <a href="#" class="nav-link active">
                                <!--  <i class="nav-icon fas fa-tachometer-alt"></i> -->
                                <i class="fas fa-edit"></i>
                                <p>
                                    Talleres
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>{{ $i = 0 }}
                            <ul class="nav nav-treeview">
                                @foreach ($talleres = App\Taller::get() as $e)
                                    <li class="nav-item">
                                    <a href="{{ route('taller'.++$i) }}" class="nav-link">
                                        <i class="fas fa-circle nav-icon"></i>
                                        <p>{{ $e->nombre }}</p>
                                    </a>
                                </li> 
                                @endforeach
                                                          
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">
                        <li class="nav-item has-treeview menu-open">
                            
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a class="dropdown-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-in-alt"></i>
                                        <p> Cerrar Sesión</p>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                    </form>
                                    @endguest
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>

            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <br>
            @yield('contenido')
        </div>
    <!-- /.control-sidebar -->

        <!-- Main Footer -->
        <footer class="main-footer">

            <div class="float-right d-none d-sm-inline-block">

            </div>
        </footer>
    </div>


   
    <script src="{{ asset('js/app.js') }}"></script>


    @yield('script')


</body>

</html>
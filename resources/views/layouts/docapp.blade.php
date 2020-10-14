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
        <nav class="navbar  navbar-dark bg-dark">
            <!-- SEARCH FORM -->
            <a href="{{ url('/sistema/homedoc')}}" class="brand-link">
                <img src=" {{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-4" style="opacity: .8">
                <span class="brand-text font-weight-light">SmartMoodle</span>
            </a>
            <form class="form-inline ml-3">
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
    </div>

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

        @yield('contenido')



    </section>




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
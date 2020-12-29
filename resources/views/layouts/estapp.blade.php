<div class="wrapper">
        <!-- Navbar -->
        <nav class=" navbar navbar-expand navbar-light bg-light fixed-top">

            <!-- SEARCH FORM -->
            <a href="{{ url('/sistema/homees') }}" class="brand-link">
                <img src=" {{asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-4" style="opacity: .8">
                <span class="brand-text font-weight-light">SmartMoodle</span>
            </a>
            <ul class="navbar-nav">
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/sistema/home') }}" class="nav-link">Administracion</a>
                </li> -->
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{ url('/sistema/perfil') }}" class="nav-link">Perfil</a>
                </li> -->
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Actividades</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        Cursos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">FAQ</a>
                        <a class="dropdown-item" href="#">Support</a>
                        <a class="dropdown-item" href="#">Contact</a>
                    </div>
                </li>
            </ul>

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
                        <a class="dropdown-item" href="{{ url('sistema/estudiante/password') }}">
                        <i class="fas fa-lock"></i> Cambiar Contraseña
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                            <i class="fas fa-sign-in-alt"></i> Cerrar Sesión
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
    <br><br><br>
    <section class="content">
        @yield('content')
    </section>

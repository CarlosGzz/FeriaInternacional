<nav class="navbar navbar-inverse navbar-static-top" role="navigation">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                Feria Internacional
                @if (Auth::user())
                    {{ Auth::user()->edicion}}
                @endif
            </a>
        </div>

        <!-- Nav Collapsible-->
        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Center Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ url('/home') }}">Home
                    </a>
                </li>
                @if (Auth::user())
                    @if (Auth::user()->tipo == "administrador")
                        <li>
                            <a href="{{ url('/evento/eventos') }}">Eventos
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/home') }}">Contenido Cultural
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/home') }}">Redes Sociales
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->tipo == "organizador")
                        <li>
                            <a href="{{ url('/evento/eventos') }}">Eventos
                            </a>
                        </li>
                        <li>
                            <a href="{{ url('/home') }}">Redes Sociales
                            </a>
                        </li>
                    @endif
                    @if (Auth::user()->tipo == "editor")
                        <li>
                            <a href="{{ url('/home') }}">Contenido Cultural
                            </a>
                        </li>
                    @endif
                @endif
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @if (Auth::guest())
                    <li>
                        <a href="{{ url('/login') }}">Iniciar Sesión</a>
                    </li>
                    <li>
                        <a href="{{ url('/register') }}">Registrar</a>
                    </li>
                @else
                <!-- /Authentication Links for type of admin -->
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{ url('/edicion/ediciones') }}">
                                <i class="glyphicon glyphicon-wrench"></i>Edicion
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ url('/logout') }}">
                                <i class="glyphicon glyphicon-log-out"></i>Cerrar Sesión
                            </a>
                        </li>
                    </ul>
                </li>
                @endif
                <!-- /Authentication Links -->
            </ul>
        </div>
    </div>
</nav>
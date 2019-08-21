<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
    <!--<pre> {{ dump(request()->path()) }} </pre>-->
    <a class="navbar-brand" href="#">Menú</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('inicio') }}">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('acercade') }}">Acerca de <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('catalogo') }}">Catálogo <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('mensajes.create') }}">Contactos <span class="sr-only">(current)</span></a>
        </li>
        <!-- si existe un usuario autenticado actualmente -->
        {{-- <!--@if (auth()->check())
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('mensajes.index') }}">Mensajes <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a href="{{ route('logout') }}">
                Cerrar sesion de {{ auth()->user()->name }} 
                </a>
            </li>
        @endif --> --}}
        @if (auth()->check())
            <li class="{{ seleccionado('mensajes.index') }}">
                <a href="{{ route('mensajes.index') }}" class="nav link">
                    Mensajes 
                </a>
            </li>
            @if (auth()->user()->hasRoles(['administrador','editor']))
                <li class="{{ seleccionado('usuarios*') }}">
                    <a href="{{ route('usuarios.index') }}" class="nav link">
                        Usuarios
                    </a>
                </li>
            @endif
        @endif

        {{-- <!-- sólo si es un usuario invitado -->
        @if (auth()->guest())
            <li class="nav-item active">
                <a href="{{ route('login') }}">Autenticarse</a>
            </li>
        @endif  --}}

        @if (auth()->guest())
            <li class="{{ seleccionado('login') }}">
                <a href="{{ route('login') }}" class="nav-link">
                    Autenticarse
                </a>
            </li>
        @else
            <li class="dropdown">
                <a href="{{ route('mensajes.index') }}" class="nav-link dropdown-toggle" data-toggle="dropdown">
                    {{ auth()->user()->name }}
                </a>
                <ul class="dropdown-menu dropdown-menu-right">
                    <li class="nav-item">
                        <li><a class="dropdown-item" href="/usuarios/{{ auth()->id() }}/editar">Mi cuenta</a><li>
                        <li><a class="dropdown-item" href="{{ route('logout') }}">Cerrar sesión</a><li>
                    </li>
                    {{-- <li class="nav-item">
                        <li>
                            <a href="{{ route('logout') }}" class="dropdown-item">
                                Cerrar sesión
                            </a>
                        </li>
                    </li>
                    <li class="nav-item">
                        <li>
                            <a class="dropdown-item" href="/usuarios/{{ auth()->id() }}/edit">
                                Mi cuenta
                            </a>
                        <li>
                    </li> --}}
                </ul>
            </li>
        @endif
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
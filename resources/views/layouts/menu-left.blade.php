<!-- Sidebar -->
<aside class="sidebar sidebar-color-company sidebar-icons-right sidebar-icons-boxed sidebar-expand-lg sidebar-{{ config('brand.sidebar-bg-color')}} ">
    <header class="sidebar-header">
        <span class="logo">
          <a href="{{route('home')}}"><img src="{{config('brand.main-logo')}}" alt="logo"></a>
        </span>
    </header>

    <nav class="sidebar-navigation">
        <ul class="menu">

            <li class="menu-category">Admin</li>

            <li class="menu-item {{ Route::currentRouteName() == 'home' ? 'active' : null }}">
                <a class="menu-link" href="{{ route('home') }}">
                    <span class="icon fa fa-home"></span>
                    <span class="title">Inicio</span>
                </a>
            </li>

            <li class="menu-item {{ Route::currentRouteName() == 'user.index' ? 'active' : null }}">
                <a class="menu-link" href="{{ route('user.index') }}">
                    <span class="icon fa fa-user"></span>
                    <span class="title">Users</span>
                </a>
            </li>

            <li class="menu-item {{ Route::currentRouteName() == 'multimedia.index' ? 'active' : null }}">
                <a class="menu-link" href="{{ route('multimedia.index') }}">
                    <span class="icon fa fa-image"></span>
                    <span class="title">Multimedia</span>
                </a>
            </li>
            <li class="menu-item {{ Route::currentRouteName() == 'configuration.index' ? 'active' : null }}">
                <a class="menu-link" href="{{ route('configuration.index') }}">
                    <span class="icon fa fa-cogs"></span>
                    <span class="title">Configuración</span>
                </a>
            </li>

            <li class="menu-item">
                <a class="menu-link" href="#" onclick="document.getElementById('logout-form').submit();">
                    <span class="icon ti-power-off"></span>
                    <span class="title">Cerrar sesión</span>
                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </li>

            <li class="menu-category">Ejemplo Submenú</li>


            <li class="menu-item">
                <a class="menu-link" href="#">
                    <span class="icon ti-layout"></span>
                    <span class="title">Layout</span>
                    <span class="arrow"></span>
                </a>

                <ul class="menu-submenu">
                    <li class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="dot"></span>
                            <span class="title">Sidebar</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="dot"></span>
                            <span class="title">Header</span>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a class="menu-link" href="#">
                            <span class="dot"></span>
                            <span class="title">Footer</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>

</aside>
<!-- END Sidebar -->

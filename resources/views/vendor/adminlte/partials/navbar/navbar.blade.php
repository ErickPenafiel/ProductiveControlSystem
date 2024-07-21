<nav
    class="main-header navbar
    {{ config('adminlte.classes_topnav_nav', 'navbar-expand') }}
    {{ config('adminlte.classes_topnav', 'navbar-white navbar-light') }}">

    {{-- Navbar left links --}}
    <ul class="navbar-nav">
        {{-- Left sidebar toggler link --}}
        @include('adminlte::partials.navbar.menu-item-left-sidebar-toggler')

        {{-- Configured left links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-left'), 'item')

        {{-- Custom left links --}}
        @yield('content_top_nav_left')
    </ul>

    {{-- Navbar right links --}}
    <ul class="navbar-nav ml-auto">
        {{-- Custom right links --}}
        @yield('content_top_nav_right')

        {{-- Configured right links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-right'), 'item')

        @if (Auth::user())
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fas fa-bell">
                        @if (Auth::user()->unreadNotifications->count() > 0)
                            <span class="badge badge-warning navbar-badge">
                                {{ Auth::user()->unreadNotifications->count() }}
                            </span>
                        @endif
                    </i>
                </a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-mwnu-right">
                    <span class="dropdown-header">
                        Nuevas Notificaciones
                    </span>
                    @forelse (auth()->user()->unreadNotifications as $notificacion)
                        {{-- <a href="{{ route('notificaciones.show', $notificacion->id) }}" class="dropdown-item"> --}}
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i>
                            <p>
                                {{ $notificacion->data['categoria'] }}: {{ $notificacion->data['temperatura'] }}
                                °C fuera de rango. Registro: {{ $notificacion->data['fechaRegistro'] }} a horas
                                {{ $notificacion->data['horaRegistro'] }}
                            </p>
                            <small>
                                {{ $notificacion->data['fecha'] }}
                            </small>
                            <span
                                class="float-right text-muted text-sm">{{ $notificacion->created_at->diffForHumans() }}</span>
                        </a>
                    @empty
                        <div class="p-3 pull-right text-muted text-sm">
                            Sin nuevas notificaciones
                        </div>
                    @endforelse
                    <div class="dropdown-divider"></div>
                    <span class="dropdown-header">
                        Notificaciones Leidas
                    </span>
                    @forelse (auth()->user()->readNotifications as $notificacion)
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> {{ $notificacion->data['temperatura'] }}
                            <span
                                class="ms-3 float-right text-muted text-sm">{{ $notificacion->created_at->diffForHumans() }}</span>
                        </a>
                    @empty
                        <div class="p-3 pull-right text-muted text-sm">
                            Sin notificaciones leidas
                        </div>
                    @endforelse
                    <div class="dropdown-divider"></div>
                    {{-- <a href="{{ route('notificaciones.index') }}" class="dropdown-item dropdown-footer">Mracar todas las
                        notificaciones leidas</a> --}}
                    <a href="{{ route('marcarLeidas') }}" class="dropdown-item dropdown-footer">Mracar todas las
                        notificaciones leidas</a>
                </div>
            </li>
        @endif

        {{-- User menu link --}}
        @if (Auth::user())
            @if (config('adminlte.usermenu_enabled'))
                @include('adminlte::partials.navbar.menu-item-dropdown-user-menu')
            @else
                @include('adminlte::partials.navbar.menu-item-logout-link')
            @endif
        @endif

        {{-- Right sidebar toggler link --}}
        @if (config('adminlte.right_sidebar'))
            @include('adminlte::partials.navbar.menu-item-right-sidebar-toggler')
        @endif
    </ul>

</nav>

<nav class="main-nav">
    <div class="nav-container">
        <div class="nav-left">
            <a href="{{ route('dashboard') }}" class="nav-brand">
                👵👴
            </a>
            <div class="nav-links">
                <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    Panel Principal
                </a>
                <a href="{{ route('medicamentos.index') }}" class="nav-link {{ request()->routeIs('medicamentos.*') ? 'active' : '' }}">
                    Medicamentos
                </a>
                <a href="{{ route('salud.index') }}" class="nav-link {{ request()->routeIs('salud.*') }}" >
                    Salud
                </a>
                <a href="{{ route('recordatorios.index') }}" class="nav-link {{ request()->routeIs('recordatorios.*') ? 'active' : '' }}">
                    Recordatorios
                </a>
            </div>
        </div>

        <div class="nav-user">
            <span class="user-name">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-secondary logout-button">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </div>
</nav>
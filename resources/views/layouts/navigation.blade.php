<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="/">Home</a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarContent"
            aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">
            <!-- Left side -->
            <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                </li>
            </ul>

            <!-- Right side -->
            <ul class="navbar-nav ml-auto">
                @auth
                    {{-- Utilisateur connecté --}}
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->username }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item" type="submit">Déconnexion</button>
                            </form>
                        </div>
                    </li>
                @endauth

                @guest
                    {{-- Utilisateur non connecté : bouton vers login --}}
                    <li class="nav-item">
                        <a class="btn btn-outline-primary" href="{{ route('login') }}">Se connecter</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

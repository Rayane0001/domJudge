<header>
    <nav>
        <ul>
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('about') }}">À propos</a></li>
            <li><a href="{{ route('contact') }}">Contacts</a></li>
            @auth
                <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Déconnexion</button>
                    </form>
                </li>
            @else
                <li><a href="{{ route('login') }}">Connexion</a></li>
                <li><a href="{{ route('register') }}">Inscription</a></li>
            @endauth
        </ul>
    </nav>
</header>

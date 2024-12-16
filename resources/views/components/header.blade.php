<header class="bg-dark text-white py-2 fixed-top w-100 z-index-1000">
    <nav class="d-flex justify-content-center align-items-center">
        <ul class="list-unstyled d-flex justify-content-center mb-0">
            <li class="mx-3"><a href="{{ route('home') }}" class="text-white text-decoration-none p-2 rounded hover-bg-dark">Accueil</a></li>
            <li class="mx-3"><a href="{{ route('about') }}" class="text-white text-decoration-none p-2 rounded hover-bg-dark">À propos</a></li>
            <li class="mx-3"><a href="{{ route('contact') }}" class="text-white text-decoration-none p-2 rounded hover-bg-dark">Contacts</a></li>
            @auth
                <li class="mx-3"><a href="{{ route('dashboard.index') }}" class="text-white text-decoration-none p-2 rounded hover-bg-dark">Dashboard</a></li>
                <li class="mx-3">
                    <form method="POST" action="{{ route('logout') }}" class="bg-transparent border-0 p-0 shadow-none align-self-center">
                        @csrf
                        <button type="submit" class="btn btn-danger p-2 border-0 shadow-none">Déconnexion</button>
                    </form>
                </li>
            @else
                <li class="mx-3"><a href="{{ route('login') }}" class="text-white text-decoration-none p-2 rounded hover-bg-dark">Connexion</a></li>
                <li class="mx-3">
                    <a href="{{ route('register') }}" class="btn btn-danger p-2 border-0 shadow-none">Inscription</a>
                </li>
            @endauth
        </ul>
    </nav>
</header>

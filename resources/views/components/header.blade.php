<header>
    <a href="{{ url('/accueil') }}">
        <img src="/icons/logo.png" alt="LogoSignest" class="logoheader">
    </a>
    <nav>
        <a href="{{ url('/accueil') }}" class="{{ request()->is('accueil') ? 'active' : '' }}">Accueil</a>
        <a href="{{ url('/apropos') }}" class="{{ request()->is('apropos') ? 'active' : '' }}">À propos</a>
        <a href="{{ url('/realisations') }}" class="{{ request()->is('realisations') ? 'active' : '' }}">Nos réalisations</a>
        <a href="{{ url('/contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Contact</a>
    </nav>
</header>

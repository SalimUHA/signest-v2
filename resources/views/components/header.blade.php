<div class="topbar">
    <span>📞 03 89 70 54 24</span>
    <span>📧 pc@signest68.com</span>
</div>

<header>
    <div class="header-content">
        <div class="logo-container">
            <a href="{{ url('/accueil') }}">
                <img src="/icons/logo.png" alt="Signest - Retour à l'accueil" class="logoheader">
            </a>
        </div>
        <nav>
            <a href="/accueil" class="{{ (request()->is('/') || request()->is('accueil')) ? 'active' : '' }}">Accueil</a>
            <a href="/apropos" class="{{ request()->is('apropos') ? 'active' : '' }}">À propos</a>
            <a href="/realisations" class="{{ request()->is('realisations') ? 'active' : '' }}">Nos réalisations</a>
            <a href="/meng" class="{{ request()->is('realisations') ? 'active' : '' }}">Meng</a>
            <a href="/contact" class="btn btn-header">Contactez-nous !</a>


        </nav>
        <div class="header-socials">
            <a href="https://www.facebook.com/p/Signest-100083348731916/" target="_blank" title="Facebook">
                <img src="/icons/facebook.png" alt="Facebook">
            </a>
            <a href="https://linkedin.com/Signest" target="_blank" title="LinkedIn">
                <img src="/icons/linkedin.png" alt="LinkedIn">
            </a>
        </div>
    </div>
</header>

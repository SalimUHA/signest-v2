<footer>
    <div class="footer-columns">
        <div class="border-right">
            <h4>ADRESSE</h4>
            <p>5 rue de Séville<br>68300 Saint-Louis</p>
        </div>
        <div class="border-right">
            <h4>CONTACT</h4>
            <p>03 89 70 54 24<br>pc@signest68.com</p>
        </div>
        <div>
            <h4>HORAIRES</h4>
            <p>Du lundi au jeudi<br>de 8h à 12h et de 13h15 à 17h</p>
            <p>Vendredi<br>de 8h à 12h</p>
        </div>
        <div class="border-left">
            <h4>FORMULAIRE</h4>
            <a href="{{ url('/contact') }}" class="btn">Contactez-nous !</a>
        </div>
    </div>

    <div class="footer-bottom">
        <div>
            <img src="/icons/logo.png" alt="Logo Signest" style="width: 250px; max-width: 100%; margin-bottom: 20px;">
        </div>
        <div>
            <h5>NAVIGATION</h5>
            <ul>
                <li><a href="{{ url('/accueil') }}">Accueil</a></li>
                <li><a href="{{ url('/apropos') }}">À propos</a></li>
                <li><a href="{{ url('/realisations') }}">Nos réalisations</a></li>
                <li><a href="{{ url('/contact') }}">Contact</a></li>
            </ul>
        </div>
        <div>
            <h5 class="footer-title-social">RÉSEAUX SOCIAUX</h5>
            <div class="footer-social">
                <a href="https://www.facebook.com/p/Signest-100083348731916/" target="_blank">
                    <img src="/icons/facebook.png" alt="Facebook" width="24" height="24" style="filter: brightness(0) invert(1);">
                    Facebook
                </a>
                <a href="https://linkedin.com/Signest" target="_blank">
                    <img src="/icons/linkedin.png" alt="LinkedIn" width="24" height="24" style="filter: brightness(0) invert(1);">
                    LinkedIn
                </a>
            </div>
        </div>
        <div>
            <h5>MENTIONS LÉGALES</h5>
            <ul>
                <li><a href="{{ url('/mentions-legales') }}">Mentions légales</a></li>
                <li><a href="{{ url('/cgu') }}">CGU</a></li>
                <li><a href="{{ url('/confidentialite') }}">Données personnelles & Cookies</a></li>
            </ul>
        </div>
    </div>

    <div class="footer-copy">
        © 2025 Signest. Tous droits réservés.
    </div>
</footer>

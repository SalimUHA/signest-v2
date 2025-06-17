@extends('layouts.base')

@section('title', 'Accueil')

@section('content')
    <section class="hero">
        <video autoplay muted loop playsinline>
            <source src="{{ asset('videos/fond.mp4') }}" type="video/mp4">
            Votre navigateur ne supporte pas la vidéo HTML5.
        </video>
        <div class="hero-content">
            <h1 class="hero-title">SIGNEST</h1>
            <p class="hero-subtitle">
                Signest accompagne les entreprises et collectivités dans tous leurs projets de communication visuelle,
                qu’il s’agisse de signalétique industrielle, intérieure ou urbaine, de vitrines, d’enseignes,
                de marquage routier ou de flocage de véhicules.
                Nous mettons notre savoir-faire et notre passion au service de solutions sur mesure, durables
                pour valoriser votre image.
            </p>
            <a href="{{ url('/apropos') }}" class="btn">Nous découvrir</a>
        </div>
    </section>

    <section class="carousel-container">
        <ul class='slider'>
            <li class='item orange' style="background-image: url('https://picsum.photos/id/12/800/600')">
                <div class='content'>
                    <img src="/icons/signalisation.png" alt="Signalétique" class="service-icon">
                    <h2 class='title'>Signalétique</h2>
                    <p class='description'>Nous concevons et installons des solutions de signalétique adaptées à tous types d’environnements.</p>
                    <a href="#" class="card-button">En savoir plus</a>
                </div>
            </li>
            <li class='item red' style="background-image: url('https://picsum.photos/id/1043/800/600')">
                <div class='content'>
                    <img src="/icons/truck.png" alt="Flocage véhicules" class="service-icon">
                    <h2 class='title'>Flocage véhicules</h2>
                    <p class='description'>Transformez vos véhicules en supports de communication efficaces.</p>
                    <a href="#" class="card-button">En savoir plus</a>
                </div>
            </li>
            <li class='item blue' style="background-image: url('https://picsum.photos/id/211/800/600')">
                <div class='content'>
                    <img src="/icons/vitrines.png" alt="Vitrines" class="service-icon">
                    <h2 class='title'>Vitrines</h2>
                    <p class='description'>Valorisez votre commerce avec des vitrines personnalisées et visibles.</p>
                    <a href="#" class="card-button">En savoir plus</a>
                </div>
            </li>
            <li class='item yellow' style="background-image: url('https://picsum.photos/id/219/800/600')">
                <div class='content'>
                    <img src="/icons/shop.png" alt="Enseignes" class="service-icon">
                    <h2 class='title'>Enseignes</h2>
                    <p class='description'>Création et pose d’enseignes pour sublimer vos façades commerciales.</p>
                    <a href="#" class="card-button">En savoir plus</a>
                </div>
            </li>
            <li class='item darkblue' style="background-image: url('https://picsum.photos/id/431/800/600')">
                <div class='content'>
                    <img src="/icons/PMR.png" alt="Accessibilité PMR" class="service-icon">
                    <h2 class='title'>Accessibilité PMR</h2>
                    <p class='description'>Signalétique conforme et claire pour personnes à mobilité réduite.</p>
                    <a href="#" class="card-button">En savoir plus</a>
                </div>
            </li>
            <li class='item green' style="background-image: url('https://picsum.photos/id/835/800/600')">
                <div class='content'>
                    <img src="/icons/route.png" alt="Marquage routier" class="service-icon">
                    <h2 class='title'>Marquage routier</h2>
                    <p class='description'>Marquage au sol pour organiser vos parkings et voies de circulation.</p>
                    <a href="#" class="card-button">En savoir plus</a>
                </div>
            </li>
        </ul>
        <nav class='nav'>
            <ion-icon class='btn prev' name="arrow-back-outline"></ion-icon>
            <ion-icon class='btn next' name="arrow-forward-outline"></ion-icon>
        </nav>
    </section>

    <section class="cta-banner">
        <div class="cta-content">
            <h2 class="cta-title">Un projet en tête ?</h2>
            <p class="cta-text">Discutons-en ensemble et obtenez votre devis personnalisé.</p>
            <a href="{{ url('/contact') }}" class="btn">Contactez-nous</a>
        </div>
    </section>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endsection

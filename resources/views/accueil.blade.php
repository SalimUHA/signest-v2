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
            <a href="{{ url('/contact') }}" class="btn">Contactez-nous !</a>
        </div>

    </section>

    <section class="transition-section services">

        <div class="feature-card orange">
            <img src="/icons/signalisation.png" alt="Signalétique" class="service-icon">
            <h3>Signalétique</h3>
            <p>Nous concevons et installons des solutions de signalétique adaptées à tous types d’environnements.</p>
            <a href="#" class="card-button">En savoir plus</a>
        </div>

        <div class="feature-card red">
            <img src="/icons/truck.png" alt="Flocage véhicules" class="service-icon">
            <h3>Flocage véhicules</h3>
            <p>Transformez vos véhicules en supports de communication efficaces.</p>
            <a href="#" class="card-button">En savoir plus</a>
        </div>

        <div class="feature-card blue">
            <img src="/icons/vitrines.png" alt="Vitrines" class="service-icon">
            <h3>Vitrines</h3>
            <p>Valorisez votre commerce avec des vitrines personnalisées et visibles.</p>
            <a href="#" class="card-button">En savoir plus</a>
        </div>

        <div class="feature-card yellow">
            <img src="/icons/shop.png" alt="Enseignes" class="service-icon">
            <h3>Enseignes</h3>
            <p>Création et pose d’enseignes pour sublimer vos façades commerciales.</p>
            <a href="#" class="card-button">En savoir plus</a>
        </div>

        <div class="feature-card darkblue">
            <img src="/icons/PMR.png" alt="Accessibilité PMR" class="service-icon">
            <h3>Accessibilité PMR</h3>
            <p>Signalétique conforme et claire pour personnes à mobilité réduite.</p>
            <a href="#" class="card-button">En savoir plus</a>
        </div>

        <div class="feature-card green">
            <img src="/icons/route.png" alt="Marquage routier" class="service-icon">
            <h3>Marquage routier</h3>
            <p>Marquage au sol pour organiser vos parkings et voies de circulation.</p>
            <a href="#" class="card-button">En savoir plus</a>
        </div>

    </section>


@endsection

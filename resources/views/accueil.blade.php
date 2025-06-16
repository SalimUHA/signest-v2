@extends('layouts.base')

@section('title', 'Accueil')

@section('content')
    <section class="hero">
        <div class="hero-content">
            <h1>SIGNEST</h1>
            <p>
                Signest accompagne les entreprises et collectivités dans leurs projets de communication visuelle.
                Signalétique, vitrines, marquage ou flocage, nous apportons des solutions durables et sur mesure.
            </p>
            <a href="{{ url('/contact') }}" class="btn">Contactez-nous !</a>
        </div>
    </section>

    <section class="transition-section services">
        <div class="feature-card orange">
            <img src="/icons/signalisation.png" alt="Signalisation" class="service-icon">
            <h3>Signalétique</h3>
            <p>Solutions adaptées à tous types d’environnements.</p>
        </div>
        <div class="feature-card red">
            <img src="/icons/truck.png" alt="Flocage véhicules" class="service-icon">
            <h3>Flocage véhicules</h3>
            <p>Vos véhicules deviennent votre meilleure publicité.</p>
        </div>
        <div class="feature-card blue">
            <img src="/icons/vitrines.png" alt="Vitrines" class="service-icon">
            <h3>Vitrines</h3>
            <p>Des vitrines attractives et personnalisées.</p>
        </div>
        <div class="feature-card yellow">
            <img src="/icons/shop.png" alt="Enseignes" class="service-icon">
            <h3>Enseignes</h3>
            <p>Pose sur façades pour sublimer vos bâtiments.</p>
        </div>
        <div class="feature-card darkblue">
            <img src="/icons/PMR.png" alt="PMR" class="service-icon">
            <h3>Accessibilité PMR</h3>
            <p>Signalétique claire et conforme pour tous.</p>
        </div>
        <div class="feature-card green">
            <img src="/icons/route.png" alt="Marquage routier" class="service-icon">
            <h3>Marquage routier</h3>
            <p>Organisation optimale de vos extérieurs.</p>
        </div>
    </section>
@endsection

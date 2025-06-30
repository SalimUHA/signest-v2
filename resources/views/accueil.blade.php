@extends('layouts.base')
@section('body_class', 'page-with-hero')
@section('title', 'Accueil')
@section('content')

    <section class="hero">
        <img src="{{ asset('images/facade-signest-2.jpeg') }}" alt="Arrière-plan d'un café" class="hero-background-image">
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
            @foreach ($carouselItems as $item)
                <li class='item {{ $item['color'] }}' style="background-image: url('{{ $item['image'] }}')">
                    <div class='content'>
                        <img src="{{ asset($item['icon']) }}" alt="{{ $item['title'] }}" class="service-icon">
                        <h2 class='title'>{{ $item['title'] }}</h2>
                        <p class='description'>{{ $item['description'] }}</p>
                        <a href="{{ url('/service/' . $item['slug']) }}" class="card-button">En savoir plus <span class="arrow-icon">→</span></a>
                    </div>
                </li>
            @endforeach
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

@endsection

@push('scripts')
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
@endpush

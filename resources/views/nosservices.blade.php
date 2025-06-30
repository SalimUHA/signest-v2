@extends('layouts.base')
@section('title', 'Nos Services')

@section('content')

    <section class="services-hero">
        <div class="services-hero-content">
            <h1 class="services-hero-title">Nos savoir-faire</h1>
            <p class="services-hero-subtitle">De la conception à la pose, nous maîtrisons chaque étape pour donner vie à votre communication visuelle.</p>
        </div>
    </section>

    <section class="highlight-section">
        <div class="highlight-container">
            <div class="highlight-image">
                <img src="{{ asset('images/plaque-dibond.jpg') }}" alt="Panneau Dibond sur mesure">
            </div>
            <div class="highlight-content">
                <h2 class="highlight-title">Notre spécialité : Le Dibond toutes dimensions</h2>
                <p>
                    Le panneau Dibond est notre cœur de métier. Rigide, léger et extrêmement durable, il est le support idéal pour une communication en intérieur comme en extérieur.
                    Nous réalisons l'impression et la découpe sur mesure pour tous vos besoins : enseignes, plaques professionnelles, décoration murale, signalétique de toutes sorte etc..
                </p>
                <a href="{{ url('/service/signaletique') }}" class="btn">Découvrir nos solutions Dibond</a>
            </div>
        </div>
    </section>

    @foreach ($services as $service)
        @if ($service['slug'] !== 'signaletique')
            <section class="highlight-section {{ $loop->even ? 'bg-light' : '' }}">
                <div class="highlight-container {{ $loop->even ? 'reverse' : '' }}">
                    <div class="highlight-image">
                        <img src="{{ asset($service['image']) }}" alt="{{ $service['title'] }}">
                    </div>
                    <div class="highlight-content">
                        <h2 class="highlight-title">{{ $service['title'] }}</h2>
                        <p>
                            {{ $service['description'] }}
                        </p>
                        <a href="{{ url('/service/' . $service['slug']) }}" class="btn">En savoir plus sur ce service</a>
                    </div>
                </div>
            </section>
        @endif
    @endforeach

    <section class="cta-banner">
        <div class="cta-content">
            <h2 class="cta-title">Un projet en tête ?</h2>
            <p class="cta-text">Discutons-en ensemble et obtenez votre devis personnalisé.</p>
            <a href="{{ url('/contact') }}" class="btn">Contactez-nous</a>
        </div>
    </section>

@endsection

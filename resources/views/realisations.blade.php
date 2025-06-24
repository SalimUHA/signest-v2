@extends('layouts.base')
@section('body_class', 'page-with-hero')
@section('title', 'Nos Réalisations et Savoir-Faire')


@section('content')

    <section class="hero-realisations">
        <div class="hero-realisations-content">
            <h1 class="hero-realisations-title">Nos Savoir-Faire & Réalisations</h1>
        </div>
    </section>

    <div class="page-realisations-container">

        <div class="bloc-section">
            <h2 class="section-title-realisations animate-on-scroll slide-up">Nos Expertises</h2>
            <p class="sous-titre-section animate-on-scroll slide-up">Des compétences uniques pour des projets qui le sont tout autant.</p>
        </div>
        <section class="expertises-grid">
            @foreach($expertises as $expertise)
                <div class="expertise-card {{ $expertise['slug'] }} animate-on-scroll {{ $loop->even ? 'slide-in-right' : 'slide-in-left' }}"
                     style="transition-delay: {{ $loop->iteration * 100 }}ms">
                    <div class="expertise-header">
                        <i class="{{ $expertise['icon'] }}"></i>
                        <h3>{{ $expertise['title'] }}</h3>
                    </div>
                    <p>{{ $expertise['description'] }}</p>
                    @if(!empty($expertise['example_images']))
                        <div class="expertise-images">
                            @foreach($expertise['example_images'] as $image)
                                <img src="{{ asset($image) }}" alt="Exemple pour {{ $expertise['title'] }}">
                            @endforeach
                        </div>
                    @endif
                </div>
            @endforeach
        </section>

        <section class="gallery-section" id="galerie">
            <div class="bloc-section">
                <h2 class="section-title-realisations animate-on-scroll slide-up">Notre Galerie de Projets</h2>
            </div>
            <div class="gallery-grid">
                @forelse($projets as $projet)
                    <div class="gallery-item animate-on-scroll slide-up" style="transition-delay: {{ ($loop->index % 9) * 50 }}ms">

                        <a href="{{ asset($projet['image']) }}" data-fancybox="gallery" data-caption="{{ $projet['title'] }}">
                            <img src="{{ asset($projet['image']) }}" alt="{{ $projet['title'] }}">
                        </a>
                        <div class="gallery-item-content">
                            <h4>{{ $projet['title'] }}</h4>
                        </div>
                    </div>
                @empty
                    <p style="text-align: center;">Aucune réalisation à afficher pour le moment.</p>
                @endforelse
            </div>
            <div class="pagination-container">
                {{ $projets->links() }}
            </div>
        </section>

    </div>

@endsection

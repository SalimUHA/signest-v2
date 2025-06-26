@extends('layouts.base')
@section('body_class', 'page-with-hero')
@section('title', 'À propos')

@section('content')
    <section class="hero-apropos" style="background-image: url('{{ asset('images/atelier-signest.jpeg') }}');">
        <div class="hero-apropos-content">
            <h1 class="hero-apropos-title">Votre expert en signalétique depuis 2007</h1>
            <p class="hero-apropos-subtitle">Découvrez l'équipe et les valeurs qui animent Signest depuis plus de 15 ans</p>
        </div>
    </section>

    <section class="section-a-propos">
        <div class="bloc-section histoire">
            <div class="contenu-texte animate-on-scroll" style="transition-delay: 100ms;">
                <h2 class="titre-section">Notre histoire</h2>
                <p class="texte-section">
                    Fondée en 2007 à Saint-Louis dans le Haut-Rhin , <strong>Signest</strong> est une entreprise spécialisée dans la signalétique.
                    Depuis plus de 15 ans, nous accompagnons nos clients dans la <strong>création de vitrines et d’enseignes</strong>,
                    l’<strong>amélioration de l’accessibilité PMR</strong>, le <strong>marquage routier</strong>, le <strong>flocage de véhicules professionnels</strong>,
                    ainsi que la conception et la pose de <strong>panneaux dibond de toutes dimensions</strong>.
                    <br><br>
                    Aujourd’hui, notre équipe continue d’innover pour proposer des solutions visuelles impactantes, durables et adaptées aux enjeux de chaque client.
                </p>
            </div>
            <div class="contenu-image animate-on-scroll" style="transition-delay: 100ms;">
                <img src="{{ asset('images/interieur-signest.jpeg') }}" alt="Interieur Signest">
            </div>
        </div>

        <div class="bloc-section valeurs">
            <h2 class="titre-section center animate-on-scroll">Nos valeurs</h2>
            <div class="valeurs-timeline">
                @foreach($valeurs as $valeur)
                    <div class="timeline-item animate-on-scroll" style="transition-delay: {{ $loop->index * 150 }}ms;">
                        <div class="timeline-icon" style="--valeur-color: {{ $valeur['color'] }};">
                            <img src="{{ asset($valeur['image']) }}" alt="{{ $valeur['titre'] }}">
                        </div>
                        <h3 class="timeline-title" style="color: {{ $valeur['color'] }};">{{ $valeur['titre'] }}</h3>
                        <p class="timeline-text">{{ $valeur['texte'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bloc-section equipe">
            <h2 class="titre-section center animate-on-scroll">Notre équipe</h2>
            <p class="sous-titre-section animate-on-scroll" style="transition-delay: 100ms;">Passez la souris sur un membre de l'équipe</p>
            <div class="equipe-container">
                @foreach($equipe as $membre)
                    <div class="img-wrap animate-on-scroll"
                         style="transition-delay: {{ $loop->index * 100 }}ms; animation-delay: {{ ($loop->index % 5) * 0.8 }}s"
                         data-nom="{{ $membre['nom'] }}"
                         data-poste="{{ $membre['poste'] }}">
                        <img src="{{ $membre['avatar'] }}" alt="{{ $membre['nom'] }}">
                        <div class="membre-info">
                            <h3>{{ $membre['nom'] }}</h3>
                            <span>{{ $membre['poste'] }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bloc-section clients">
            <h2 class="titre-section center animate-on-scroll">Ils nous font confiance</h2>
            <div class="logos-scroller">
                <div class="logos-scroller-inner">
                    @foreach($clients as $logo)
                        <img src="{{ asset('icons/' . $logo) }}" alt="Logo client">
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

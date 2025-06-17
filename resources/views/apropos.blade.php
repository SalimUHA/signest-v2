@extends('layouts.base')
@section('body_class', 'page-with-hero')
@section('title', 'Apropos')

@section('content')
    <section class="hero-apropos" style="background-image: url('{{ asset('images/atelier-signest.jpeg') }}');">
        <div class="hero-apropos-content">
            <h1 class="hero-apropos-title">Votre expert en signalétique depuis 2007.</h1>
            <p class="hero-apropos-subtitle">Découvrez l'équipe et les valeurs qui animent Signest depuis plus de 15 ans.</p>
        </div>
    </section>
    <section class="section-a-propos">

        <div class="bloc-section histoire fade-in zoom-in">
            <div class="contenu-texte">
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
            <div class="contenu-image">
                <img src="{{ asset('images/interieur-signest.jpeg') }}" alt="Atelier Signest">
            </div>
        </div>

        @php
            $exemples = [
                ['image' => 'icons/particulier.png','titre'=>"Particuliers & Résidences privées", 'couleur' => '#4CBAD8'],
                ['image' => 'icons/collectivite.png','titre'=>'Collectivités', 'couleur' => '#68A855'],
                ['image' => 'icons/boutique.png','titre'=>'Commerces & boutiques', 'couleur' => '#85B9AD'],
            ];
        @endphp
        <div class="bloc-section ce-que-nous-faisons fade-in zoom-in">
            <h2 class="titre-section center">Nos domaines d’intervention</h2>
            <div class="liste-services">
                @foreach($exemples as $exemple)
                    <div class="carte-service zoom-in">
                        <div class="trait-couleur" style="background-color: {{ $exemple['couleur'] }}"></div>
                        <img src="{{ asset($exemple['image']) }}" alt="Signalétique">
                        <p class="texte-section"><strong>{{ $exemple['titre'] }}</strong></p>
                    </div>
                @endforeach
            </div>
            <div class="cta-wrapper">
                <a href="/realisations" class="bouton-cta emphasized">Voir nos réalisations</a>
            </div>
        </div>

        @php
            $valeurs = [
                ['image' => 'icons/ecoresp.png','titre'=>'Éco-responsabilité','texte'=>'Nous nous engageons à minimiser notre impact environnemental en privilégiant des matériaux durables et des pratiques responsables à chaque étape de nos projets.'],
                ['image' => 'icons/recyclage.png','titre'=>'Recyclage','texte'=>'Chez Signest, le recyclage fait partie intégrante de notre démarche. Nous réutilisons et valorisons les matériaux pour limiter le gaspillage.'],
                ['image' => 'icons/main.png','titre'=>'Confiance','texte'=>'La confiance est le fondement de toutes nos collaborations. Nous veillons à instaurer un climat de sérénité, basé sur l’écoute, la réactivité et la fiabilité.'],
                ['image' => 'icons/savoirfaire.png','titre'=>'Savoir-Faire','texte'=>'Forts de notre expertise, nous allions maîtrise technique et sens du détail pour livrer des prestations de qualité, sur mesure et durables.'],
            ];
        @endphp
        <div class="bloc-section valeurs">
            <h2 class="titre-section center">Nos valeurs</h2>
            <div class="valeurs-zigzag">
                @foreach($valeurs as $valeur)
                    <div class="valeur-item fade-in @if($loop->odd) right-image @endif">
                        <div class="valeur-image">
                            <img src="{{ asset($valeur['image']) }}" alt="{{ $valeur['titre'] }}">
                        </div>
                        <div class="valeur-texte">
                            <h3>{{ $valeur['titre'] }}</h3>
                            <p>{{ $valeur['texte'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="bloc-section materiaux fade-in zoom-in">
            <h2 class="titre-section center">[texte]</h2>
            <div class="grille-materiaux">
                <div class="materiau-item zoom-in">
                    <div class="carte-materiau">
                        <img src="{{ asset('images/mat1.jpg') }}" alt="M">
                        <p class="description-materiau">[texte]</p>
                    </div>
                </div>
                <div class="materiau-item zoom-in">
                    <div class="carte-materiau">
                        <img src="{{ asset('images/mat2.jpg') }}" alt="M">
                        <p class="description-materiau">[texte]</p>
                    </div>
                </div>
                <div class="materiau-item zoom-in">
                    <div class="carte-materiau">
                        <img src="{{ asset('images/mat3.jpg') }}" alt="M">
                        <p class="description-materiau">[texte]</p>
                    </div>
                </div>
            </div>
        </div>

        @php
            $clients = [
                ['image' => 'icons/creditmutuel.png'],
                ['image' => 'icons/stlouisagglo.png'],
                ['image' => 'icons/veolia.png'],
                ['image' => 'icons/capisecurite.png'],
                ['image' => 'icons/LK.png'],
                ['image' => 'icons/primeoenergie.png'],
                ['image' => 'icons/scatp.png'],
                ['image' => 'icons/stlouis.png'],
                ['image' => 'icons/huningue.png'],
                ['image' => 'icons/blotzheim.png'],
                ['image' => 'icons/Leclerc.png'],
                ['image' => 'icons/distribus.png'],
                ['image' => 'icons/groupe-atlantic.png'],

            ];
        @endphp
        <div class="bloc-section clients fade-in zoom-in">
            <h2 class="titre-section center">Ils nous font confiance</h2>
            <div class="grille-clients">
                @foreach($clients as $client)
                    <img src="{{ asset($client['image']) }}" alt="Clients">
                @endforeach
            </div>
        </div>
        </div>
    </section>
@endsection

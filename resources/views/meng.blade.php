@extends('layouts.base')
@section('body_class', 'page-with-hero')
@section('title', 'Notre Partenaire Qualité - MENG')

@section('content')

    <main class="meng-page">

        <section class="meng-hero">
            <div class="hero-content-container">
                <img src="{{ asset('images/banner-meng.png') }}" alt="Logo MENG - Richtung weisend" class="meng-banner">
                <h1>La Qualité Allemande au Service de Votre Image</h1>
                <p>
                    En tant qu'importateur exclusif en France de la marque <strong>MENG</strong>, SIGNEST s'engage à fournir des solutions de signalétique d'une durabilité et d'une finition inégalées.
                </p>
            </div>

            <div class="animated-background">
                <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </section>

        <section class="meng-benefits">
            <div class="benefits-container">
                <div class="benefit-item">
                    <i class="fas fa-shield-alt"></i>
                    <div>
                        <h3>Qualité & Durabilité</h3>
                    </div>
                </div>
                <div class="benefit-item">
                    <i class="fas fa-ruler-combined"></i>
                    <div>
                        <h3>Design & Précision</h3>
                    </div>
                </div>
                <div class="benefit-item">
                    <i class="fas fa-crown"></i>
                    <div>
                        <h3>Partenaire Exclusif</h3>
                    </div>
                </div>
            </div>
        </section>

        <section class="meng-products">
            <h2>Ce que nous pouvons réaliser avec les produits MENG</h2>
            <div class="product-gallery">
                <div class="product-item">
                    <div class="product-image-placeholder" style="background-image: url('{{ asset('images/meng-1.jpg') }}');"></div>
                    <h3>Signalétique Murale et Directionnelle</h3>
                </div>
                <div class="product-item">
                    <div class="product-image-placeholder" style="background-image: url('{{ asset('images/meng-2.jpg') }}');"></div>
                    <h3>Plaques de Porte et Panneaux d'Information</h3>
                </div>
                <div class="product-item">
                    <div class="product-image-placeholder" style="background-image: url('{{ asset('images/meng-3.jpg') }}');"></div>
                    <h3>Totem</h3>
                </div>
                <div class="product-item">
                    <div class="product-image-placeholder" style="background-image: url('{{ asset('images/meng-4.jpg') }}');"></div>
                    <h3>Signalétique Aérienne et Suspendue</h3>
                </div>
                <div class="product-item">
                    <div class="product-image-placeholder" style="background-image: url('{{ asset('images/meng-5.jpg') }}');"></div>
                    <h3>Panneaux drapeau</h3>
                </div>
                <div class="product-item">
                    <div class="product-image-placeholder" style="background-image: url('{{ asset('images/meng-6.jpg') }}');"></div>
                    <h3>Affichage de Sécurité et Plans d'Évacuation</h3>
                </div>
            </div>
        </section>

        <section class="meng-client-trust">
            <div class="trust-container">
                <div class="client-logo-container">
                    <img src="{{ asset('icons/logo-hopitalcolmar.jpeg') }}" alt="Logo de l'Hôpital de Colmar" class="client-logo">
                </div>
                <div class="trust-content">
                    <p class="trust-eyebrow">Ils nous font confiance</p>
                    <blockquote>
                        "L'Hôpital de Colmar, un établissement de référence, a choisi MENG pour pouvoir faire leur signalétique."
                    </blockquote>
                    <p class="trust-attribution">- Hôpitaux Civils de Colmar</p>
                </div>
            </div>
        </section>

        <section class="meng-cta">
            <div class="cta-content-container">
                <h2>Un Projet ? Une Question ?</h2>
                <p>Parlons de votre projet. Nous trouverons ensemble la meilleure solution.</p>
                <a href="{{ url('/contact') }}" class="btn">Contactez-nous</a>
            </div>
            <div class="animated-background">
                <ul class="circles">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
            </div>
        </section>

    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const items = document.querySelectorAll('.product-item');

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, {
                threshold: 0.1
            });

            items.forEach(item => {
                observer.observe(item);
            });
        });
    </script>

@endsection

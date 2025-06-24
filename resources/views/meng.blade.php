@extends('layouts.base')
@section('body_class', 'page-with-hero')
@section('title', 'Notre Partenaire Qualité - MENG')

@section('content')

    <main class="meng-page">

        <section class="meng-hero">
            <div class="meng-hero-content">
                <h1>Notre Engagement : La Qualité Avant Tout</h1>
                <p>
                    Chez SIGNEST, la qualité est notre priorité. C'est pourquoi nous sommes devenus l'importateur exclusif en France de la marque allemande <strong>MENG</strong>, reconnue pour ses produits durables et leur finition soignée.
                </p>
                <p>
                    Ce choix nous permet de réaliser des installations qui durent dans le temps et de gagner la confiance de clients exigeants, comme l'<strong>Hôpital de Colmar</strong>.
                </p>
            </div>
        </section>

        <section class="meng-products">
            <h2>Nos réalisations avec les produits MENG</h2>
            <div class="product-gallery">
                <div class="product-item">
                    <div class="product-image-placeholder" style="background-image: url('{{ asset('images/meng-1.jpg') }}');"></div>
                    <h3>Test</h3>
                </div>
                <div class="product-item">
                    <div class="product-image-placeholder" style="background-image: url('{{ asset('images/meng-2.jpg') }}');"></div>
                    <h3>Test</h3>
                </div>
                <div class="product-item">
                    <div class="product-image-placeholder" style="background-image: url('{{ asset('images/meng-3.jpg') }}');"></div>
                    <h3>Test</h3>
                </div>
                <div class="product-item">
                    <div class="product-image-placeholder" style="background-image: url('{{ asset('images/meng-4.jpg') }}');"></div>
                    <h3>Test</h3>
                </div>
                <div class="product-item">
                    <div class="product-image-placeholder" style="background-image: url('{{ asset('images/meng-5.jpg') }}');"></div>
                    <h3>Test</h3>
                </div>
                <div class="product-item">
                    <div class="product-image-placeholder" style="background-image: url('{{ asset('images/meng-6.jpg') }}');"></div>
                    <h3>Test</h3>
                </div>
            </div>
        </section>

        <section class="meng-cta">
            <h2>Un Projet ? Une Question ?</h2>
            <p>Parlons de votre projet. Nous trouverons ensemble la meilleure solution.</p>
            <a href="{{ url('/contact') }}" class="btn">Contactez-nous</a>
        </section>

    </main>

@endsection

@extends('layouts.base')
@section('title', 'Contactez-nous')
@section('body_class', 'page-with-hero')

@section('content')
    <section class="hero-contact">
        <div class="hero-contact-content">
            <h1 class="hero-contact-title">Un projet ? Une question ?</h1>
            <p class="hero-contact-subtitle">Nous sommes à votre écoute.</p>
        </div>
    </section>

    <div class="page-contact-container">

        <div class="contact-info-grid">
            <div class="info-card animate-on-scroll" style="transition-delay: 100ms;">
                <i class="fa-solid fa-map-location-dot"></i>
                <h3>Notre Adresse</h3>
                <p>5 rue de Séville<br>68300 Saint-Louis</p>
            </div>
            <div class="info-card animate-on-scroll" style="transition-delay: 250ms;">
                <i class="fa-solid fa-phone"></i>
                <h3>Par Téléphone</h3>
                <p><a href="tel:0389705424">03 89 70 54 24</a></p>
            </div>
            <div class="info-card animate-on-scroll" style="transition-delay: 400ms;">
                <i class="fa-solid fa-envelope"></i>
                <h3>Par Email</h3>
                <p><a href="mailto:pc@signest68.com">pc@signest68.com</a></p>
            </div>
        </div>

        <div class="form-map-container animate-on-scroll">
            <div class="bloc-formulaire">
                <h2>Envoyez-nous un message</h2>

                @if(session('success'))
                    <div style="background:#d4edda;color:#155724;padding:15px;border-radius:8px;margin-bottom:20px;">
                        {{ session('success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div style="background:#f8d7da;color:#721c24;padding:15px;border-radius:8px;margin-bottom:20px;">
                        <ul style="margin:0; padding-left: 20px;">@foreach($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
                    </div>
                @endif

                <form action="{{ route('contact.send') }}" method="POST">
                    @csrf

                    <div class="form-row">
                        <div class="form-group">
                            <label for="prenom">Prénom *</label>
                            <input type="text" id="prenom" name="prenom" value="{{ old('prenom') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nom">Nom *</label>
                            <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email *</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="telephone">Téléphone</label>
                        <input type="tel" id="telephone" name="telephone" value="{{ old('telephone') }}">
                    </div>
                    <div class="form-group">
                        <label for="message">Votre message *</label>
                        <textarea id="message" name="message" required>{{ old('message') }}</textarea>
                    </div>
                    <button type="submit" class="submit-button">Envoyer le message</button>
                </form>
            </div>
            <div class="bloc-map">
                <h2>Où nous trouver ?</h2>
                <div class="map-responsive">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2693.309034988789!2d7.552975315628231!3d47.5422859791799!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4791b9511553f61b%3A0x5380758c63b61172!2s5%20Rue%20de%20S%C3%A9ville%2C%2068300%20Saint-Louis!5e0!3m2!1sfr!2sfr!4v1655470000000!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
    </div>
@endsection

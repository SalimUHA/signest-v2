@extends('layouts.base')
@section('body_class', 'page-with-hero')
@section('title', $service['title'])

@section('content')

    <section class="hero-service" style="background-image: url('{{ $service['image'] }}');">
        <div class="hero-service-content">
            <h1 class="hero-service-title">{{ $service['title'] }}</h1>
        </div>
    </section>

    <section class="service-intro-section">
        <div class="service-intro-grid">
            <div class="service-description">
                @foreach($service['description'] as $index => $block)
                    @if($block['type'] === 'paragraph')
                        <p class="animate-on-scroll" style="transition-delay: {{ $index * 100 }}ms;">{{ $block['content'] }}</p>
                    @elseif($block['type'] === 'heading')
                        <h4 class="animate-on-scroll" style="transition-delay: {{ $index * 100 }}ms;">{{ $block['content'] }}</h4>
                    @elseif($block['type'] === 'list')
                        <ul class="service-description-list">
                            @foreach($block['items'] as $itemIndex => $item)
                                <li class="animate-on-scroll" style="transition-delay: {{ ($index * 100) + ($itemIndex * 50) }}ms;">
                                    <p><strong>{{ $item['title'] }}:</strong> {{ $item['description'] }}</p>
                                </li>
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </div>

            @if(!empty($service['key_benefits']))
                <div class="service-benefits animate-on-scroll" style="transition-delay: 200ms;">
                    <h3>Points Clés</h3>
                    <ul>
                        @foreach($service['key_benefits'] as $benefit)
                            <li><i class="fa-solid fa-check"></i> {{ $benefit }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </section>

    @if(!empty($service['portfolio_examples']))
        <section class="service-final-cta">
            <div class="animate-on-scroll">
                <h2>Découvrez quelques exemples de nos réalisations</h2>
            </div>
        </section>

        <section id="realisations" class="service-portfolio-section">
            <div class="portfolio-container">
                @foreach($service['portfolio_examples'] as $example)
                    <div class="portfolio-card {{ $loop->even ? 'reverse' : '' }} animate-on-scroll">
                        <div class="portfolio-image">
                            <img src="{{ $example['image'] }}" alt="Réalisation : {{ $example['title'] }}">
                        </div>
                        <div class="portfolio-content">
                            <h3>{{ $example['title'] }}</h3>
                            <p>{{ $example['description'] }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="service-final-cta">
            <div class="animate-on-scroll">
                <h2>Voulez vous en voir d'avantages ? </h2>
                <p>Découvrez toutes nos réalisations concernant ce service</p>
                <a href="/realisations" class="btn">Voir nos réalisations</a>
            </div>
        </section>
    @endif

@endsection

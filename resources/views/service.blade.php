@extends('layouts.base')
@section('body_class', 'page-with-hero')
@section('title', $service->title)

@section('content')

    <section class="hero-service" style="background-image: url('{{ asset($service->image) }}');">
        <div class="hero-service-content">
            <h1 class="hero-service-title">{{ $service->title }}</h1>
        </div>
    </section>

    <section class="service-intro-section">
        <div class="service-intro-grid">

            <div class="service-description">
                {{-- La boucle qui lit et affiche la structure complexe --}}
                @if(isset($service->page_content['description']))
                    @foreach($service->page_content['description'] as $item)
                        @if($item['type'] === 'paragraph')
                            <p>{!! $item['content'] !!}</p>
                        @elseif($item['type'] === 'heading')
                            {{-- On utilise h4 comme dans ton CSS --}}
                            <h4>{{ $item['content'] }}</h4>
                        @elseif($item['type'] === 'list')
                            {{-- On utilise la classe .service-description-list de ton CSS --}}
                            <ul class="service-description-list">
                                @foreach($item['items'] as $listItem)
                                    <li>
                                        <p><strong>{{ $listItem['title'] }}</strong>: {{ $listItem['description'] }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    @endforeach
                @endif
            </div>

            <div class="service-benefits animate-on-scroll">
                @if(isset($service->page_content['key_benefits']) && count($service->page_content['key_benefits']) > 0)
                    <h3>Points Clés</h3>
                    <ul>
                        @foreach($service->page_content['key_benefits'] as $benefit)
                            <li><i class="fa-solid fa-check"></i> {{ $benefit }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </section>

    @if(isset($service->page_content['portfolio_examples']) && count($service->page_content['portfolio_examples']) > 0)
        <section class="service-final-cta">
            <div class="animate-on-scroll"><h2>Découvrez quelques exemples</h2></div>
        </section>

        <section id="realisations" class="service-portfolio-section">
            <div class="portfolio-container">
                @foreach($service->page_content['portfolio_examples'] as $example)
                    <div class="portfolio-card {{ $loop->even ? 'reverse' : '' }} animate-on-scroll">
                        <div class="portfolio-image"><img src="{{ asset($example['image']) }}" alt="{{ $example['title'] }}"></div>
                        <div class="portfolio-content"><h3>{{ $example['title'] }}</h3><p>{{ $example['description'] }}</p></div>
                    </div>
                @endforeach
            </div>
        </section>
    @endif

@endsection

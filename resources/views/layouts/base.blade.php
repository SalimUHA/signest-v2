<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Signest')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Urbanist:wght@400;600&display=swap" rel="stylesheet">

    <!-- Feuilles de styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/accueil.css') }}">
</head>
<body>
@include('components.header')

<main>
    @yield('content')
</main>

@include('components.footer')
<script src="{{ asset('js/accueil.js') }}" defer></script>
<script src="{{ asset('js/header.js') }}" defer></script>
</body>
</html>

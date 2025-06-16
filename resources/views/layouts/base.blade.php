<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Signest')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Feuilles de styles -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
</head>
<body>
{{-- HEADER en haut de page --}}
@include('components.header')

{{-- Contenu de la page --}}
<main>
    @yield('content')
</main>

{{-- FOOTER en bas de page --}}
@include('components.footer')
</body>
</html>

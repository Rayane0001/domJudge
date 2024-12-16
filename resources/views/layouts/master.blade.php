<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Compétitions de Programmation')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<div id="app">
    <x-header />
    <main>
        @yield('content')
    </main>
    <x-footer />
</div>
</body>
</html>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Mon site')</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>
<body>
<header>
    <!-- Header -->
    @include('components.header')
</header>

<main>
    @yield('content')
</main>

<footer>
    <!-- Footer -->
    @include('components.footer')
</footer>
</body>
</html>

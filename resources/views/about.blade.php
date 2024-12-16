@extends('layouts.layout')

@section('content')
    <div class="banner bg-primary text-white text-center py-5 mb-4 rounded ">
        <!-- Titre de la page -->
        <h2 class="display-4 mb-4">À propos</h2>

        <!-- Description -->
        <p class="lead">{{ $aboutText ?? 'Bienvenue sur notre site de juges automatiques pour les compétitions de programmation. Notre mission est de simplifier et automatiser les évaluations de code.' }}</p>
    </div>
@endsection

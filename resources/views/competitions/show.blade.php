@extends('layout')

@section('title', 'Compétition : ' . $competition->name)

@section('content')
    <div class="container py-5">
        <!-- Titre de la compétition -->
        <h1 class="display-4 mb-4">{{ $competition->name }}</h1>

        <!-- Description de la compétition -->
        <p class="lead mb-4">{{ $competition->description }}</p>

        <!-- Liste des challenges -->
        <h2 class="mb-3">Challenges</h2>
        <ul class="list-group mb-4">
            @foreach ($competition->challenges as $challenge)
                <li class="list-group-item">
                    <a href="{{ route('competitions.challenges.show', [$competition->id, $challenge->id]) }}" class="text-decoration-none text-dark">
                        {{ $challenge->name }}
                    </a>
                </li>
            @endforeach
        </ul>

        <!-- Lien vers le classement -->
        <h2><a href="{{ route('competitions.ranking', $competition->id) }}" class="btn btn-link">Voir le classement</a></h2>
    </div>
@endsection

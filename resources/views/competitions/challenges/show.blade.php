@extends('layout')

@section('title', 'Challenge : ' . $challenge->name)

@section('content')
    <div class="container py-5">
        <!-- Titre du Challenge -->
        <h1 class="display-4 mb-4">{{ $challenge->name }}</h1>

        <!-- Description du Challenge -->
        <p class="lead mb-4">{{ $challenge->description }}</p>

        <!-- Formulaire de soumission de réponse -->
        <form action="{{ route('competitions.challenges.submit', [$competition->id, $challenge->id]) }}" method="POST" class="bg-light p-4 rounded shadow-sm">
            @csrf
            <div class="mb-3">
                <label for="answer" class="form-label">Réponse :</label>
                <textarea name="answer" id="answer" class="form-control" rows="6" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>
    </div>
@endsection

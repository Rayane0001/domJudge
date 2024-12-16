@extends('layout')

@section('title', 'Challenge : ' . $challenge->name)

@section('content')
    <h1>{{ $challenge->name }}</h1>
    <p>{{ $challenge->description }}</p>

    <form action="{{ route('competitions.challenges.submit', [$competition->id, $challenge->id]) }}" method="POST">
        @csrf
        <label for="answer">Réponse :</label>
        <textarea name="answer" id="answer" required></textarea><br>
        <button type="submit">Soumettre</button>
    </form>
@endsection

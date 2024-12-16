@extends('layouts.layout')

@section('title', $competition->name)

@section('content')
    <x-banner title="{{ $competition->name }}" subtitle="Détails de la compétition" />

    <p>{{ $competition->description }}</p>
    <p><strong>Débute le :</strong> {{ $competition->start_date }}</p>
    <p><strong>Termine le :</strong> {{ $competition->end_date }}</p>

    <h3>Liste des Challenges</h3>
    <ul>
        @forelse ($competition->challenges as $challenge)
            <li>
                <a href="{{ route('competitions.challenges.show', [$competition->id, $challenge->id]) }}">{{ $challenge->title }} ({{ $challenge->letter }})</a>
                <p>{{ $challenge->description }}</p>
            </li>
        @empty
            <p>Aucun challenge disponible pour cette compétition.</p>
        @endforelse
    </ul>
@endsection

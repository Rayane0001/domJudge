@extends('layouts.layout')

@section('title', 'Accueil')

@section('content')
    <x-banner title="Bienvenue" subtitle="Liste des compétitions de programmation" />

    <ul>
        @forelse ($competitions as $competition)
            <li>
                <a href="{{ route('competitions.show', $competition->id) }}">{{ $competition->name }}</a> <!-- Lien vers les détails -->
                <p>{{ $competition->description }}</p>
                <small>
                    Débute le : {{ $competition->start_date }} | Termine le : {{ $competition->end_date }}
                </small>
            </li>
        @empty
            <li>Aucune compétition pour le moment.</li>
        @endforelse
    </ul>
@endsection

@extends('layouts.layout')

@section('title', 'Accueil')

@section('content')
    <x-banner title="Bienvenue" subtitle="Liste des compétitions de programmation" />
    <ul>
        @foreach ($competitions as $competition)
            <li>{{ $competition }}</li>
        @endforeach
    </ul>
@endsection

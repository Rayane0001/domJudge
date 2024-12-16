@extends('layout')

@section('title', 'Compétitions')

@section('content')
    <div class="container py-5">
        <!-- Titre de la page -->
        <h1 class="display-4 mb-4">Liste des compétitions</h1>

        <!-- Liste des compétitions -->
        <ul class="list-group">
            @foreach ($competitions as $competition)
                <li class="list-group-item">
                    <a href="{{ route('competitions.show', $competition->id) }}" class="text-decoration-none text-dark">
                        {{ $competition->name }}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection

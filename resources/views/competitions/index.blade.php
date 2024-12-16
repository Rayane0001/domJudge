@extends('layout')

@section('title', 'Compétitions')

@section('content')
    <h1>Liste des compétitions</h1>
    <ul>
        @foreach ($competitions as $competition)
            <li>
                <a href="{{ route('competitions.show', $competition->id) }}">{{ $competition->name }}</a>
            </li>
        @endforeach
    </ul>
@endsection

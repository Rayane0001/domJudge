@extends('layouts.layout')

@section('title', $competition->name)

@section('content')
    <h1>{{ $competition->name }}</h1>
    <p><strong>Description :</strong> {{ $competition->description }}</p>
    <p><strong>Date de début :</strong> {{ $competition->start_date }}</p>
    <p><strong>Date de fin :</strong> {{ $competition->end_date }}</p>
    <a href="{{ route('competitions.index') }}">Retour à la liste des compétitions</a>
@endsection

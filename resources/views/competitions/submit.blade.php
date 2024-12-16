@extends('layouts.layout')

@section('title', 'Soumettre une solution')

@section('content')
    <h1>Soumettre une solution pour {{ $competition->name }}</h1>
    <form action="{{ route('competitions.submit', $competition->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="file">Fichier :</label>
        <input type="file" name="file" id="file" required>
        <button type="submit">Soumettre</button>
    </form>
@endsection

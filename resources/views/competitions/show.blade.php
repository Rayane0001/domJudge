@extends('layouts.layout')

@section('title', $competition->name)

@section('content')
    <h1>{{ $competition->name }}</h1>
    <p>{{ $competition->description }}</p>
    <p>
        <strong>Début :</strong> {{ $competition->start_date }} <br>
        <strong>Fin :</strong> {{ $competition->end_date }}
    </p>

    <h2>Classement</h2>
    <table>
        <thead>
        <tr>
            <th>Position</th>
            <th>Nom de l'équipe</th>
            <th>Score</th>
        </tr>
        </thead>
        <tbody>
        {{-- Ajoute ici les lignes du classement --}}
        <tr>
            <td>1</td>
            <td>Équipe 1</td>
            <td>100 pts</td>
        </tr>
        </tbody>
    </table>

    <h2>Soumettre une solution</h2>
    <form method="POST" action="{{ route('submission.store', $competition->id) }}" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="file">Fichier :</label>
            <input type="file" name="file" id="file" required>
        </div>
        <button type="submit">Envoyer</button>
    </form>
@endsection

@extends('layout')

@section('title', 'Classement de la compétition : ' . $competition->name)

@section('content')
    <h1>Classement de la compétition : {{ $competition->name }}</h1>

    <table>
        <thead>
        <tr>
            <th>Équipe</th>
            @foreach($competition->challenges as $challenge)
                <th>{{ $challenge->name }}</th>
            @endforeach
            <th>Score</th>
            <th>Temps total</th>
        </tr>
        </thead>
        <tbody>
        @foreach($teams as $team)
            <tr>
                <td>{{ $team['team'] }}</td>
                @foreach($competition->challenges as $challenge)
                    <td>
                        @isset($team['submissions'][$challenge->id])
                            {{ $team['submissions'][$challenge->id]->status == 'success' ? 'Réussi' : 'Échoué' }}
                        @else
                            N/A
                        @endisset
                    </td>
                @endforeach
                <td>{{ $team['score'] }}</td>
                <td>{{ $team['time'] }} secondes</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection

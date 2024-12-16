@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Leaderboard</h1>
        <table class="table">
            <thead>
            <tr>
                <th>Position</th>
                <th>Nom de l'équipe</th>
                <th>Université</th>
                <th>Score total</th>
                <th>Temps total (s)</th>
                <th>Pénalité totale (min)</th>
                @foreach ($teams->first()->submissions->pluck('challenge.letter')->unique() as $challenge)
                    <th>Points {{ $challenge }}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach ($teams as $index => $team)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $team->name }}</td>
                    <td>{{ $team->university }}</td>
                    <td>{{ $team->total_score }}</td>
                    <td>{{ $team->total_time }}</td>
                    <td>{{ $team->total_penalty }}</td>
                    @foreach ($team->submissions->groupBy('challenge.letter') as $letter => $submissions)
                        <td>
                            {{ $submissions->where('is_correct', true)->sum(fn($s) => $s->challenge->points) }}
                        </td>
                    @endforeach
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

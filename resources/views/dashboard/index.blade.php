@extends('layouts.layout')

@section('title', 'Tableau de bord')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h3>Tableau de bord</h3>
            </div>
            <div class="card-body">
                <p><strong>Nom :</strong> {{ $user->name }}</p>
                <p><strong>Email :</strong> {{ $user->email }}</p>
                <p><strong>Date de création :</strong> {{ $user->created_at->format('d/m/Y') }}</p>
            </div>
            <a href="{{ route('dashboard.edit') }}">Modifier</a>
        </div>
    </div>
@endsection

@extends('layouts.layout')

@section('content')
    <h2>Inscription</h2>
    @if ($errors->any())
        <div class="errors">
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif
    <form method="POST" action="{{ route('register') }}">
        @csrf
        <label>Nom : <input type="text" name="name" required></label><br>
        <label>Email : <input type="email" name="email" required></label><br>
        <label>Mot de passe : <input type="password" name="password" required></label><br>
        <label>Confirmer mot de passe : <input type="password" name="password_confirmation" required></label><br>
        <button type="submit">S'inscrire</button>
    </form>
@endsection

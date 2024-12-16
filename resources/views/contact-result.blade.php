@extends('layouts.layout')

@section('content')
    <div class="container">
        <div class="alert alert-success" role="alert">
            <h2>Message envoyé</h2>
            <p>Merci pour votre message, <strong>{{ $data['name'] }}</strong>.</p>
            <p>Nous vous répondrons à l'adresse : <strong>{{ $data['email'] }}</strong></p>
            <p>Votre message : <em>{{ $data['message'] }}</em></p>
        </div>
    </div>
@endsection

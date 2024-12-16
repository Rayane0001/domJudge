@extends('layouts.layout')

@section('content')
    <h2>Message envoyé</h2>
    <p>Merci pour votre message, {{ $data['name'] }}.</p>
    <p>Nous vous répondrons à l'adresse : {{ $data['email'] }}</p>
    <p>Votre message : {{ $data['message'] }}</p>
@endsection

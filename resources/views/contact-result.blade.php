@extends('layouts.master')

@section('title', 'Contact envoyé')

@section('content')
    <x-banner title="Merci !" subtitle="Nous avons bien reçu votre message." />
    <p>Nom : {{ $data['name'] }}</p>
    <p>Email : {{ $data['email'] }}</p>
    <p>Message : {{ $data['message'] }}</p>
@endsection

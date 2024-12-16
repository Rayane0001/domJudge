@extends('layouts.master')

@section('title', 'Contacts')

@section('content')
    <x-banner title="Contactez-nous" subtitle="Nous sommes à votre écoute !" />
    <form method="POST" action="{{ route('contact.submit') }}">
        @csrf
        <label for="name">Nom et prénom :</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Adresse email :</label>
        <input type="email" id="email" name="email" required>

        <label for="message">Message :</label>
        <textarea id="message" name="message" required></textarea>

        <button type="submit">Envoyer</button>
    </form>
@endsection

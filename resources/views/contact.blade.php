@extends('layouts.layout')

@section('content')
    <h2>Contact</h2>
    <form method="POST" action="{{ route('contact.submit') }}">
        @csrf
        <label>Nom : <input type="text" name="name" required></label><br>
        <label>Email : <input type="email" name="email" required></label><br>
        <label>Message : <textarea name="message" required></textarea></label><br>
        <button type="submit">Envoyer</button>
    </form>
@endsection

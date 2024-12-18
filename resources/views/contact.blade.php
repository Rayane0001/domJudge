@extends('layouts.layout')

@section('content')
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="col-md-6">
            <h2 class="text-center mb-4">Contact</h2>
            <form method="POST" action="{{ route('contact.submit') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary w-100">Envoyer</button>
            </form>
        </div>
    </div>
@endsection

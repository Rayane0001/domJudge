<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['competitions' => ['Compétition 1', 'Compétition 2']]);
})->name('home');

Route::get('/a-propos', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', function (\Illuminate\Http\Request $request) {
    return view('contact-result', ['data' => $request->all()]);
})->name('contact.submit');

Route::get('/login', function () {
    return 'Page de connexion (en cours de développement)';
})->name('login');

Route::get('/register', function () {
    return 'Page d\'inscription (en cours de développement)';
})->name('register');

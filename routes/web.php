<?php

use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\SubmissionController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RankingController;

Route::get('/', function () {
    return view('home', ['competitions' => ['Compétition 1', 'Compétition 2']]);
})->name('home');

Route::get('/a-propos', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', function (Request $request) {
    return view('contact-result', ['data' => $request->all()]);
})->name('contact.submit');

// Affichage des formulaires
Route::view('/login', 'login')->name('login');
Route::view('/register', 'register')->name('register');

// Inscription
Route::post('/register', function (Request $request) {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ]);

    return redirect()->route('login')->with('success', 'Inscription réussie. Connectez-vous !');
});

// Connexion
Route::post('/login', function (Request $request) {
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();
        return redirect()->route('dashboard');
    }

    return back()->withErrors(['email' => 'Les informations de connexion sont incorrectes.']);
});

// Déconnexion
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');

Route::get('/dashboard', function () {
    return 'Bienvenue sur le tableau de bord !';
})->name('dashboard');

/* page CRUD */

// Route pour afficher toutes les compétitions
Route::get('/competitions', [CompetitionController::class, 'index'])->name('competitions.index');

// Route pour afficher une compétition spécifique et ses détails
Route::get('/competitions/{competition}', [CompetitionController::class, 'show'])->name('competitions.show');

// Route pour afficher le classement d'une compétition
Route::get('/competitions/{competition}/ranking', [RankingController::class, 'index'])->name('competitions.ranking');

// Route pour afficher un challenge spécifique dans une compétition
Route::get('/competitions/{competition}/challenges/{challenge}', [ChallengeController::class, 'show'])->name('competitions.challenges.show');

// Route pour soumettre une réponse pour un challenge
Route::post('/competitions/{competition}/challenges/{challenge}/submit', [SubmissionController::class, 'store'])->name('competitions.challenges.submit');

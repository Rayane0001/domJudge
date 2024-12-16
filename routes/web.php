<?php

use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\CompetitionController;
use App\Http\Controllers\SubmissionController;
use App\Http\Controllers\RankingController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Competition;
use App\Http\Controllers\LeaderboardController;

/**
 * Routes pour les pages statiques
 */
Route::get('/', function () {
    $competitions = Competition::all(); // Récupère toutes les compétitions
    return view('home', ['competitions' => $competitions]);
})->name('home');

Route::get('/a-propos', function () {
    return view('about');
})->name('about');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::post('/contact', function (Request $request) {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string|max:1000',
    ]);

    // Traitez les données si nécessaire, puis affichez une vue
    return view('contact-result', ['data' => $validated]);
})->name('contact.submit');

/**
 * Authentification
 */

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
    $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required',
    ]);

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

// Tableau de bord (protégé par authentification)
Route::get('/dashboard', function () {
    return view('dashboard'); // Assurez-vous que la vue `dashboard` existe
})->middleware('auth')->name('dashboard');

/**
 * Gestion des compétitions, challenges, et soumissions
 */

// Liste des compétitions
Route::get('/competitions', [CompetitionController::class, 'index'])->name('competitions.index');

// Affichage d'une compétition spécifique
Route::get('/competitions/{competition}', [CompetitionController::class, 'show'])->name('competitions.show');

// Classement pour une compétition
Route::get('/competitions/{competition}/ranking', [RankingController::class, 'index'])->name('competitions.ranking');

// Affichage d'un challenge spécifique dans une compétition
Route::get('/competitions/{competition}/challenges/{challenge}', [ChallengeController::class, 'show'])->name('competitions.challenges.show');

// Soumission d'une solution pour un challenge
Route::post('/competitions/{competition}/challenges/{challenge}/submit', [SubmissionController::class, 'store'])
    ->middleware('auth') // Seuls les utilisateurs connectés peuvent soumettre des solutions
    ->name('competitions.challenges.submit');

Route::get('/competition/{id}', function ($id) {
    $competition = Competition::findOrFail($id);
    // Tu pourras ajouter ici les données du classement et autres informations
    return view('competitions.show', ['competition' => $competition]);
})->name('competition.show');

Route::post('/competition/{id}/submit', function (Request $request, $id) {
    $request->validate([
        'file' => 'required|mimes:zip,tar,gz|max:2048', // Ajuste selon les types de fichiers autorisés
    ]);

    // Enregistre la soumission ici
    // Exemple :
    // Submission::create([
    //     'competition_id' => $id,
    //     'user_id' => auth()->id(),
    //     'file_path' => $request->file('file')->store('submissions'),
    // ]);

    return back()->with('success', 'Votre solution a été envoyée avec succès !');
})->name('submission.store');

Route::get('/leaderboard', [LeaderboardController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard'); // Ensure that the `dashboard` view exists
})->middleware('auth')->name('dashboard.index');

Route::get('/competitions', [CompetitionController::class, 'index']);
Route::get('/competitions/{id}', [CompetitionController::class, 'show']);

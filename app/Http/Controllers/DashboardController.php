<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
  public function index(): View|Factory|Application
  {
    $user = Auth::user();

    return view('dashboard.index', compact('user'));
  }

  public function edit(): View|Factory|Application
  {
    $user = Auth::user();

    return view('dashboard.edit', compact('user'));
  }

  public function update(Request $request): RedirectResponse
  {
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
        'password' => 'nullable|min:8|confirmed',
    ]);

    $user = Auth::user();
    $user->name = $request->input('name');
    $user->email = $request->input('email');

    if ($request->filled('password')) {
      $user->password = Hash::make($request->input('password'));
    }

    $user->save();

    return redirect()->route('dashboard.index')->with('success', 'Vos informations ont été mises à jour avec succès.');
  }
}

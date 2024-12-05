<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Afficher la vue de sign-in
    public function showSignInForm()
    {
        return view('auth.se-connecter');
    }

    // Gérer les soumissions de formulaire de sign-in
    public function signIn(Request $request)
    {
        // Validation des données
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Tentative de connexion
        if (Auth::attempt($request->only('email', 'password'), $request->has('remember'))) {
            // Rediriger vers le tableau de bord si réussi
            return redirect()->intended('dashboard')->with('success', 'You are logged in.');
        }

        // Rediriger avec un message d'erreur si échec
        return redirect()->back()->withErrors(['email' => 'The provided credentials do not match our records.']);
    }

    // Déconnexion de l'utilisateur
    public function logout()
    {
        Auth::logout();
        return redirect()->route('se-connecter')->with('success', 'You have been logged out.');
    }

    
}

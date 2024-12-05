<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    // Afficher la vue de sign-up
    public function showSignUpForm()
    {
        return view('auth.static-sign-up');
    }

    // Gérer les soumissions de formulaire de sign-up
    public function signUp(Request $request)
    {
        // Validation des données
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Création de l'utilisateur
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Connexion automatique de l'utilisateur après inscription
        Auth::login($user);

        // Redirection vers le tableau de bord ou une autre page
        return redirect()->route('dashboard')->with('success', 'Account created successfully.');
    }
}

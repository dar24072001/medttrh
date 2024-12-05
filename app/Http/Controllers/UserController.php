<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'role' => 'required|string',
            'mot_passe' => 'required|string|min:8',
            'date_embauche' => 'required|date',
            'poste' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'date_naissance' => 'required|date',
        ]);

        // Créer un nouvel utilisateur avec le mot de passe haché
        User::create([
            'nom' => $validatedData['name'],
            'email' => $validatedData['email'],
            'role' => $validatedData['role'],
            'mot_passe' => Hash::make($validatedData['mot_passe']), // Mot de passe haché
            'date_embauche' => $validatedData['date_embauche'],
            'poste' => $validatedData['poste'],
            'adresse' => $validatedData['adresse'],
            'date_naissance' => $validatedData['date_naissance'],
        ]);

        return response()->json(['success' => 'Utilisateur ajouté avec succès!']);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $id,
            'role' => 'required|string|max:255',
            'mot_passe' => 'sometimes|string|min:8',
            'date_embauche' => 'required|date',
            'poste' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'date_naissance' => 'required|date',
        ]);

        $user = User::findOrFail($id);
        $user->nom = $request->nom;
        $user->email = $request->email;
        $user->role = $request->role;

        if ($request->filled('mot_passe')) {
            $user->mot_passe = Hash::make($request->mot_passe); // Hacher le mot de passe
        }

        $user->date_embauche = $request->date_embauche;
        $user->poste = $request->poste;
        $user->adresse = $request->adresse;
        $user->date_naissance = $request->date_naissance;
        $user->save();

        return response()->json(['success' => true, 'message' => 'Utilisateur modifié avec succès']);
    }


    public function index()
    {
        // Récupère tous les utilisateurs
        $users = User::all();

        // Passe les utilisateurs à la vue
        return view('admin.Les_essentiels.gestion-utilisateurs', compact('users'));
    }

    // Méthode pour obtenir les informations d'un utilisateur pour l'édition
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json(['success' => true, 'user' => $user]);
    }


    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return response()->json(['success' => true, 'message' => 'Utilisateur supprimé avec succès']);
        }
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\User; // Ajoutez cette ligne pour importer le modèle User
use App\Models\Conge; // Importation du modèle Conge
use App\Models\Document; // Importation du modèle Document

use Illuminate\Http\Request;

class EmployeController extends Controller
{
    //Fonction qui permet d'afficher le dashboard du client
    public function dashboard(){
        return View ('employe.dashboard');
    }


    public function showDetails($id)
{
    $employe = User::findOrFail($id);
    $conges = Conge::where('user_id', $id)->get();
    $documents = Document::where('user_id', $id)->get();

    return view('employe.details', compact('employe', 'conges', 'documents'));
}

public function show($id)
{
    // Récupère l'employé sans le mot de passe
    $employe = User::findOrFail($id);
    return view('employe.details', compact('employe'));
}


}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GestionUtilisateursController extends Controller
{
    public function GestionUtilisateurs()
    {
        return view('admin.les_essentiels.gestion-utilisateurs');
    }
}

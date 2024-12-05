<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Fonction qui permet d'afficher le dashboard de l'admin
    public function dashboard(){
        return View ('admin.dashboard');
    }
}

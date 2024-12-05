<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalendrierController extends Controller
{
    public function calendrier()
    {
        return view('admin.vue-ensemble.calendrier');
    }
}

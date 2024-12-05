<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MonProfileController extends Controller
{
    public function showProfile()
    {
        

        return view('admin.les_essentiels.mon-profile'); 
    }
}

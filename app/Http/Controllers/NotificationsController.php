<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    //
    public function notifications()
    {
        return view('admin.vue-ensemble.notifications');
    }
}

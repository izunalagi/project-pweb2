<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(Request $request)
    {
        return view('dashboard.admin');
    }

    public function post()
    {
        $users = User::all();
        return view('dashboard.post', compact('users'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Recipe;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard', [
            'usersCount'   => User::count(),
            'recipesCount' => Recipe::count(),
        ]);
    }
}
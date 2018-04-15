<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($slug)
    {
        $users = User::where('slug', $slug)->first();

        return view('profiles.profile', compact('users'));
    }
}

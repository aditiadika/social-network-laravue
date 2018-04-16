<?php

namespace App\Http\Controllers;

use Session;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index($slug)
    {
        $users = User::where('slug', $slug)->first();

        return view('profiles.profile', compact('users'));
    }

    public function edit()
    {
        $info = Auth::user()->profile;

        return view('profiles.edit', compact('info'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
           'location' => 'required',
            'about' => 'required|max:255'
        ]);

        auth::user()->profile()->update([
            'location' => $request->location,
            'about' => $request->about,
        ]);

        if ($request->has('avatar'))
        {
            Auth::user()->update([
               'avatar' => $request->avatar->store('public/avatars')
            ]);
        }

        Session::flash('success', 'Profile Updated!');

        return redirect()->back();
    }
}

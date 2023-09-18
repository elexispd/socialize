<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User; // Import the User model

class UserController extends Controller

{
    public function timeline($username=null)
    {
        if ($username) {
            $user = User::where('username', $username)->firstOrFail();
        } else {
            $user = auth()->user();
        }
        return view('timeline.index', compact('user'));
    }


    public function friends()
    {

    }

    public function edit() {
        return view('profile.edit');
    }
}

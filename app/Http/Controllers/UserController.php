<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\User; // Import the User model
use App\Models\Friendships; // Import the User model

class UserController extends Controller

{
    public function timeline($username=null)
    {
        if ($username) {
            $user = User::where('username', $username)->firstOrFail();
            $userID = User::where("username", $username)->pluck("id");
        } else {
            $user = auth()->user();
            $userID = User::where("id", $user->id)->pluck('id');
        }

        $friends = $user->allFriendsWithCount();

        return view('timeline.index', compact('user', 'friends'));
    }




    public function edit() {
        return view('profile.edit');
    }
}

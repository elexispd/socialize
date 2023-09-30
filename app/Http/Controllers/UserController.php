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

        $friends = $this->activeFriends($userID);

        return view('timeline.index', compact('user', 'friends'));
    }

    private function activeFriends($userID) {
        $friends = Friendships::where("status", 1)
                 ->where("user_id", $userID)
                 ->orWhere("friend_id", $userID)
                 ->whereNotIn('user_id', $userID)
                 ->whereNotIn('user_id', $userID)
                 ->get();
        return $friends;
    }


    public function edit() {
        return view('profile.edit');
    }
}

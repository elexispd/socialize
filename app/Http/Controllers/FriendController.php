<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FriendController extends Controller
{
    public function index() {
        return view("");
    }


    public function explore() {
        $loggedInUser = auth()->user();


        $usersNotFriendsWithLoggedInUser = User::where('id', '!=', $loggedInUser->id)

            ->whereNotIn('id', $loggedInUser->friends->pluck('id')) // Exclude friends of the logged-in user
            ->whereNotIn('id', $loggedInUser->friendsWith->pluck('id'))

            ->get();






        return view('explore.find-friends', compact('usersNotFriendsWithLoggedInUser'));
    }



}

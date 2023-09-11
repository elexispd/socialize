<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\User;

class ExploreController extends Controller
{
    public function index() {
        $currentUser = auth()->user();
        $otherUsers = User::where("username", "!=", $currentUser->username)->take(15)->get();

        $friends = DB::table('friends')
        ->join('users', 'friends.friend_username', '=', 'users.username')
        ->where('friends.username', $currentUser->username)
        ->select('users.*')
        ->get();

        return view('explore.explore', compact('otherUsers', 'friends'));
    }

}

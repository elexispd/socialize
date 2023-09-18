<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\User;

class ExploreController extends Controller
{
    public function index() {
        $currentUser = auth()->user();

        $users = User::all()->except($currentUser->id);

        return view('explore.find-friends', compact('users'));

    }

}

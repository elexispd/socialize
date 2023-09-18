<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\User;
//use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index() {
        $currentUser = auth()->user();
        //$friends = $currentUser->getFriends();
        //return view("feed/feed", compact('friends'));

        return view("feed/feed");

    }


}

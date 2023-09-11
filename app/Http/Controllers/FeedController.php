<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index() {
<<<<<<< HEAD
        // return view("feed/feed");
        return DB::table("users")
        ->value("username");

=======
        $currentUser = auth()->user();
        $friends = $currentUser->getFriends();
        return view("feed/feed", compact('friends'));
>>>>>>> 482515b7a90d159067fdb0a0bb44a73464e33ab0
    }

    
}

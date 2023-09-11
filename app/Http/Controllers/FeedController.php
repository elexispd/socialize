<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class FeedController extends Controller
{
    public function index() {
        // return view("feed/feed");
        return DB::table("users")
        ->value("username");

    }
}

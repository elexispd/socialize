<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{


    public function store(Request $request) {

        $request->validate([
            'content' => 'required'
        ]);

        Post::create([
            'user_id' => auth()->user()->id,
            'content' => $request->input('content')
        ]);

        return redirect()->back()->with('success', 'You posted on your timeline');
    }


}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{


    public function store(Request $request) {

        $request->validate([
            'content' => 'required',
        ]);

        Post::create([
            'user_id' => auth()->user()->id,
            'content' => $request->input('content'),
            'post_bg' => $request->input('post_bg')
        ]);

        return redirect()->back()->with('success', 'You posted on your timeline');
    }

    public function index() {
        $posts = Post::orderBy('created_at', 'DESC')
        ->with(['user' => function ($query) {
            $query->select('id', 'firstname', 'lastname');
        }])
        ->orderBy('created_at', 'DESC')
        ->orderByRaw('RAND()') // This adds a random factor
        ->get();

        return view("feed/feed", compact('posts'));
    }


}

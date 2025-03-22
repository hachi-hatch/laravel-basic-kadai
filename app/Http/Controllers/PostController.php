<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Post;

class PostController extends Controller
{
    //
    public function index() {
       
        $posts = DB::table('posts')->select('title', 'content')->get();

        return view('posts.index', compact('posts'));
    }

    public function show($id) {
        $posts = Post::find($id);
        return view('posts.show', compact('posts'));
    }
}

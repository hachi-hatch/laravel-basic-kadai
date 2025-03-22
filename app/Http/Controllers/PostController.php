<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    //
    public function index() {
       
        $posts = DB::table('posts')->select('title', 'content')->get();

        return view('posts.index', compact('posts'));
    }
}

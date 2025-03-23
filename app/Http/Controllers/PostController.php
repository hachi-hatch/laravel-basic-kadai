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

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {
        //バリデーションを設定
        $request->validate([
            'title' => 'required|string|max:20',
            'content' => 'required|string|max:200'
        ]);

        //テーブルにデータを追加
        $post = new Post();
        $post->title = $request->input('title');
        $post->content = $request->input('content');
        $post->save();

        //リダイレクト
        return redirect("/posts");
    }
}

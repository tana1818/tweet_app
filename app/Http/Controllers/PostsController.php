<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();

        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        
        if (Auth::check() ){
            return view('posts.create');
        }else {
            return redirect() -> route('login');
        }

        return view('posts.create');
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post -> title = $request -> title;
        $post -> body = $request -> body;
        $post -> user_id = $request -> user() -> id;
        $post -> save();
        return redirect() -> route('top');
    }

}

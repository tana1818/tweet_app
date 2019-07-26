<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    public function store(Request $request)
    {

        $validate_rule = [
          'post_id' => 'required|exists:posts,id',
          'body' => 'required|max:2000',
        ];

        $this->validate($request, $validate_rule);
        $params = $request->all();
        Comment::create($params);
        return redirect()->route('posts.show', ['id' => $request->post_id]);
    }
}
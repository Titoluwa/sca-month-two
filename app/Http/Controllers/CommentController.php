<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $comment = new Comment($request->all());
        $comment->save();

        return back()->with('message',"Comment Added!");
    }
}

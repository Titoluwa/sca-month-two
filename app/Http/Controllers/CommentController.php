<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment($request->all());
        $comment->save();

        return back()->with('new_comment_message',"New Comment Added!");
    }
    public function destory($id)
    {
        // dd($id);
        $comment = Comment::findorFail($id);
        $comment->delete();
        return back()->with('comment_delete_message', "Comment Deleted!");
    }
}

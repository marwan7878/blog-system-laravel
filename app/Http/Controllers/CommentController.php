<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{

    public static function store(Request $request)
    {
        $request->validate([
            'description' => 'required'
        ]);
        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $input['post_id'] = $request->post_id; 
        Comment::create($input);
        return back();
        
    }

    public function show(Comment $comment)
    {
        //
    }


    public function edit(Comment $comment)
    {
        //
    }

    
    public function update(Request $request, Comment $comment)
    {
        //
    }

    
    public function destroy(Comment $comment)
    {
        //
    }
}

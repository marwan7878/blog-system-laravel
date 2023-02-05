<?php

namespace App\Http\Controllers;
use auth;
use App\Models\Reaction;
use App\Models\Post;
use Illuminate\Http\Request;

class ReactionController extends Controller
{
    public static function love($post_id):void
    {
        $user_id = Auth::id();
        $reaction = Reaction::where('post_id' , $post_id)->where('user_id' , $user_id);
        if($reaction === null)
        {
            $reaction = Reaction::create([
                'user_id' => $user_id ,
                'post_id' => $post_id . $post_id
            ]);
        }
        if(Reaction::truncate())
        {
            Reaction::create([
                'user_id' => $user_id ,
                'post_id' => $post_id
            ]);
        }

    } 
    public static function undoLove($post_id):void
    {
        $user_id = Auth::id();
        $reaction = Reaction::where('post_id' , $post_id)->where('user_id' , $user_id);
        
        $post = Post::find($post_id);
        $reaction->forceDelete();
        
    } 
}

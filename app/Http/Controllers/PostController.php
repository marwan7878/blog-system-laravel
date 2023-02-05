<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Reaction;
use auth;
use Illuminate\Http\Request;
use App\Http\Controllers\str_slug;


class PostController extends Controller
{

    public function index()
    {
        $posts = Post::all();
        return view('posts.index' , compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required',
            'description' => 'required'
        ]);

        Post::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);
        return redirect()->route('posts.index');
    }

    
    public function show($id)
    {
        $post = Post::where('id' , $id)->first();
        $reaction = Reaction::where('post_id' , $id)->where('user_id' , Auth::id())->first();
        
        return view('posts.show')->with('post' , $post)->with('reaction' , $reaction);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit')->with('post' , $post);
    }


    public function update(Request $request , $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required'
        ]);
        $post = Post::find($id);
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();

        return redirect()->route('posts.index'); 
    }


    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
    }

    public function hardDelete($id)
    {
        $post = Post::find($id);
        $post->forceDelete();
        return redirect()->back();
    }
    
    public function share($post_id)
    {
        $post = Post::find($post_id);
        Post::create([
            'title' => $post->title,
            'description' => $post->description,
        ]);
        return redirect()->back();
    }
}

@extends('layouts.app')

@section('content')

<style>
    .textArea
    {
        border-radius: 10px;
        border-width: 3px;
        padding-left:8px;
        size: 20px;
    }
    .title
    {
        border-radius: 10px;
        border-width: 3px;
        padding-left:8px;
        size: 20px;
        width: 95%;
    }
</style>

<div class="container" style="color: green ">
    <div class="row">
        @if (count($errors) > 0)
        <ul>
            @foreach ($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
        @endif
      <div class="col">
       <div class="jumbotron">
            <h1 class="display-4">Edit Post</h1>
            <a class="btn btn-secondary" style="margin: 2%" href="{{route('posts.index')}}" role="button">Posts</a>
        </div> 
      </div>
    </div>

    <div class="row">  
      <div class="container">
        <form action="{{route('posts.update' , $post->id)}}" method="POST">
            @csrf
            @method('put')
            
            <div class="from-group">
                <label>Title</label>
                <input type="text" name="title" class="form-control title" value="{{$post->title}}">
            </div>    
            <br><br>

            <div class="from-group">
                <label for="content" >Description</label>
                <textarea class="from-control textArea" rows="3" cols="130" name="description" >{{$post->description}}</textarea>
            </div>    
            
            <br><br>
            <button class="btn btn-success" type="submit">Update</button>
        </form>
      </div>
    </div>
</div>
@endsection
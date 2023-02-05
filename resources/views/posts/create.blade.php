@extends('layouts.app')

@section('content')

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
            <h1 class="display-4">Create Post</h1>
            <a class="btn btn-secondary" style="margin: 2%" href="{{route('posts.index')}}" role="button">Posts</a>
        </div> 
      </div>
    </div>

    <div class="row">  
      <div class="container">
        <form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <div class="from-group">
                <label for="exampleFromControlInput1">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>    
            <br><br>

            <div class="from-group">
                <label for="content" >Description</label>
                <textarea class="from-control" rows="3" cols="130" name="description" required></textarea>
            </div>    
            
            <br><br>
            <button class="btn btn-success" type="submit">Save</button>
        </form>
      </div>
    </div>
</div>
@endsection
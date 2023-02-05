@extends('layouts.app')

@section('content')
<div class="container" style="font-size: 1.8rem; color: green ">
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
        {{-- <div class="container" >
            @if ($message = Session::get('failed'))
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
                
            @endif
        </div> --}}
      <div class="col">
       <div class="jumbotron">
            <h1 class="display-4">All Posts</h1>
            <a class="btn btn-primary" style="margin: 2%" href="{{route('posts.create')}}" role="button">Create Post</a>
            {{-- <a class="btn btn-warning" style="margin: 2%" 
            href="{{route('posts.trashed')}}" role="button">Trashed Posts</a> --}}
        </div> 
      </div>
    </div>
@php
    $i=1
@endphp
    <!---->
    @if ($posts->count() > 0)
        <table class="table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody >
                @foreach ($posts as $post)
                    <tr>
                        <th>{{$i++}}</th>
                        <td>{{$post->title}}</td>
                        
                        <td> 
                            <a class="btn btn-success"  
                            href="{{route('post.show', $post->id)}}" >show</a>
                            &nbsp;
                            
                            <a class="btn btn-warning"  
                            href="{{route('posts.edit' , $post->id)}}" >edit</a>
                            &nbsp;
                            <a class="btn btn-danger"  
                            href="{{route('posts.hardDelete', $post->id)}}" >delete</a>
                            
                        </td>
                    </tr>
                @endforeach
                    
            </tbody>
        </table>
        
    @else
        <div class="alert alert-danger" role="alert">
            No posts 
        </div>
    @endif
    
@endsection
@extends('layouts.app')

@section('content')
<style>
    .button1
    {
        position: relative;
        left: 80%;
    }
    .button2
    {
        position: relative;
        left: 56%;
        background-color: gray;
    }
    .button3
    {
        background-color: lightgrey;
        border-radius: 10px;
        border-color: lightgrey;
        padding-left: 127px;
        padding-right: 127px;
        padding-top: 10px;
        padding-bottom: 10px;
        text-decoration: none;
    }
    .buttonChecked
    {
        background-color: lightgrey;
        border-radius: 10px;
        border-color: lightgrey;
        padding-left: 127px;
        padding-right: 127px;
        padding-top: 10px;
        padding-bottom: 10px;
        text-decoration: none;
    }
    .button3:hover {
        background-color: rgb(170, 165, 165);
    }
    .textArea
    {
        border-radius: 10px;
        padding-left:8px;
        size: 20px;
    }
    .comment
    {
        border-style: ridge;
        border-radius: 10px;
        padding-left: 8px;
    }
    .reply
    {
        position: relative;
        left: 7%;
    }
</style>
<div class="container" style="font-size: 1.2rem; color: green ">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card-body">
                <div class="header">
                    <h2 class="text-center text-primary">Q & A system</h2>
                    <br>
                    <h1 style="color: darkgray"><b>{{$post->title}}</b></h1>
                    <p style="border-style: groove; color: rgb(92, 83, 83); border-radius: 8px; height:150px ; padding-left: 6px">{{$post->description}}</p>
                    &nbsp;
                    
                    
                    @php
                        use App\Http\Controllers\ReactionController;
                    @endphp
                    @if ($reaction===null)
                        <a class="button3 buttonChecked" href="{{ReactionController::love($post->id)}}">
                            <span style='font-size:30px; color: red'>&#9829;</span>&nbsp;&nbsp;&nbsp;
                            <h4 style="display: inline ; color: red;"><b>Loved</b></h4>
                        </a>
                    @else
                        <a class="button3 " href="{{ReactionController::undoLove($post->id)}}">
                            <span style='font-size:30px; color: gray'>&#9825;</span>&nbsp;&nbsp;&nbsp;
                            <h4 style="display: inline ; color: gray;"><b>Love</b></h4>
                        </a>
                        
                    @endif

                    @php
                        use App\Http\Controllers\CommentController;
                    @endphp 

                    &nbsp;
                    <a class="button3" href="{{route('posts.share' , $post->id)}}">
                        <span style='font-size:30px; color: gray'>&#8631;</span>&nbsp;&nbsp;&nbsp;
                        <h4 style="display: inline ; color: gray;"><b>Share</b></h4>
                    </a>
                    <br><br>
                    
                    @foreach ($post->comments as $comment)
                    <div>
                            <div class="" style="display: flex;">
                                
                                <h3><strong style=" display: inline-block;color: cornflowerblue">{{$comment->user->name}}</strong></h3>
                                {{-- <ul style="list-style: none; display: flex; position: relative; left: 80%; top: 25px;">
                                    <li style="margin-left: 10px">hide</li>
                                    <li style="margin-left: 10px">delete</li>
                                    <li style="margin-left: 10px">edit</li>
                                </ul>
                                <a class="btn btn-default ;" style="display: inline-block; margin-left: 85%" href="{{route('posts.edit' , $post->id)}}" >
                                    <b>. . .</b></a> --}}
                                    
                            </div>
                            <div>
                                <hr style="border-style: dotted">
                                <p style="color: gray">{{$comment->description}}</p>
                            </div>
                            <div class="from-group reply">
                                @foreach ($comment->replies as $reply)
                                <div class="" style="display: flex">
                                    <strong style=" display: inline-block; color: cornflowerblue">{{$reply->user->name}}</strong>
                                
                                        {{-- <a class="btn btn-default ;" style="display: inline-block; margin-left: 85%" href="{{route('posts.edit' , $post->id)}}" >
                                            <b>. . .</b></a> --}}
                                </div>
                                <div>
                                    <hr style="border-style: dotted">
                                    <p style="color: gray">{{$reply->description}}</p>
                                </div>
                                @endforeach
                            </div>
                            
                            
                            
                            <form method="POST" action="{{route('comments.store')}}">
                            @csrf
                                <div class="from-group">
                                    <textarea type="text" class="from-control textArea reply" name="description" placeholder="Add Reply" rows="1" cols="40"></textarea>
                                    <input type="hidden" class="from-control" name="post_id" value="{{$comment->post_id}}">
                                    <input type="hidden" class="from-control" name="parent_id" value="{{$comment->id}}">
                                    <br>
                                    <button type="submit" class="btn btn-secondary button2 " >Reply</button>
                                    <br><br>
                                </div>
                            </form>
                            
                        </div>
                    @endforeach
                    
                    <form method="POST" action="{{route('comments.store')}}">
                        @csrf
                            <div class="from-group">
                                <textarea type="text" name="description" style="width: 96%" class="from-control textArea" placeholder="Add Comment"></textarea>
                                <input type="hidden" class="from-control" name="post_id" value="{{$post->id}}">
                                <button type="submit" class="btn btn-primary button1">Add Comment</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
      
@endsection




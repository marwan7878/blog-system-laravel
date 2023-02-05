@foreach ($comments as $comment)
    <div>
        <strong>{{$commment->user->name}}</strong>
        <p>{{$comment->description}}</p>
        <form method="POST" action="{{route('comments.store')}}">
        @csrf
            <div class="from-group">
                <textarea type="text" class="from-control" name="description" placeholder="Add Comment"></textarea>
                <input type="hidden" class="from-control" name="post_id" value="{{$comment->post_id}}">
                <input type="hidden" class="from-control" name="parent_id" value="{{$comment->parent_id}}">
                <button type="submit" class="btn btn-secondary">Reply</button>

            </div>
        </form>
        @include('posts.comments' , 'comments' , '=>' , $comment->replies)
    </div>
@endforeach
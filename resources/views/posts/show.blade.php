@extends('layouts.app')

@section('title')Show @endsection

@section('content')


<div class="card mt-2 mb-3">
  <div class="card-header">
  Post Info
  </div>
  <div class="card-body">
    <h5 class="card-title">Title : {{$post['title']}}</h5>
    <h6 class="card-text">Description : With supporting text below as a natural lead-in to additional content.</h6>
  </div>
</div>

<div class="card mt-4 mb-3">
  <div class="card-header">
  Post Creator Info
  </div>
  <div class="card-body">
    <h6 class="card-title">Name : {{$post->user->name}}</h6>
    <h6 class="card-text">Created At : {{$post->created_at->format('D jS F  Y-m-d H:i:s ') }}</h6>
  </div>
</div>
<div class="card">
        <div class="card-header">
        <h4>Comments</h4>
        </div>
        <div class="card-body">
          @if(session('comment'))

          dd(session('comment'))
        <form method="post" action="{{route('comments.update', session('comment')->id )}}">
          @csrf
          @method('patch')
          @else
        <form method="post" action="{{route('comments.store',  ['post_id' => $post->id, 'user_id' => $post->user->id])}}">
          @csrf
          @method('post')
          @endif
        <label for="comment" class="form-label"></label>
        <textarea type="text" class="form-control" id="comment" name="comment">@if(session('comment')){{session('comment')->comment}}@endif</textarea>
        <button type="submit" class="btn btn-dark mt-3 mb-3">@if(session('comment'))Edit @else Comment @endif</button>
        </form>
        <br>
        <hr></hr>

@foreach($comments as $comment)
          @if($comment->post_id === $post->id)
          <h6>{{$comment->user->name}}</h6>
          <p class="card-text">{{$comment->comment}}</p>
        <div class="btn-toolbar" role="toolbar" aria-label="Toolbar with button groups">
          <form method="POST" action="{{route('comments.edit',['comment' => $comment->id])}}" class="form-inline">
            @csrf
            @method('get')
            <button type="submit" class="btn btn-link link-secondary d-inline">Edit</button>
          </form>
          <form method="POST" action="{{route('comments.destroy', ['comment' => $comment->id])}}" class="form-inline" onSubmit="return confirm('Delete this comment !')">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-link link-secondary d-inline">Delete</button>
          </form>
        </div>
        <hr></hr>
          @endif
        @endforeach
      </div>
</div>
</div>
      </div>


@endsection

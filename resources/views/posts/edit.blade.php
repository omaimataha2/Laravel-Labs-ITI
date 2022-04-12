@extends('layouts.app')

@section('title') Edit @endsection

@section('content')
      <form method="post" action="{{route('posts.update', ['post' => $post['id']])}}">
        @csrf
        @method('put')
        <div class="mb-3 mt-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" value="{{$post['title']}}">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Post Creator</label>
            <select class="form-control" >{{$post['posted_by']}}
                <option>Ahmed</option>
                <option>Mohamed</option>
                <option>Ali</option>
            </select>
       </div>

          <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
        @endsection

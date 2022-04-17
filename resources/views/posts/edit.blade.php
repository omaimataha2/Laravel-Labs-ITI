@extends('layouts.app')

@section('title') Edit @endsection

@section('content')
      <form method="post" action="{{route('posts.update', ['post' => $post['id']])}}" enctype="multipart/form-data">
        @csrf
        @method('put')
        <div class="mb-3 mt-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input name="title" type="text" class="form-control" id="exampleFormControlInput1" value="{{$post['title']}}">
          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$post['description']}}</textarea>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label" >Post Creator</label>
            <select class="form-control" name="post_creator">
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
            </select>

       </div>
       <div class="mb-3">
         <label for="formFile" class="form-label">Image</label>
         <input class="form-control" type="file" id="formFile" name="avatar" value="{{$post['avatar']}}">
      </div>

          <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
          </div>
        </form>
        @endsection

@extends('layouts.app')

@section('title')Create @endsection

@section('content')
      <form method="POST" action="{{route('posts.store')}}" enctype="multipart/form-data">
        @csrf
        <div class="mb-3 mt-3">
            <label for="exampleFormControlInput1" class="form-label">Title</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
          </div>

          </div>
          <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Description</label>
            <textarea name='description' class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>

          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Post Creator</label>
            <select class="form-control" name="post_creator">
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
              @endforeach
            </select>
            </select>
       </div>
       <div class="mb-3">
  <label for="formFile" class="form-label">Image</label>
  <input class="form-control" type="file" id="formFile" name="avatar">
</div>

          <div class="mb-3">
                <button type="submit" class="btn btn-success">Create Post</button>
          </div>
        </form>
@endsection

@extends('layouts.app')

@section('title') This Is Index Page @endsection

@section('content')
<div class="container mx-4 justify-center ">
        <div class="text-center">
            <a href="{{ route('posts.create') }}" class="mt-4 btn btn-success">Create Post</a>
        </div>
        <table class="table mt-4">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Posted By</th>
                <th scope="col">Created At</th>
                <th scope="col">Image</th>
                <th scope="col">Actions</th>
              </tr>
            </thead>

            <tbody>
            @foreach ( $allPosts as $post)
              <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->slug}}</td>
                <td>{{$post->user ? $post->user->name : 'Not Found'}}</td>
                <td>{{$post->created_at->format('Y-m-d')}}</td>
                <td><img height="50px" src="{{asset('/storage/images/posts/'.$post->avatar)}}" /></td>
                <td>
                    <a href="{{route('posts.show', ['post' => $post['id']])}}" class="btn btn-info">View</a>
                    <a  href="{{route('posts.edit', ['post' => $post['id']])}}" class="btn btn-primary">Edit</a>

                    <form style="display:inline;" method="post" action="{{route('posts.destroy', ['post' => $post['id']])}}">
                    @csrf
                    @method('delete')
                    <button  type="submit" class="btn btn-danger" onclick="return confirm('Are you sure! you need to delete?')">Delete</button>
                    </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          <div class=" mt-4 ">

          {{ $posts->links() }}

        </div>

        </div>
@endsection

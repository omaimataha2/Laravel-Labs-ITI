@extends('layouts.app')

@section('title')Show @endsection

@section('content')


<div class="card mt-4 mb-3">
  <div class="card-header">
  Post Info
  </div>
  <div class="card-body">
    <h5 class="card-title">Title : {{$post['title']}}</h5>
    <h6 class="card-text">Description : With supporting text below as a natural lead-in to additional content.</h6>
  </div>
</div>

<div class="card mt-4">
  <div class="card-header">
  Post Creator Info
  </div>
  <div class="card-body">
    <h6 class="card-title">Name : {{$post->user->name}}</h6>
    <h6 class="card-text">Created At : {{$post->created_at->format('D jS F  Y-m-d H:i:s ') }}</h6>
  </div>
</div>

@endsection

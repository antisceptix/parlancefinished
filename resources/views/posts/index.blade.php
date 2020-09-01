@extends('layouts.app')

@section('content')

<div class="col-sm-10 col-centered">
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
@role('admin')
<a class="btn btn-success mb-2" href="/posts/create">New Post</a> 
@endrole
<div class="card">
<h5 class="card-header">Posts</h5>
  <br>
@foreach ($posts as $post)
<div class="row">
  <div class="col-sm-10 col-centered">
    <div class="card">
    
  <div class="card-body">
      <a href="{{ route('posts.show', $post) }}">
    <h1 class="title">{{ $post->title }}</h1>
  </a>
        <p><b>Posted:</b> {{ $post->created_at->diffForHumans() }}</p>
        <p class="card-text"><p> {!! html_entity_decode($post->content) !!}</p>
        
        @role('admin')
        

        <form action="{{ route('posts.destroy', $post->id)}}" method="post">
        {{ csrf_field() }}
        @method('DELETE')
        <a href="{{ route('posts.edit', $post)}}" class="btn btn-primary"> Edit</a>
        <button class="btn btn-danger" type="submit">Delete</button>
        </form>

       

        

        @endrole
  
  </form>
      </div>
    </div>
  </div>
  </div>
@endforeach

@endsection
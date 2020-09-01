@section('action', route('posts.create'))
@extends('layouts.app')

@section('content')
<form method="post" action="{{ route('posts.update', $post) }}">

    @csrf
    @method('patch')
    @include('partials.errors')

    <div class="col-sm-10">
<div>
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12">
<div class="card">
<h5 class="card-header">Edit: {{ $post->title }}</h5>
<div class="card-body">
    <div class="field">
        <label class="label">Title</label>
        <div class="control">
            <input type="text" name="title" value="{{ $post->title }}" class="input" placeholder="Title" minlength="5" maxlength="100" required />
        </div>
    </div>

    <div class="field">
    <div class="form-group">
      <label for="comment">Content:</label>
      <textarea  class="form-control" name="content" rows="5" id="comment">{{ $post->content }}</textarea>
    </div>
          
    </div>


    <div class="field">
      
            <button type="submit" class="button is-link is-outlined">Update</button>
     
    </div>

</form>

@endsection
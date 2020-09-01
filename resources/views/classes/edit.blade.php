@extends('layouts.app')
 
@section('content')
 
<form class="" action="{{ route('classes.update', $user_info->id) }}" method="POST" name="edit_class">
{{ csrf_field() }}
@method('PATCH')
<div class="col-sm-10">
<div>
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12">
<div class="card">
  <h5 class="card-header">Edit Class</h5>
  <div class="card-body">
        <div class="form-group">
        <strong>Name</strong>
            <input type="text" name="classesname" class="form-control" placeholder="Enter Name" value="{{ $user_info->classes_name }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>
    

    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>'
@endsection
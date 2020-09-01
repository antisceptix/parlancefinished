@extends('layouts.app')
 
@section('content')
<form class="" action="{{ route('classes.store') }}" method="POST" name="add_user">
{{ csrf_field() }}
<div class="col-sm-10">
<div>
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12">
<div class="card">
  <h5 class="card-header">Create Class</h5>
  <div class="card-body">
<table class="table table-hover" id="laravel_crud">
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Class Name</strong>
            <input type="text" name="classname" class="form-control" placeholder="Enter Class Name">
            <span class="text-danger">{{ $errors->first('classname') }}</span>
        </div>
    </div>

    
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
</table>
</div>
</form>
@endsection
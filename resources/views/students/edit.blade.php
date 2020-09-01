@extends('layouts.app')
 
@section('content')
<div class="col-sm-10">
<div>
<a href="{{ route('students.create') }}" class="btn btn-success mb-2">Add</a> 
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12">
<div class="card">
<h5 class="card-header">Edit Student</h5>
  <div class="card-body">
<form class="" action="{{ route('students.update', $user_info->id) }}" method="POST" name="edit_user">
{{ csrf_field() }}
@method('PATCH')
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Name</strong>
            <input type="text" name="student_name" class="form-control" placeholder="Enter Name" value="{{ $user_info->student_name }}">
            <span class="text-danger">{{ $errors->first('student_name') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>Parent/Guardian</strong>
            <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="Parent">   
            @foreach($user_info2 as $User)
              <option value="{{ $User->id }}">{{ $User->name }}</option>
              @endforeach
            </select>
        </div>
    </div>
    

    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection
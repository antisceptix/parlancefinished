@extends('layouts.app')
 
@section('content')
<div class="col-sm-10">
<div>
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12">
<div class="card">
<h5 class="card-header">Create Student</h5>
  <div class="card-body">
<form action="{{ route('students.store') }}" method="POST" name="add_user">
{{ csrf_field() }}
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Student Name</strong>
            <input type="text" name="student_name" class="form-control" placeholder="Enter Name">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>Parent/Guardian</strong>
            <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="Parent">   
            @foreach($userCRUD2 as $User)
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
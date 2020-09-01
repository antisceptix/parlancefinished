@extends('layouts.app')

@section('content')
<form class="" action="{{ route('studentsclass.store') }}" method="POST" name="add_user">
{{ csrf_field() }}
<div class="col-sm-10">
<div>
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12">
<div class="card">
<h5 class="card-header">Edit User</h5>
<div class="card-body">
<div class="col-md-12">
<div class="form-group">
<strong>Student</strong>
<select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="Parent">   
@foreach($userCRUD as $Student)
<option value="{{ $Student->id }}">{{ $Student->student_name }}</option>
@endforeach
</select>
</div>
</div>
<div class="col-md-12">
<div class="form-group">
<strong>Class</strong>
<select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="FormTutor">   
@foreach($userCRUD2 as $Classes)
<option value="{{ $Classes->id }}">{{ $Classes->classes_name }}</option>
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
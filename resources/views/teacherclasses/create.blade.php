@extends('layouts.app')

@section('content')
<form class="" action="{{ route('teacherclasses.store') }}" method="post" name="add_user">
{{ csrf_field() }}
<div class="col-sm-10">
<div>
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12">
<div class="card">
<h5 class="card-header">Add Teacher To Class</h5>
<div class="card-body">
<div class="form-group">
<strong>Teacher</strong>
<select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="Teacher">   
@foreach($userCRUD as $User)
<option value="{{ $User->id }}">{{ $User->name }}</option>
@endforeach
</select>
</div>
</div>

<div class="col-md-12">
<div class="form-group">
<strong>Class</strong>
<select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="Class">   
@foreach($userCRUD2 as $Classes)
<option value="{{ $Classes->id }}">{{ $Classes->classes_name }}</option>
@endforeach
</select>
</div>
</div>


<div class="col-md-12">
<button type="submit" class="btn btn-primary">Submit</button>
</div>
<br>
</div>
<br>

</form>
@endsection
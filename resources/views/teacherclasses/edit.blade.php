@extends('layouts.app')

@section('content')
<form class="" action="{{ route('teacherclasses.update',['1' => $user_info->id, 'classesclass' => $user_info3->id] ) }}" method="POST" name="edit_class">
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
<h5 class="card-header">Edit class for {{ $user_info->name }} - {{ $user_info3->classes_name }} </h5>
<div class="card-body">
<div class="col-md-12">
<div class="form-group">
<strong>Class</strong>
<select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="Studentclassdropdown">   
@foreach($user_info2 as $Classes)
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
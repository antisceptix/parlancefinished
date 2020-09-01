@extends('layouts.app')
 
@section('content')
<form class="" action="{{ route('adminpanel.update', $user_info->id) }}" method="POST" name="edit_user">
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
  <h5 class="card-header">Edit User</h5>
  <div class="card-body">
<table class="table table-hover" id="laravel_crud">
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Name</strong>
            <input type="text" name="name" class="form-control" placeholder="Enter Name" value="{{ $user_info->name }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>Email</strong>
            <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ $user_info->email }}">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>Role</strong>
            <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="role">   
            @foreach($user_info2 as $adminpanel)
              <option value="{{ $adminpanel->id }}">{{ $adminpanel->name}}</option>
              @endforeach
            </select>
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
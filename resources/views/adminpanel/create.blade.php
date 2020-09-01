@extends('layouts.app')
 
@section('content')
<form class="" action="{{ route('adminpanel.store') }}" method="POST" name="add_user">
{{ csrf_field() }}
<div class="col-sm-10">
<div>
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12">
<div class="card">
  <h5 class="card-header">Create User</h5>
  <div class="card-body">
        <div class="">
            <strong>Name</strong>
            <input type="text" name="name" class="form-control" placeholder="Enter Name">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>Email</strong>
            <input type="text" name="email" class="form-control" placeholder="Enter Email">
            <span class="text-danger">{{ $errors->first('email') }}</span>
        </div>
    </div>

    <div class="col-md-12">
        <div class="form-group">
            <strong>Password</strong>
            <input type="password" name="password" class="form-control" placeholder="Enter Password">
            <span class="text-danger">{{ $errors->first('password') }}</span>
        </div>
    </div>
    
    <div class="col-md-12">
        <div class="form-group">
            <strong>Role</strong>
            <select class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="role">   
            @foreach($userCRUD as $adminpanel)
              <option value="{{ $adminpanel->id }}">{{ $adminpanel->name }}</option>
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
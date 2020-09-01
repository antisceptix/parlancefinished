@extends('layouts.app')

@section('content')
<div class="col-sm-10">
<div>
<a href="{{ route('adminpanel.create') }}" class="btn btn-success mb-2">Add</a> 
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12">
<div class="card">
<h5 class="card-header">User List</h5>
<div class="card-body">
<div class="col-sm-10">
<form action="/adminpanel/search" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q" placeholder="Search users"> 
            <input class="btn btn-primary" type="submit" value="Submit">
        
    </div>
    @error('name')
<p>{{ $message }}</p>
@enderror
</form>
</div>
<br>
<table class="table table-hover table-bordered">
<thead>
<tr>
<th class="table-dark">name</th>
<th class="table-dark">email</th>
<th class="table-dark">role</th>
<td class="table-primary" colspan="2">Action</td>
</tr>
</thead>
<tbody>
@foreach($userCRUD as $adminpanel)
<tr>
<td ><a href="{{ URL('userprofile', $adminpanel->name) }}">{{ $adminpanel->name }}</a></td>
<td >{{ $adminpanel->email }}</td>
@foreach ($adminpanel->roles as $adminrole)
<td >{{ $adminrole->name }}</td>
@endforeach

<td ><a href="{{ route('adminpanel.edit',$adminpanel->id)}}" class="btn btn-primary">Edit</a></td>
<td >
<form action="{{ route('adminpanel.destroy', $adminpanel->id)}}" method="post">
{{ csrf_field() }}
@method('DELETE')
<button class="btn btn-danger" type="submit">Delete</button>
</form>
</td>
</tr>

@endforeach
</tbody>
</table>
{!! $userCRUD->links() !!}
</div> 
</div> 
</div></div>

@endsection  
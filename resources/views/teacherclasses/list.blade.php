@extends('layouts.app')

@section('content')
<div class="col-sm-10">
<div>
<a href="{{ route('teacherclasses.create') }}" class="btn btn-success mb-2">Add</a> 
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12">
<div class="card">
<h5 class="card-header">Classes List</h5>
<div class="card-body">
<div class="col-sm-10">
<form action="/teacherclasses/search" method="POST" role="search">
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
<th class="table-dark">Teacher</th>
<th class="table-dark">Class</th>


<td class="table-primary" colspan="2">Action</td>
</tr>
</thead>
<tbody>
@foreach ($userCRUD as $user)

<tr>
@foreach($user->User as $username)
@if(!empty($username->name))
<td >{{ $username->name }}</td>
<td >{{ $user-> classes_name}}</td>
<td ><a href="{{ route('teacherclasses.edit',['tclass' => $username->id, 'classesclass' => $user->id])}}" class="btn btn-primary">Edit</a></td>
<td >
<form action="{{ route('teacherclasses.destroy',['tclass' => $username->id, 'classesclass' => $user->id])}}" method="post">
{{ csrf_field() }}
@method('DELETE')
<button class="btn btn-danger" type="submit">Delete</button>
</form>
</td>
</tr>
@else
<p class="table-secondary">{{ $username->name }}</p>
@endif
@endforeach

@endforeach

</tbody>
</table>
{!! $userCRUD->links() !!}
</div> 
</div>

@endsection 
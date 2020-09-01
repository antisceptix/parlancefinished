@extends('layouts.app')

@section('content')
<div class="col-sm-10">
<div>
<a href="{{ route('adminpanel.create') }}" class="btn btn-success mb-2">Add</a> 
<a href="{{ route('adminpanel.index') }}" class="btn btn-success mb-2">Back</a> 
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Main Page</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12">
<div class="card">
<h5 class="card-header">Search List {{ $q }}</h5>
<div class="card-body">
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
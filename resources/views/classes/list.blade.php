@extends('layouts.app')

@section('content')
<div class="col-sm-10">
<div>
<a href="{{ route('classes.create') }}" class="btn btn-success mb-2">Add</a> 
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12">
<div class="card">
<h5 class="card-header">Classes List</h5>
  <div class="card-body">
<table class="table table-hover table-bordered">
<thead>
<tr>

<th class="table-dark">Class</th>


<td class="table-primary" colspan="2">Action</td>
</tr>
</thead>
<tbody>
@foreach ($userCRUD as $class)

<td >{{ $class-> classes_name}}</td>
<td ><a href="{{ route('classes.edit',$class->id)}}" class="btn btn-primary">Edit</a></td>
<td >
<form action="{{ route('classes.destroy', $class->id)}}" method="post">
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

@endsection  
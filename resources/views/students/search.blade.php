@extends('layouts.app')

@section('content')

<div class="col-sm-10">
<div>
<a href="{{ route('students.create') }}" class="btn btn-success mb-2">Add</a> 
<a href="{{ route('students.index') }}" class="btn btn-success mb-2">Back</a> 
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Main Page</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12">
<div class="card">
<h5 class="card-header">Students</h5>
  <div class="card-body">
<table class="table table-hover table-bordered">
<thead>
<tr>
<th class="table-dark">Name</th>
<th class="table-dark">Parent/Guardian name</th>



<td class="table-primary" colspan="2">Action</td>
</tr>
</thead>
<tbody>
@foreach ($userCRUD as $students)
<tr>
<td >{{ $students-> student_name}}</td>
@foreach($students->User as $parents)
<td >{{ $parents->name }}</td>
@endforeach

<td ><a href="{{ route('students.edit',$students->id)}}" class="btn btn-primary">Edit</a></td>
<td >
<form action="{{ route('students.destroy', $students->id)}}" method="post">
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
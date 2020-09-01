@extends('layouts.app')

@section('content')
<div class="col-sm-10">
<div>
<a href="{{ route('studentsclass.create') }}" class="btn btn-success mb-2">Add</a> 
<a href="{{ route('studentsclass.index') }}" class="btn btn-success mb-2">Back</a> 
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Main Page</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12">
<div class="card">
<h5 class="card-header">Students Classes</h5>
<div class="card-body">
<table class="table table-hover table-bordered">
<thead>
<tr>
<th class="table-dark">Name</th>
<th class="table-dark">Class</th>


<td class="table-primary" colspan="2">Action</td>
</tr>
</thead>
<tbody>

@foreach ($userCRUD as $students)
@foreach($students->Classes as $classname)  
<tr>
<td class="table-secondary">{{ $students-> student_name}}</td>
<td class="table-secondary">{{ $classname->classes_name }}</td>
<td class="table-primary"><a href="{{ route('studentsclass.edit',['studentsclass' => $students->id, 'classesclass' => $classname->id])}}" class="btn btn-primary">Edit</a></td>
<td class="table-primary">
<form action="{{ route('studentsclass.destroy', ['studentsclass' => $students->id, 'classesclass' => $classname->id] )}}" method="post">
{{ csrf_field() }}
@method('DELETE')
<button class="btn btn-danger" type="submit">Delete</button>
</form>
</td>
</tr>
@endforeach
@endforeach
</tbody>
</table>
{!! $userCRUD->links() !!}
</div> 
</div>

@endsection  
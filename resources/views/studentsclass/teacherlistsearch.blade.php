@extends('layouts.app')

@section('content')
<div class="col-sm-10">
<div>
<a href="{{ route('studentsclass.teacherlist') }}" class="btn btn-success mb-2">Back</a> 
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Main Page</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12">
<div class="card">
<h5 class="card-header">Students Classes</h5>
<div class="card-body">
<div class="col-sm-10">
<form action="/studentsclass/teacherlistsearch" method="POST" role="search">
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
<th class="table-dark">Name</th>
<th class="table-dark">Class</th>
</tr>
</thead>
<tbody>

@foreach ($userCRUD as $students1)
@foreach($students1->Classes as $classnamestudent)
@foreach($profileUser->Classes as $classnameteacher)
<tr>
@if ($classnameteacher->classes_name == $classnamestudent->classes_name)
<td class="table-secondary">{{ $students1->student_name}}</td>
<td class="table-secondary">{{ $classnamestudent->classes_name }}</td>
@endif 
</tr>
@endforeach
@endforeach
@endforeach
</tbody>
</table>
{!! $userCRUD->links() !!}
</div> 
</div>

@endsection  
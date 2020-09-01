@extends('layouts.app')
   
@section('content')
  <a href="{{ route('students.create') }}" class="btn btn-success mb-2">Add</a> 
  <br>
   <div class="row">
        <div class="col-12">
        <div class="generaltable">
          <table class="table table-hover" id="laravel_crud">
           <thead>
              <tr>
                 <th>Name</th>
                 <th>Class</th>
                 
                 
                 <td colspan="2">Action</td>
              </tr>
           </thead>
           <tbody>
              @foreach ($userCRUD as $students)
             
              <tr>
                  <td>{{ $students-> student_name}}</td>
                  
                  
                     @foreach($students->Classes as $classname)
                     <td>{{ $classname->classes_name }}</td>
                     @endforeach
              
                     
                   
                 <td><a href="{{ route('students.edit',$students->id)}}" class="btn btn-primary">Edit</a></td>
                 <td>
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
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Children in Class</h5>
        {{ $userCRUD4->links() }}  
        <table class="table table-bordered" id="laravel_crud">
        <thead>
        <tr>
        
        </tr>
        <tr>
        
        <td class="table-primary" colspan="1">Name</td>
        <td class="table-primary" colspan="1">Class</td>
        <td class="table-primary" colspan="1">Teacher</td>
        </tr>
        </thead>
        <tbody>
       

        @foreach ($parentstoteacher as $students1)
                    @foreach ($allteachers as $teachers1)
                    @foreach ($teachers1->Classes as $teachers1Classes)
                    @foreach ($students1->User as $students1user)
                    @foreach ($students1->Classes as $students1Classes)
                        @if ($students1user->name == $profileUser->name && $students1Classes->classes_name == $teachers1Classes->classes_name )
                            <tr>
                            
                        <td class="table-secondary">{{ $students1->student_name}}</td>
                        <td class="table-secondary">{{ $students1Classes->classes_name}}</td>
                        <td class="table-secondary">{{ $teachers1->name }}</td>
                           
                            </tr>
                        @endif    
                    @endforeach
                    @endforeach
                    @endforeach
                    @endforeach
                    @endforeach
        </tbody>
        
        </table> 
       
    </div>
</div>

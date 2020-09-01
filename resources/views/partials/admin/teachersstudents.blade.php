<div class="card">
<div class="card-body">

<h5 class="card-title">Students in classes</h5>
{{ $userCRUD3->links() }}

    <table class="table table-bordered" id="laravel_crud">
        <thead>
            <tr>
                <td class="table-primary" colspan="1">Name</td>
                <td class="table-primary" colspan="1">Class</td>
            </tr>
        </thead>
    <tbody>
    @foreach ($userCRUD3 as $students1)
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

</div>
</div>

<!-- @extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Hello  {{ Auth::user()->name }}
                    <br>
                    <li><a href="/adminpanel">View User Panel</a></li>
                    <li><a href="/adminpanel/create">Create User</a></li>
                    <li><a href="/password/reset">Reset Password</a></li>
                    <li><a href="/students">Students parents</a></li>
                    <li><a href="/studentsclass">Students Class</a></li>
                    <li><a href="/classes">Teacher Classes</a></li>
                    <li><a href="/userprofile/{{ Auth::user()->name }}">Profile</a></li>
                    

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
 -->
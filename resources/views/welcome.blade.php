
@extends('layouts.app')

@section('content')    
<div class="bg">
<div class="container-fluid">
<div class="card text-center bg-warning text-white mx-auto" style="max-width: 500px;" >
<img class="card-img-top" src="img\Parlance-logos_transparent.png" alt="Card image cap">
<div class="card-body">  
@if (Route::has('login'))
<div>
@auth
<a href="/userprofile/{{ Auth::user()->name }}" class="btn btn-primary">Dashboard</a>
@else
<a href="{{ route('login') }}" class="btn btn-primary">Login</a>
@endauth
</div>
@endif
</div>
</div>
@endsection

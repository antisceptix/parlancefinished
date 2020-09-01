

@extends('layouts.app')

@section('content')
<div class="col-sm-10 col-centered">
<div>
</div>
<div class="card ">
<br>
<div class="col-sm-12">
<div class="card">
<h5 class="card-header">Error</h5>
<div class="card-body">
<div class="col-sm-10">
<h2>{{ $exception->getMessage() }}</h2>
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
</div>
</div> 
</div> 
</div></div>

@endsection  
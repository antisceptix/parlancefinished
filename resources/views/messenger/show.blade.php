@extends('layouts.app')

@section('content')
<div class="col-sm-10">
<div>
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12">
<div class="card">
<h5 class="card-header">{{ $thread->subject }}</h5>
<div class="col-sm-10">
<br>
<div class="card">

</div>
@each('messenger.partials.messages', $thread->messages, 'message')

@include('messenger.partials.form-message')

@stop
@extends('layouts.app')

@section('content')
    @include('messenger.partials.flash')

    
    <div class="col-sm-10">
<div>
<a href="{{ route('messages.create') }}" class="btn btn-success mb-2">New Message</a> 
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
</div>
<div class="card">
<br>
<div class="col-sm-12">
<div class="card">
  <h5 class="card-header">Featured</h5>
  <div class="card-body">
  <div class="col-sm-10">
<form action="/messages/messagesearch" method="POST" role="search">
    {{ csrf_field() }}
    <div class="input-group">
        <input type="text" class="form-control" name="q" placeholder="Search"> 
            <input class="btn btn-primary" type="submit" value="Submit">
        
    </div>
    @error('name')
<p>{{ $message }}</p>
@enderror
</form>
</div>
<br>
          <table class="table table-hover" id="laravel_crud">
          
              <tr>
              <td class="table-primary" colspan="4">Messages</td>
              </tr>
              <tr>
              <td class="table-success" colspan="1">Subject</td>
              <td class="table-info" colspan="1">Read</td>
              <td class="table-success" colspan="1">From</td>
              <td class="table-success" colspan="1">Created</td>
              </tr>
          
    @each('messenger.partials.thread', $threads, 'thread', 'messenger.partials.no-threads')
    </table>
</div>
</div>
@stop
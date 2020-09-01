@extends('layouts.app')

@section('content')
    @include('messenger.partials.flash')
    <div class="row justify-content-center">
    <div class="col-sm-8">
<div class="card">
<div class="col-sm-11">
<h5 class="card-header">Featured</h5>
  <div class="card-body">

<p>XML files can be uploaded from any SIM system.</p>

<p>please check the files show the correct structure as shown below.</p>


        <form action="{{ route('adminpanel.uploadpost') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
  
                <div class="col-md-6">
                    <input type="file" name="file" class="form-control">
                </div>
   
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Upload</button>
                </div>
   
            </div>
   
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        </form>

        
  
     
    <br>

    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
                <p>The following users have been added to Parlance</p>
        </div>
        <br>
       
        @foreach(Session::get('outputarray') as $test)
            @foreach ($test as $key => $value1)
            @foreach ($value1 as $key => $value) 
        {{ $key }} - {{ $value }}  <br/>
        @endforeach
        @endforeach
        @endforeach
       <br>
        
    @endif


    
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
@stop
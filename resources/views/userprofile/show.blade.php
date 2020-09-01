
<div class="navbarlayout">@extends('layouts.app')</div>

@section('content')
<div class="profile-container">

@auth
@foreach ($profileUser->roles as $adminrole)
<!-- ------------------------------------------------------------------------------------------------------------------ -->
@if($adminrole->name == 'admin')
<body>
<div class="row">
                <div class="col-md-3">@include('partials.admin.adminmessagecentre')</div>
                <div class="col-md-9">@include('partials.admin.adminadpanel')</div>
        </div>
        
                
        
        <div class="row">
                <div class="col-md-6"> @include('partials.admin.messagetable')</div>
                <div class="col-md-6"> @include('partials.admin.adminposts')</div>
        </div>
</div>
</body>

@endif
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
@if($adminrole->name == 'teacher')
<body>
<div class="row">
        <div class="col-md-4"> @include('partials.admin.messagetable')</div>
        <div class="col-md-6"> @include('partials.admin.posts')</div>  
</div>
<div class="row">
        <div class="col-md-4">@include('partials.admin.teachermessagecentre')</div>
        <div class="col-md-6">@include('partials.admin.teachersstudents')</div>
</div>
</body>

@endif
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
 @if($adminrole->name == 'parent')
 <div class="row">
 <div class="col-md-6"> @include('partials.admin.messagecentre')</div>
 <div >@include('partials.admin.parentsclasses')</div></div>
<div class="col-md-6"> @include('partials.admin.posts')</div>
</div>
<div class="row">
<div class="col-md-6"> @include('partials.admin.messagetable')</div>

</div>
</div>
</body>
@endif
<!-- ------------------------------------------------------------------------------------------------------------------------ -->
@endforeach
</div>
@endsection
@endauth
@guest

@endguest

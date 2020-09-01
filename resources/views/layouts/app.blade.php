<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<style>

body {

background-color: #000000;
height: 600px;
background-position: center;
background-repeat: no-repeat;
background-size: cover;
position: relative;
}


</style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Parlance') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
<div class="container">
@guest
<a class="navbar-brand" href="{{ url('/') }}">
{{ config('app.name', 'Parlance') }}
</a>
@else
<a class="navbar-brand" href="/userprofile/{{ Auth::user()->name }}">
{{ config('app.name', 'Parlance') }}
</a>
@endguest

<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
<!-- Left Side Of Navbar -->
<ul class="navbar-nav mr-auto">

</ul>

<!-- Right Side Of Navbar -->
<ul class="navbar-nav ml-auto">
<!-- Authentication Links -->
@guest
    <li class="nav-item">
        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
    </li>
    
@else

<a class="nav-link">{{ Auth::user()->name }}</a> 
@endguest
@role('admin')

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Admin Centre
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="/adminpanel">View User Panel</a>
<a class="dropdown-item" href="/students">Students parents</a>
<a class="dropdown-item" href="/studentsclass">Students Classes</a>
<a class="dropdown-item" href="/classes">View Classes</a>
<a class="dropdown-item" href="/teacherclasses">Teachers Classes</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="/adminpanel/create">Create User</a>
<a class="dropdown-item" href="/students/create">Create Student</a>
<a class="dropdown-item" href="/classes/create">Create Class</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="/posts/create">Create Post</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="/adminpanel/upload">User Uploads</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="/password/reset">Reset Password</a>
</div>
</li>

<a class="nav-link"href="/documentation/adminhelp">Documentation</a>      

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Messages
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="/messages">User Messages @include('messenger.unread-count')</a>
<a class="dropdown-item" href="/messages/admininbox">Admin Messages @include('messenger.unread-count-admin')</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="/messages/create">Create Message</a>
</div>
</li>

<li class="nav-item dropdown">
<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
Logout <span class="caret"></span>
</a>

<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
{{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
</div>
</li>
@endrole

@role('roleadmin')
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Admin Centre
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="/adminpanel">View User Panel</a>
<a class="dropdown-item" href="/students">Students parents</a>
<a class="dropdown-item" href="/studentsclass">Students Class</a>
<a class="dropdown-item" href="/classes">Teacher Classes</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="/adminpanel/create">Create User</a>
<a class="dropdown-item" href="/classes/createclass">Create Class</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="/adminpanel/upload">User Uploads</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="/password/reset">Reset Password</a>
</div>
</li>

<a class="nav-link"href="/documentation/adminhelp">Documentation</a>      

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
Messages
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="/messages">User Messages @include('messenger.unread-count')</a>
<a class="dropdown-item" href="/messages/admininbox">Admin Messages @include('messenger.unread-count-admin')</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="/messages/create">Create Message</a>
</div>
</li>

<li class="nav-item dropdown">
<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
Logout <span class="caret"></span>
</a>

<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
{{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
</div>
</li>
@endrole

@role('parent')

<a class="nav-link"href="/documentation/parenthelp">Help</a>      

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Messages</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="/messages">User Messages @include('messenger.unread-count')</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="/messages/create">Create Message</a>
</div>
</li>

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Posts</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="/posts">View All Posts</a>
</div>
</li>

<li class="nav-item dropdown">
<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
Logout <span class="caret"></span>
</a>

<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
{{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
</div>
</li>

@endrole

@role('teacher')
<a class="nav-link"href="/documentation/teacherhelp">Help</a>      

<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Messages</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="/messages">User Messages @include('messenger.unread-count')</a>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="/messages/create">Create Message</a>
</div>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Posts</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="/posts">View All Posts</a>
</div>
</li>
<li class="nav-item dropdown">
<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Classes</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="/studentsclass/teacherlist">View Classes</a>
</div>
</li>

<li class="nav-item dropdown">
<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
Logout <span class="caret"></span>
</a>

<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
<a class="dropdown-item" href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();">
{{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
@csrf
</form>
</div>
</li>
@endrole

</ul>
</div>
</div>
</nav>

<main class="py-4">
@yield('content')
</main>
</div>
</body>
</html>

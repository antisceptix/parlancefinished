@extends('layouts.app')
   
@section('content')
<nav class="navbar" role="navigation" aria-label="main navigation">
      <div class="navbar-brand">
        <a href="{{ route('posts.index') }}" class="navbar-item">
          <img src="{{ asset('img/logo.svg') }}" width="112" height="28" />
        </a>
        <a
          role="button"
          class="navbar-burger"
          aria-label="menu"
          aria-expanded="false"
          data-target="navMenu"
        >
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
          <span aria-hidden="true"></span>
        </a>
      </div>
      <div id="navMenu" class="navbar-menu">
        <div class="navbar-start">
          <a href="{{ route('posts.index') }}" class="navbar-item">
            All Posts
          </a>
        </div>
        <div class="navbar-end">
          <div class="navbar-item">
            <div class="buttons">
              <a href="{{ route('posts.create') }}" class="button is-info">
                <strong>New Post</strong>
              </a>
            </div>
          </div>
        </div>
      </div>
    </nav>

    <section class="section">
      <div class="container">
        <div class="columns is-centered">
          <div class="column is-8">
            @if (session('notification'))
            <div class="notification is-primary">
              {{ session('notification') }}
            </div>
            @endif @yield('content')
          </div>
        </div>
      </div>
    </section>

    <footer class="footer">
      <div class="content has-text-centered">
        <p>
        </p>
      </div>
    </footer>

    <script src="{{ asset('js/nav.js') }}"></script>
  </body>
</html>
   
 @endsection  
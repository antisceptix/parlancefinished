@section('title', 'New Post')
@extends('layouts.app')

@section('content')

<form method="post" action="{{ route('posts.store') }}">


    @csrf
    @include('partials.errors')
    <div class="col-sm-10">
<div>
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
</div>
<div class="card">
<br>
<div class="col-sm-10">
<div class="card">
<h5 class="card-header">Create Post</h5>
<div class="card-body">
    <div class="field">
        <div class="control">
            <input type="text" name="title" value="{{ old('title') }}" class="input" placeholder="Title" minlength="5" maxlength="100" required />
        </div>
    </div>

    <!-- Message Form Input -->
<div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
  var editor_config = {
    selector: "#form-control1",
    plugins: [
      " autolink  link image ",
      
    ],
    toolbar: " link image media",
    relative_urls: false,
    file_browser_callback : function(field_name, url, type, win) {
      var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
      var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

      var cmsURL = "/" + 'laravel-filemanager?field_name=' + field_name;
      if (type == 'image') {
        cmsURL = cmsURL + "&type=Images";
      } else {
        cmsURL = cmsURL + "&type=Files";
      }

      tinyMCE.activeEditor.windowManager.open({
        file : cmsURL,
        title : 'Filemanager',
        width : x * 0.8,
        height : y * 0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
</head>
<br>
<div class="field">
        <div class="control">
      <textarea id="form-control1" class="form-control1" name="content" minlength="5" maxlength="2000" rows="5" id="comment">{{ old('content') }}</textarea>
        </div>
    </div>

 
    <br>
    <div class="field">
        <div class="control">
        <button type="submit" class="btn btn-primary">Publish</button>
        </div>
    </div>

</form>

@endsection
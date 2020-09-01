
<form class="" action="{{ route('messages.update', $thread->id) }}" method="post">
<div class="col-sm-10">

<br>


<h2>Add a new message</h2>
{{ method_field('put') }}
{{ csrf_field() }}

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
        height : y *0.8,
        resizable : "yes",
        close_previous : "no"
      });
    }
  };

  tinymce.init(editor_config);
</script>
<textarea id="form-control1" name="message" class="form-control">{{ old('message') }}</textarea>

</div>
@role('parent')

<div class="checkbox">
</div>

@else

<div class="checkbox">
@foreach($users as $user)
<label title="{{ $user->name }}">
<input type="checkbox" name="recipients[]" value="{{ $user->id }}">{{ $user->name }}
</label>
@endforeach
</div>


@endrole

<!-- Submit Form Input -->
<div class="form-group">
<button type="submit" class="btn btn-primary ">Submit</button>
</div>
</form>

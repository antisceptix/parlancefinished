<div class="content">
<div class="col-sm-10">
<div>
<a class="btn btn-success mb-2" href="/userprofile/{{ Auth::user()->name }}">Back</a> 
</div>
<div class="card">
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-body">
      <a href="{{ route('posts.show', $post) }}">
      <h1 class="title">{{ $post->title }}</h1>
    </a>
        <p><b>Posted:</b> {{ $post->created_at->diffForHumans() }}</p>
        <p class="card-text">
        {!! html_entity_decode($post->content) !!}
        </p>
        @role('admin')
        

        <form action="{{ route('posts.destroy', $post->id)}}" method="post">
        {{ csrf_field() }}
        @method('DELETE')
        <a href="{{ route('posts.edit', $post)}}" class="btn btn-primary"> Edit</a>
        <button class="btn btn-danger" type="submit">Delete</button>
        </form>

       

        

        @endrole
  
  </form>
      </div>
    </div>
  </div>
</div>
<div class="card">
<div class="card-body">
<h5 class="card-title">Posts</h5>


{{ $sposts->links() }} 
@foreach ($sposts as $post)

<div class="card">
<div class="card-body">
<a href="{{ route('posts.show', $post) }}">
<h1 class="title">{{ $post->title }}</h1>
<p><b>Posted:</b> {{ $post->created_at->diffForHumans() }}</p>
<p class="card-text">{!!  substr(strip_tags($post->content), 0, 150) !!}.....</p>
</a>
<form method="post" action="{{ route('posts.destroy' , $post) }}">
@csrf @method('delete')
<a href="{{ route('posts.edit', $post)}}" class="btn btn-primary"> Edit</a>
<button class="btn btn-danger" type="submit">Delete</button>
<a class="btn btn-success" href="/posts">View all posts</a>
</form>
</div> 
</div>

@endforeach
</div>
</div>

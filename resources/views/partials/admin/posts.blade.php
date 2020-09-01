<div class="card col">
<div class="card-body">
<h5 class="card-title">Posts</h5>
{{ $sposts->links() }} 

@foreach ($sposts as $post)


<a href="{{ route('posts.show', $post) }}">
<h1 class="title">{{ $post->title }}</h1>
<p><b>Posted:</b> {{ $post->created_at->diffForHumans() }}</p>
<p><b>Category:</b> {{ $post->category }}</p>
<p class="card-text">{!!  substr(strip_tags($post->content), 0, 150) !!}.....</p>
</a>
<a class="btn btn-success mb-2" href="/posts">View all posts</a> 


</form>


@endforeach
</div>
</div>
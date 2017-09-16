<div class="well">

	<h2>
		<a href="/posts/{{$post->id}}">
			{{ $post->title }}
		</a>
	</h2>

	@include('inc.creationDate')

	<p>{!! $post->body !!}</p>
	
</div>
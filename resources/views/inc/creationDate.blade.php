<p>
	<small>
		<b>Written</b> 
		{{ $post->created_at->diffForHumans() }}
		<b>on</b> 
		{{ $post->created_at->format('M/d/Y') }}
		<b>by</b>
		{{ $post->user->name }}
	</small>
</p>
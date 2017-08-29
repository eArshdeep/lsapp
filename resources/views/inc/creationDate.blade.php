<p>
	<small>
		Written 
		{{ $post->created_at->diffForHumans() }}
		on 
		{{ $post->created_at->format('M/d/Y') }} 
	</small>
</p>
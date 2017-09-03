<p>
	<small>
		<b>Updated</b>
		{{ $post->updated_at->diffForHumans() }}
		<b>On</b>
		{{ $post->updated_at->format('M/d/Y') }} 
	</small>
</p>
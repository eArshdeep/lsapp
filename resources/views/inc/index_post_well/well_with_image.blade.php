<div class="well">
	<div class="row">
		<div class="col-md-4 col-sm-4">
			<img src="/storage/cover_images/{{ $post->cover_image }}" style="width:100%">
		</div>
		<div class="col-md-8 col-sm-8">
			<h2>
				<a href="/posts/{{$post->id}}">
					{{ $post->title }}
				</a>
			</h2>
			@include('inc.creationDate')
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<p>{!! $post->body !!}</p>
		</div>
	</div>
</div>
@extends('layouts.app')

@section('content')

	<h1>Posts</h1>

	@if( count($posts) > 0)

		@foreach($posts as $post)

			<div class="well">
				<h2>
					<a href="/posts/{{$post->id}}">
						{{ $post->title }}
					</a>
				</h2>

				@include('inc.creationDate')

				<p>{!! $post->body !!}</p>
			</div>

		@endforeach

		{{ $posts->links() }}

	@else
		<p>No posts found to show... yet</p>
	@endif

@endsection
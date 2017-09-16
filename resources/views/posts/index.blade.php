@extends('layouts.app')

@section('content')

	<h1>Posts</h1>

	@if( count($posts) > 0)

		@foreach($posts as $post)

			@if ( $post->cover_image == 'noimage.jpg' )
				@include('inc.index_post_well.well_without_image')
			@else
				@include('inc.index_post_well.well_with_image')
			@endif

		@endforeach

		{{ $posts->links() }}

	@else
		<p>No posts found to show... yet</p>
	@endif

@endsection
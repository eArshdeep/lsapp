@extends('layouts.app')

@section('content')

	<a href="{{ URL::previous() }}" class="btn btn-default"> &larr; Back </a>

	<h1> {{ $post->title }} </h1>

	@include('inc.creationDate')
	@include('inc.updateDate')

	@if ( $post->cover_image != 'noimage.jpg' )
		<img src="/storage/cover_images/{{ $post->cover_image }}" style="width:100%">
	@endif

	<div class="seperator"></div>

	<div class="blog-body">
		{!! $post->body !!}
	</div>

	@if ( Auth::check() )
		<hr>
		<div class="pull-right margin-adder-bottom">
			@if( Auth::user()->id == $post->user_id )
				<a href="/posts/{{ $post->id }}/edit" class="btn btn-default" style="margin-right:15px">Edit</a>
				@include('inc.pageDeleteBtn')
			@else
				<p>You do not have access to modify or remove this post as it was not written by you.</p>
			@endif
		</div>
	@endif

@endsection
@extends('layouts.app')

@section('content')

	<a href="/posts" class="btn btn-default"> &larr; Posts </a>	

	<h1> {{ $post->title }} </h1>

	@include('inc.creationDate')
	@include('inc.updateDate')

	<div>
		{!! $post->body !!}
	</div>

	<hr>

	<a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit</a>

	@include('inc.pageDeleteModal')

@endsection
@extends('layouts.app')

@section('content')

	<a href="{{ URL::previous() }}" class="btn btn-default"> &larr; Back </a>

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
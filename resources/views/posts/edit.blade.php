@extends('layouts.app')

@section('content')

	<a href="{{ URL::previous() }}" class="btn btn-default"> &larr; Back </a>

	<h1> Modify Post </h1>

	{!! Form::open( [ 'action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data' ] ) !!}

		<div class="form-group">

			{{ Form::label('title', 'Titile') }}
			{{ Form::text('title', $post->title, [ 'class' => 'form-control', 'placeholder' => 'Post title' ]) }}

		</div>

		<div class="form-group">

			{{ Form::label('body', 'Body') }}
			{{ Form::textarea('body', $post->body, [ 'class' => 'form-control', 'placeholder' => 'Body Text', 'id' => 'useCKEditor' ]) }}

		</div>

		<div class="form-group">
			{{ Form::file('cover_image') }}
		</div>

		{{ Form::hidden('_method', 'PUT') }}

		{{ Form::submit('Update', [ 'class' => 'btn btn-primary' ]) }}

	{!! Form::close() !!}

@endsection
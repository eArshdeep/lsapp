@extends('layouts.app')

@section('content')

	<a href="{{ URL::previous() }}" class="btn btn-default"> &larr; Back </a>

	<h1>Create a post</h1>

	{!! Form::open( [ 'action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data' ] ) !!}

		<div class="form-group">

			{{ Form::label('title', 'Titile') }}
			{{ Form::text('title', '', [ 'class' => 'form-control', 'placeholder' => 'Post title' ]) }}

		</div>

		<div class="form-group">

			{{ Form::label('body', 'Body') }}
			{{ Form::textarea('body', '', [ 'class' => 'form-control', 'placeholder' => 'Body Text', 'id' => 'useCKEditor' ]) }}

		</div>

		<div class="form-group">
			{{ Form::file('cover_image') }}
		</div>

		{{ Form::submit('Create', [ 'class' => 'btn btn-primary' ]) }}

	{!! Form::close() !!}

@endsection
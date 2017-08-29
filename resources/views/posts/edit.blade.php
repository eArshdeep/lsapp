@extends('layouts.app')

@section('content')

	<a href="/posts/{{ $post->id }}" class="btn btn-default"> &larr; Cancel </a>	

	<h1> Modify Post </h1>

	{!! Form::open( [ 'action' => ['PostsController@update', $post->id ], 'method' => 'POST' ] ) !!}
    
		<div class="form-group">

			{{ Form::label('title', 'Titile') }}
			{{ Form::text('title', $post->title, [ 'class' => 'form-control', 'placeholder' => 'Post title' ]) }}

		</div>

		<div class="form-group">

			{{ Form::label('body', 'Body') }}
			{{ Form::textarea('body', $post->body, [ 'class' => 'form-control', 'placeholder' => 'Body Text', 'id' => 'useCKEditor' ]) }}

		</div>

		{{ Form::hidden('_method', 'PUT') }}

		{{ Form::submit('Update', [ 'class' => 'btn btn-primary' ]) }}

	{!! Form::close() !!}

@endsection
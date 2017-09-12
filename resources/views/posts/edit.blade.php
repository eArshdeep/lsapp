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

		<div class="row margin-adder-bottom">
            <div class="col-sm-6 col-md-6 col-lg-4 mt-4">
                <div class="card">
					<img class="card-img-top" src="/storage/cover_images/{{ $post->cover_image }}">
                    <div class="card-block">
                        <h4 class="card-title">Cover Image</h4>
						<div class="meta">
                            <span id="fileName"></span>
                        </div>
                        <div class="card-text">
                            Upload a new cover image, remove your existing cover image or leave it alone!
                        </div>
                    </div>
                    <div class="card-footer">
						<label class="btn btn-default btn-file">
							Upload New <input type="file" id="imageInput" name="cover_image" style="display: none;">
						</label>
						<a class="btn btn-default" onclick="restoreImg( '{{ "/storage/cover_images/" . $post->cover_image }}' )" >Restore</a>
						<a class="btn btn-danger">Remove</a>
                    </div>
                </div>
            </div>
		</div>

		{{ Form::hidden('_method', 'PUT') }}

		{{ Form::submit('Update', [ 'class' => 'btn btn-primary' ]) }}

	{!! Form::close() !!}

@endsection
{!! Form::open([ 
	'action' => 
	[
		'PostsController@destroy',
		$post->id 
	],
	'method' => 'POST',
	'style' => 'display:inline-block'
]) !!}

	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::submit('Delete', [ 'class' => 'btn btn-danger', "id" => "pageDeleteBtn" ]) }}

{!! Form::close() !!}
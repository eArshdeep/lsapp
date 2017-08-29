{!! Form::open([ 
	'action' => 
	[
		'PostsController@destroy',
		$post->id 
	],
	'method' => 'POST',
	'class' => 'pull-right' 
]) !!}

	{{ Form::hidden('_method', 'DELETE') }}
	{{ Form::submit('Delete', [ 'class' => 'btn btn-danger', 'onclick' => 'return confirm(\'Are you sure?\')' ]) }}

{!! Form::close() !!}
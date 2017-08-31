@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>
    <div class="panel-body">
        <div class="page-header">
            {{--  Btn Aligned Right  --}}
            <div class="pull-right">
                <a href="/posts/create" class="btn btn-default">New Post</a>
            </div>
            {{--  Heading  --}}
            <h1>Your Posts</h1>
        </div>
        {{--  Show Child Posts  --}}
        @if ( count($post_set) > 0 )
            <table class="table table-striped">
                {{--  table structure  --}}
                <tr>
                    <th>Title</th>
                    <th></th>
                    <th></th>
                </tr>
                {{--  loop through post set  --}}
                @foreach ($post_set as $post)
                    <tr>
                        <td> {{ $post->title }} </td>
                        <td> <a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit</a> </td>
                        <td> @include('inc.pageDeleteBtn') </td>
                    </tr>
                @endforeach
            </table>
        @else
            <p>You have no written posts to show... yet!</p>
        @endif
    </div>
</div>

@endsection
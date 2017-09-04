@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>
    <div class="panel-body">
        <div class="page-header">
            <div class="pull-right">
                <a href="/posts/create" class="btn btn-primary">New Post</a>
            </div>
            <h1>Your Posts</h1>
        </div>
        @include('inc.dashboardChildPosts')
    </div>
</div>

@endsection
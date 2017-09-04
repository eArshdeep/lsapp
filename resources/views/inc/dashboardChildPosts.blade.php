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
                <td> <a href="/posts/{{ $post->id }}" class="unstyle-anchor"> {{ $post->title }} </a> </td>
                <td class="td-act-btn"> <a href="/posts/{{ $post->id }}/edit" class="btn btn-default">Edit</a> </td>
                <td class="td-act-btn"> @include('inc.pageDeleteBtn') </td>
            </tr>
        @endforeach
    </table>
@else
    <p>You have no written posts to show... yet!</p>
@endif
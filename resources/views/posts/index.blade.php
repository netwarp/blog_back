@extends('_layout')

@section('content')
    <div class="card">
        <div class="card-body">
            <h1>Posts</h1>
            <div class="my-3">
                <a href="{{ action([\App\Http\Controllers\PostsController::class, 'create']) }}" class="btn btn-primary">New post</a>
            </div>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Preview</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                </tr>
                </thead>
                <tbody>
                @forelse($posts as $post)
                    <tr>
                        <td>{{ $post->id ?? '' }}</td>
                        <td><a href="/posts/{{ $post->id }}/edit">{{ $post->preview ?? '' }}</a></td>
                        <td>{{ $post->created_at ?? '' }}</td>
                        <td>{{ $post->updated_at ?? '' }}</td>
                    </tr>
                @empty
                    <td colspan="3">No post available</td>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>

@endsection

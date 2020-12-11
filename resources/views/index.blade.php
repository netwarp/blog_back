@extends('_layout')

@section('content')
    <h1>Welcome</h1>

    <table class="table">
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
                    <td>{{ $post->preview ?? '' }}</td>
                    <td>{{ $post->created_at ?? '' }}</td>
                    <td>{{ $post->updated_at ?? '' }}</td>
                </tr>
            @empty
                <td colspan="3">No post available</td>
            @endforelse
        </tbody>
    </table>
@endsection

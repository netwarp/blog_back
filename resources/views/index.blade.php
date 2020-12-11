@extends('_layout')

@section('content')
    <h1>Welcome</h1>
    <div class="row">
        <div class="col-md-9">
            @forelse($posts as $post)
                <div class="card my-3">
                    <div class="card-body">
                        <div>{{ $post->id ?? '' }}</div>
                        <div>{{ $post->preview ?? '' }}</div>
                        <div>{{ $post->created_at ?? '' }}</div>
                        <div>{{ $post->updated_at ?? '' }}</div>
                    </div>
                </div>
            @empty
                <div>No post available</div>
            @endforelse
        </div>
        <div class="col-md">
            <div class="card my-3">
                <div class="card-body">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus doloremque, eos error, facilis fugit maiores optio placeat quisquam ratione sint tempore unde ut voluptates? Consequuntur harum impedit magni minima tempora?
                </div>
            </div>
        </div>
    </div>

@endsection

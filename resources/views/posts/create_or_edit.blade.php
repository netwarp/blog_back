@extends('_layout')

@section('content')
    <div class="d-flex justify-content-between flex align-items-center">
        <h1>New Post</h1>
        @if (isset($post))
            <form action="/posts/{{ $post->id }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        @endif
    </div>
    <form action="/posts" method="POST">
        @csrf

        <div class="form-group my-3">
            <label for="preview">Preview</label>
            <textarea name="preview" id="preview" rows="6" class="form-control">{{ $post->preview ??'' }}</textarea>
        </div>

        <div class="form-group my-3">
            <label for="content">Content</label>
            <textarea name="content" id="content" rows="8" class="form-control">{{ $post->content ?? '' }}</textarea>
        </div>

        <div class="form-group my-3">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
        </div>
    </form>
@endsection

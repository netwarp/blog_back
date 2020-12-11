@extends('_layout')

@section('content')
    <h1>New Post</h1>
    <form action="/posts" method="POST">
        @csrf

        <div class="form-group my-3">
            <label for="preview">Preview</label>
            <textarea name="preview" id="preview" rows="6" class="form-control"></textarea>
        </div>

        <div class="form-group my-3">
            <label for="content">Content</label>
            <textarea name="content" id="content" rows="8" class="form-control"></textarea>
        </div>

        <div class="form-group my-3">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Send</button>
        </div>
    </form>
@endsection

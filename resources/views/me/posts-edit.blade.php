@extends('layouts.app')

@section('title', 'Nagham Blog |  Edit Post')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create-post.css') }}">
@endsection

@section('content')
    <div class="create-wrap">
        <div class="create-card">
            <h1 class="create-title">Edit Post</h1>

            @if ($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('me.posts.update', $post->id) }}" enctype="multipart/form-data" class="create-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Title</label>
                    <input class="form-input" type="text" name="title" value="{{ old('title', $post->title) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Description</label>
                    <textarea class="form-input form-textarea" name="description" rows="5" required>{{ old('description', $post->description) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Image</label>
                    <input class="form-input file-input" type="file" name="image" accept="image/*">
                    <p class="hint">Leave empty to keep current image.</p>
                </div>

                <div class="form-actions">
                    <a href="{{ route('me') }}" class="secondary-btn">Cancel</a>
                    <button class="primary-btn" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>
@endsection

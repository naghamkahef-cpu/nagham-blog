@extends('layouts.app')

@section('title', 'Nagham Blog | Create Post')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
  <link rel="stylesheet" href="{{ asset('css/create-post.css') }}">
@endsection

@section('content')
  <div class="create-wrap">
    <div class="create-card">
      <h1 class="create-title">Create Post</h1>

      {{-- Errors --}}
      @if ($errors->any())
        <div class="error-box">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="create-form">
        @csrf

        {{-- Title --}}
        <div class="form-group">
          <label for="title" class="form-label">Post title</label>
          <input
            id="title"
            type="text"
            name="title"
            class="form-input"
            value="{{ old('title') }}"
            required
          >
        </div>

        {{-- Description --}}
        <div class="form-group">
          <label for="description" class="form-label">Description</label>
          <textarea
            id="description"
            name="description"
            class="form-input form-textarea"
            rows="4"
            placeholder="Write a short description..."
            required
          >{{ old('description') }}</textarea>
        </div>

        {{-- Image --}}
        <div class="form-group">
          <label for="image" class="form-label">Post image</label>
          <input
            id="image"
            type="file"
            name="image"
            class="form-input file-input"
            accept="image/*"
          >
          <p class="hint">PNG, JPG, or WEBP. Recommended: 1200×700</p>
        </div>

        <div class="form-actions">
          <a href="{{ route('posts') }}" class="secondary-btn">Cancel</a>
          <button type="submit" class="primary-btn">Publish</button>
        </div>
      </form>
    </div>
  </div>
@endsection

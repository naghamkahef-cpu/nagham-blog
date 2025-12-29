@extends('layouts.app')

@section('title', 'Nagham Blog | Post')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
  <link rel="stylesheet" href="{{ asset('css/post-show.css') }}">
@endsection

@section('content')
  @php
      use Illuminate\Support\Facades\Storage;

      $avatar = $post->user?->image_path
          ? Storage::url($post->user->image_path)
          : asset('images/default-avatar.png');

      $postImg = $post->image_path
          ? Storage::url($post->image_path)
          : null;

      $date = $post->created_at ? $post->created_at->format('d M Y') : '';
  @endphp

  <section class="show-wrap">
    <article class="post-card-big">

      <div class="author-row">
        <a class="author-avatar-link" href="{{ $post->user ? route('users.show', $post->user) : '#' }}">
          <img class="author-avatar" src="{{ $avatar }}" alt="Author avatar">
        </a>

        <div class="author-meta">
          <a class="author-name" href="{{ $post->user ? route('users.show', $post->user) : '#' }}">
            {{ $post->user?->name ?? 'Unknown User' }}
          </a>
          <span class="author-date">{{ $date }}</span>
        </div>
      </div>

      <h1 class="post-title-big">{{ $post->title }}</h1>

      <p class="post-desc-big">{{ $post->description }}</p>

      @if($postImg)
        <div class="post-image-wrap-big">
          <img class="post-image-big" src="{{ $postImg }}" alt="Post image">
        </div>
      @endif

      <div class="post-actions">
        <a href="{{ route('posts') }}" class="secondary-btn">← Back to posts</a>
      </div>

    </article>
  </section>
@endsection

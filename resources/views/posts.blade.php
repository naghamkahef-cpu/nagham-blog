@extends('layouts.app')

@section('title', 'Nagham Blog | Posts')

@section('styles')
  <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
@endsection

@section('content')

  {{-- Page header --}}
  <header class="page-head">
    <div class="page-head-left">
      <h1 class="page-title">All Posts</h1>
      <p class="page-subtitle">Discover the latest posts from our writers.</p>
    </div>

    <div class="page-head-right">
      <a href="{{ route('post.create') }}" class="primary-btn">
        + Create Post
      </a>
    </div>
  </header>

  {{-- Posts --}}
  <section class="posts-grid">
    @forelse($posts as $post)
      <article class="post-card">

        {{-- Top row (author) --}}
        <div class="post-head">
          <a class="avatar-link" href="{{ $post->user ? route('users.show', $post->user) : '#' }}">
            <img
              class="avatar"
              src="{{ $post->user?->image_path ? asset('storage/'.$post->user->image_path) : asset('images/default-avatar.png') }}"
              alt="User avatar"
              loading="lazy"
            >
          </a>

          <div class="user-meta">
            <a class="username" href="{{ $post->user ? route('users.show', $post->user) : '#' }}">
              {{ $post->user?->name ?? 'Unknown User' }}
            </a>
            <span class="date">
              {{ optional($post->created_at)->format('d M Y') ?? '' }}
            </span>
          </div>
        </div>

        {{-- Title --}}
        <h2 class="post-title">
          <a class="post-title-link" href="{{ route('posts.show', $post) }}">
            {{ $post->title ?? 'Untitled post' }}
          </a>
        </h2>

        {{-- Description --}}
        <p class="post-desc">
          {{ $post->description ?? $post->body ?? '' }}
        </p>

        {{-- Image --}}
        @if($post->image_path)
          <a class="post-image-wrap" href="{{ route('posts.show', $post) }}">
            <img
              class="post-image"
              src="{{ asset('storage/'.$post->image_path) }}"
              alt="Post image"
              loading="lazy"
            >
          </a>
        @endif

        {{-- Footer --}}
        <div class="post-foot">
          <a class="read-more" href="{{ route('posts.show', $post) }}">
            Read more <span aria-hidden="true">→</span>
          </a>
        </div>

      </article>
    @empty
      <div class="empty-state">
        <h3>No posts yet</h3>
        <p>Create your first post to see it here.</p>

        <div class="empty-actions">
          <a href="{{ route('post.create') }}" class="primary-btn">+ Create Post</a>
        </div>
      </div>
    @endforelse
  </section>

  {{-- Pagination --}}
  @if(method_exists($posts, 'links'))
    <div class="pagination-wrap">
      {{ $posts->links('components.pagination') }}
    </div>
  @endif

@endsection

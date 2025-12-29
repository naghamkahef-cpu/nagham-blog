@extends('layouts.app')

@section('title', 'Nagham Blog | Posts')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
@endsection

@section('content')
<div class="page-actions">
            <a href="{{route('post.create')}}" class="primary-btn">Create Post</a>
        </div>

        <section class="posts-grid">

            @forelse($posts as $post)
                <article class="post-card">
                    <div class="post-head">
                        {{-- Avatar (بدّلي الحقول حسب مشروعك) --}}
                     <img class="avatar"
     src="{{ $post->user?->image_path ? asset('storage/'.$post->user->image_path) : asset('images/default-avatar.png') }}"
     alt="User avatar" />

                        <div class="user-meta">
                            {{-- Username رابط (#) حسب طلبك --}}
                            <a class="username" href="{{ $post->user ? route('users.show', $post->user) : '#' }}">
    {{ $post->user?->name ?? 'Unknown User' }}
</a>

                            <span class="date">
                                {{ optional($post->created_at)->format('d M Y') ?? '' }}
                            </span>
                        </div>
                    </div>

                   <h2 class="post-title">
  <a href="{{ route('posts.show', $post) }}" style="color:inherit; text-decoration:none;">
      {{ $post->title ?? 'Untitled post' }}
  </a>
</h2>

                    <p class="post-desc">
                        {{ $post->description ?? $post->body ?? '' }}
                    </p>

                    {{-- Post image --}}
  @if($post->image_path)
    <div class="post-image-wrap">
        <img class="post-image" src="{{ asset('storage/'.$post->image_path) }}" alt="Post image" />
    </div>
@endif
                
                </article>
            @empty
                <div class="empty-state">
                    <h3>No posts yet</h3>
                    <p>Create your first post to see it here.</p>
                </div>
            @endforelse

        </section>

        {{-- Pagination (إذا $posts paginate()) --}}
        @if(method_exists($posts, 'links'))
            <div class="pagination-wrap">
                {{ $posts->links() }}
            </div>
        @else
            {{-- Mock pagination إذا كانت Collection --}}
            <div class="pagination-mock">
                <a href="#" class="page-pill">‹ Prev</a>
                <a href="#" class="page-pill active">1</a>
                <a href="#" class="page-pill">2</a>
                <a href="#" class="page-pill">3</a>
                <a href="#" class="page-pill">Next ›</a>
            </div>
        @endif

@endsection

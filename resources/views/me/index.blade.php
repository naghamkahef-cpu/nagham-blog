@extends('layouts.app')

@section('title', 'Nagham Blog | Me')

@section('styles')

    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/me.css') }}">

@endsection



@section('content')

@php
    $avatar = $user->image_path
        ? asset('storage/'.$user->image_path)
        : asset('images/default-avatar.png');

    $birth = $user->birth_date ? \Carbon\Carbon::parse($user->birth_date)->format('d M Y') : '—';
@endphp

@if(session('success'))
    <div class="success-box">{{ session('success') }}</div>
@endif

<section class="me-grid">

    <!-- Profile Card -->
    <article class="me-card">
        <div class="me-head">
            <img class="me-avatar" src="{{ $avatar }}" alt="Avatar">
            <div class="me-meta">
                <h1 class="me-name">{{ $user->name }}</h1>
                <div class="me-email">{{ $user->email }}</div>
            </div>
        </div>

        <div class="me-info">
            <div class="me-row">
                <span class="me-label">Birth date</span>
                <span class="me-value">{{ $birth }}</span>
            </div>

            <div class="me-row me-row-bio">
                <span class="me-label">Bio</span>
                <p class="me-bio">{{ $user->bio ?? 'No bio added yet.' }}</p>
            </div>
        </div>

        <div class="me-actions">
            <a href="{{ route('me.edit') }}" class="primary-btn">Edit Profile</a>
            <button class="danger-btn" type="button" onclick="document.getElementById('deleteAccountModal').showModal()">
                Delete Account
            </button>
        </div>
    </article>

    <!-- My Posts -->
    <article class="me-card">
        <div class="me-posts-head">
            <h2 class="me-posts-title">My Posts</h2>
            <span class="me-posts-count">{{ $posts->total() }} post(s)</span>
        </div>

        @if($posts->count())
            <ul class="me-posts-list">
                @foreach($posts as $p)
                    <li class="me-post-item">
                        <div class="me-post-main">
                            <a class="me-post-link" href="{{ route('posts.show', $p->id) }}">
                                {{ $p->title }}
                            </a>
                            <span class="me-post-date">{{ optional($p->created_at)->format('d M Y') }}</span>
                        </div>

                        <div class="me-post-actions">
                            <a class="mini-btn" href="{{ route('me.posts.edit', $p->id) }}">Edit</a>

                            <form method="POST" action="{{ route('me.posts.destroy', $p->id) }}"
                                  onsubmit="return confirm('Delete this post?');">
                                @csrf
                                @method('DELETE')
                                <button class="mini-btn danger" type="submit">Delete</button>
                            </form>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="pagination-wrap">
                {{ $posts->links() }}
            </div>
        @else
            <div class="empty-mini">
                <h3>No posts yet</h3>
                <p>Create your first post to see it here.</p>
            </div>
        @endif
    </article>

</section>
@endsection
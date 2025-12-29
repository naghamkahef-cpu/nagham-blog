@extends('layouts.app')

@section('title', 'Nagham Blog | User Profile')

@section('styles')

    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/user-show.css') }}">
@endsection

<!-- ================= TOP NAV ================= -->
@section('content')
@php
    $avatar = $user->image_path
        ? asset('storage/'.$user->image_path)
        : asset('images/default-avatar.png');

    $birth = $user->birth_date
        ? \Carbon\Carbon::parse($user->birth_date)->format('d M Y')
        : '—';
@endphp

<section class="profile-wrap">

    <!-- ===== Profile Card ===== -->
    <article class="profile-card">
        <div class="profile-head">
            <img class="profile-avatar" src="{{ $avatar }}" alt="User avatar">

            <div class="profile-meta">
                <h1 class="profile-name">{{ $user->name }}</h1>
                <div class="profile-email">{{ $user->email }}</div>
            </div>
        </div>

        <div class="profile-info">

            <div class="info-row">
                <span class="info-label">Email</span>
                <span class="info-value">{{ $user->email }}</span>
            </div>

            <div class="info-row">
                <span class="info-label">Birth date</span>
                <span class="info-value">{{ $birth }}</span>
            </div>

            <div class="info-row info-row-bio">
                <span class="info-label">Bio</span>
                <p class="info-bio">{{ $user->bio ?? 'No bio added yet.' }}</p>
            </div>

        </div>
    </article>

    <!-- ===== User Posts ===== -->
    <article class="user-posts-card">
        <div class="user-posts-head">
            <h2 class="user-posts-title">Posts by {{ $user->name }}</h2>
            <span class="user-posts-count">{{ $posts->count() }} post(s)</span>
        </div>

        @if($posts->count())
            <ul class="posts-list">
                @foreach($posts as $p)
                    <li class="posts-item">
                        <a class="post-link" href="{{ route('posts.show', $p->id) }}">
                            {{ $p->title ?? 'Untitled post' }}
                        </a>
                        <span class="post-date">{{ optional($p->created_at)->format('d M Y') }}</span>
                    </li>
                @endforeach
            </ul>
        @else
            <div class="empty-mini">
                <h3>No posts yet</h3>
                <p>This user hasn’t published anything.</p>
            </div>
        @endif
    </article>

</section>

@endsection


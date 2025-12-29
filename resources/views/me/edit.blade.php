@extends('layouts.app')

@section('title', 'Nagham Blog |  Edit Profile')

@section('styles')


    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/create-post.css') }}">
@endsection


@section('content')

    <div class="create-wrap">
        <div class="create-card">
            <h1 class="create-title">Edit Profile</h1>

            @if ($errors->any())
                <div class="error-box">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('me.update') }}" enctype="multipart/form-data" class="create-form">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input class="form-input" type="text" name="name" value="{{ old('name', $user->name) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input class="form-input" type="email" name="email" value="{{ old('email', $user->email) }}" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Birth date</label>
                    <input class="form-input" type="date" name="birth_date" value="{{ old('birth_date', $user->birth_date) }}">
                </div>

                <div class="form-group">
                    <label class="form-label">Bio</label>
                    <textarea class="form-input form-textarea" name="bio" rows="4">{{ old('bio', $user->bio) }}</textarea>
                </div>

                <div class="form-group">
                    <label class="form-label">Avatar</label>
                    <input class="form-input file-input" type="file" name="image" accept="image/*">
                </div>

                <div class="form-actions">
                    <a href="{{ route('me') }}" class="secondary-btn">Cancel</a>
                    <button class="primary-btn" type="submit">Save</button>
                </div>
            </form>
        </div>
    </div>

@endsection
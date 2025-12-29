<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyPostController extends Controller
{
    private function authorizeOwner(Post $post): void
    {
        abort_unless($post->user_id === Auth::id(), 403);
    }

    public function edit(Post $post)
    {
        $this->authorizeOwner($post);

        return view('me.posts-edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorizeOwner($post);

        $data = $request->validate([
            'title'       => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'image'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $data['image_path'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        return redirect()->route('me')->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        $this->authorizeOwner($post);

        $post->delete();

        return back()->with('success', 'Post deleted!');
    }
}

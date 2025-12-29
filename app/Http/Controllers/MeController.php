<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class MeController extends Controller
{
    public function index()
    {
        /** @var User $user */
        $user = Auth::user();

        $posts = $user->posts()->latest()->paginate(10);

        return view('me.index', compact('user', 'posts'));
    }

    public function edit()
    {
        /** @var User $user */
        $user = Auth::user();

        return view('me.edit', compact('user'));
    }

    public function update(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $data = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'email'      => ['required', 'email', 'max:255'],
            'birth_date' => ['nullable', 'date'],
            'bio'        => ['nullable', 'string', 'max:1000'],
            'image'      => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('users', 'public');
            $data['image_path'] = $path;
        }

        // بدل update()
        $user->fill($data);
        $user->save();

        return redirect()->route('me')->with('success', 'Profile updated!');
    }

    public function destroy(Request $request)
    {
        /** @var User $user */
        $user = Auth::user();

        $request->validate([
            'password' => ['required', 'current_password'],
        ]);

        Auth::logout();
        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Account deleted.');
    }
}

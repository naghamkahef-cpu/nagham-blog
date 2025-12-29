<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
{
    $posts = $user->Posts()
        ->latest()
        ->get();

    return view('user.show', compact('user', 'posts'));
}
}

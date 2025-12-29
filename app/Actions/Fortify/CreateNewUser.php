<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    public function create(array $input): User
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class, 'email')],
            'birth_date' => ['nullable', 'date'],
            'bio' => ['nullable', 'string', 'max:1000'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ])->validate();

        $imagePath = null;

        // ✅ الملف اسمه image (من الفورم)
        if (request()->hasFile('image')) {
            request()->validate([
                'image' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            ]);

            $imagePath = request()->file('image')->store('users', 'public');
        }

        return User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'birth_date' => $input['birth_date'] ?? null,
            'bio' => $input['bio'] ?? null,

            // ✅ اسم العمود بالداتا بيز
            'image_path' => $imagePath,
        ]);
    }
}

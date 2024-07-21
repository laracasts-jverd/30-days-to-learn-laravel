<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store()
    {
        $attributes = request(null)->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email', 'max:254'],
            'password' => ['required', Password::min(12)->mixedCase()->letters()->numbers()->symbols()->uncompromised(), 'confirmed'], // password_confirmation
        ]);

        $user = User::create($attributes);

        Auth::login($user);

        return redirect('/jobs');
    }
}

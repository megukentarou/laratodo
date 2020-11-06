<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(string $name)
    {
        $user = User::where('name', $name)->first();

        $words = $user->words->sortByDesc('created_at');

        return view('users.show', [
            'user' => $user,
            'words' => $words,
        ]);
    }
}

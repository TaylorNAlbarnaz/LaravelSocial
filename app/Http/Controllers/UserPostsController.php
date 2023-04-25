<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserPostsController extends Controller
{
    public function index(User $user)
    {
        $posts = $user->posts()->with(['user', 'likes'])->paginate(5);

        return view('user.posts', [
            'user' => $user,
            'posts' => $posts
        ]);
    }
}

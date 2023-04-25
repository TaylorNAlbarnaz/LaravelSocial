<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $userWithMostLikes = User::select('users.*', DB::raw('COUNT(likes.id) as likes_count'))
            ->join('posts', 'users.id', '=', 'posts.user_id')
            ->join('likes', 'posts.id', '=', 'likes.post_id')
            ->groupBy('users.id')
            ->orderByRaw('likes_count DESC')
            ->first();

        $mostLikedPost = Post::select('posts.*', DB::raw('COUNT(likes.id) as likes_count'))
            ->join('likes', 'posts.id', '=', 'likes.post_id')
            ->groupBy('posts.id')
            ->orderByRaw('likes_count DESC')
            ->first();

        $mostRecentPost = Post::select('posts.*')
            ->orderBy('created_at', 'desc')
            ->first();

        return view('home', [
            'userWithMostLikes' => $userWithMostLikes,
            'mostLikedPost' => $mostLikedPost,
            'mostRecentPost' => $mostRecentPost
        ]);
    }
}

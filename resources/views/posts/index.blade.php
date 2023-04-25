@extends('layouts.app')

@section('content')
	<div class="flex flex-col items-center">
        <div class="flex flex-col">
            @if ($posts->count())
            <ul class="flex flex-col space-y-2 items-center mb-2">
                @foreach ($posts as $post)
                    <li class="bg-white w-fit max-w-4xl p-3 rounded-md shadow-lg @if (auth()->user() == $post->user) !bg-gray-100 @endif">
                        <div class="flex flex-col">
                            <div class="flex justify-between items-center gap-4">
                                <p class="text-xl whitespace-nowrap truncate overflow-hidden font-semibold @if (auth()->user() == $post->user) italic @endif">{{ $post->user->username }}</p>

                                @can('delete', $post)
                                    <form action="{{ route('posts.destroy', $post)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-400 transition">Delete</button>
                                    </form>
                                @endcan
                            </div>
                            <p class="text-gray-400 text-sm">{{ $post->created_at->diffForHumans() }}</p>
                        </div>
                        <p class="text-gray-500">{{ $post->body }}</p>
                    
                        <div class="flex justify-between gap-8">
                            @auth
                                @if ($post->likedBy(auth()->user()))
                                    <form action="{{ route('posts.like', $post)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-500 hover:text-red-300 transition">Unlike</button>
                                    </form>
                                @else
                                    <form action="{{ route('posts.like', $post)}}" method="post">
                                        @csrf
                                        <button type="submit" class="text-blue-600 hover:text-blue-400 transition">Like</button>
                                    </form>
                                @endif
                            @endauth

                            @if ($post->likes->count() > 0)
                                <span class="text-gray-400 cursor-default"> {{ $post->likes->count() }} {{ Str::plural('like', $post->likes->count()) }}</span>
                            @endif
                        </div>
                    </li>
                @endforeach
            </ul>

            {{ $posts->links() }}
            
            @else
                <p>There are no posts!</p>
            @endif
        </div>

        @auth
            <div class="flex items-center justify-center shadow-lg mx-8 mb-4 max-w-lg">
                <form class="w-full max-w-xl bg-white rounded-lg px-4 pt-2" action="{{ route('posts')}}" method="post">
                    @csrf
                    <div class="flex flex-wrap -mx-3 mb-6">
                        <div class="w-full md:w-full px-3 mb-2 mt-2">
                            <textarea class="bg-gray-100 rounded border border-gray-400 leading-normal resize-none w-full h-20 py-2 px-3 font-medium placeholder-gray-700 focus:outline-none focus:bg-white" name="body" placeholder='Type Your Comment' required></textarea>
                        </div>
                        <div class="w-full flex justify-end md:w-full px-3">
                            <div class="-mr-1">
                                <input type='submit' class="bg-blue-500 text-white font-medium py-1 px-4 rounded-lg tracking-wide mr-1 hover:bg-blue-700 hover:cursor-pointer translate-y-2" value='Post Comment'/>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        @endauth
	</div>
@endsection
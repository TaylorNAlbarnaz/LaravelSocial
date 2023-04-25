@props(['post' => $post])

<li class="bg-white w-fit max-w-4xl p-3 rounded-md shadow-lg @if (auth()->user() == $post->user) !bg-gray-100 @endif">
    <div class="flex flex-col">
        <div class="flex justify-between items-center gap-4">
            <a href="{{ route('user.posts', $post->user) }}" class="text-xl whitespace-nowrap truncate overflow-hidden font-semibold @if (auth()->user() == $post->user) italic @endif">{{ $post->user->username }}</a>

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
@extends('layouts.app')

@section('content')
	<div class="flex flex-col items-center">
        <div>
            <p class="mb-5 text-xl"><b class="italic">{{ $user->username }}</b> has posted {{ $posts->count() }} comments and received a total of {{ $user->receivedLikes->count() }} likes</p>
        </div>

		<div class="flex flex-col">
            @if ($posts->count())
            <ul class="flex flex-col space-y-2 items-center mb-2">
                @foreach ($posts as $post)
                    <x-post :post="$post"/>
                @endforeach
            </ul>

            {{ $posts->links() }}
            
            @else
                <p>{{ $user->username }} has no posts!</p>
            @endif
        </div>
	</div>
@endsection
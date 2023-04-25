@extends('layouts.app')

@section('content')
	<div class="flex justify-center">
		<div class="w-8/12 p-6">
            <div class="bg-white px-6 py-2 rounded-md">
                <h1 class="text-2xl font-bold">Laravel Social</h1>
                <span class="text-xl italic font-semibold mt-4">Social Landmarks</span>
            </div>

            <div class="bg-gray-100 p-2 rounded-md flex flex-col gap-3 mt-2">
                <p><span class="font-semibold">Most liked user:</span>
                    <a href="{{ route('user.posts', $userWithMostLikes) }}" class="italic font-bold">
                        {{ $userWithMostLikes->username }}
                    </a> 
                    with {{ $userWithMostLikes->likes_count }} likes.</p>
                <ul class="flex justify-between">
                    <p class="font-semibold">Most liked post:</p>
                    <x-post :post="$mostLikedPost"/>
                </ul>

                <ul class="flex justify-between">
                    <p class="font-semibold">Newest post:</p>
                    <x-post :post="$mostRecentPost"/>
                </ul>
            </div>
		</div>
	</div>
@endsection